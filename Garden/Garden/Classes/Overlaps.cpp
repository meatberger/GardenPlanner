/*
 * Overlaps.cpp
 * Pellissippi State Garden
 * Andrew Berger
 * This class detects the overlap of two polygons in a 2D space
 * 
 * Currently just a rectangular detection
 *
 *              B----------------------------------C
 *              |                                  |
 *            w |                                  |
 *              |                                  |
 *              A-(origin)-------------------------D
 *
 */  
 
#include "Overlaps.h"
#include <iostream>
  
bool overlaps( const Rectangle& r1, const Rectangle& r2 ) 
{
    return !( r1.origin.X >= r2.origin.X + r2.l || 
               r1.origin.Y + r1.w <= r2.origin.Y ||
               r1.origin.X + r1.l <= r2.origin.X || 
               r1.origin.Y >= r2.origin.Y + r2.w );
}
bool overlaps( const Circle& c1, const Circle& c2 ) 
{
    // use the distance formula to detect overlap against the two radii
    return ( sqrt( pow( ( c2.origin.Y - c1. origin.Y ), 2 ) + pow( ( c2.origin.X - c1.origin.X ), 2) ) < c1.radius + c2.radius );
}
bool overlaps( const Polygon& p1, const Polygon& p2 ) 
{
    using namespace ClipperLib;
    Paths subj, clip, solution;
    
    subj.push_back(p1.coordinates);
    clip.push_back(p2.coordinates);

	Clipper c;
	c.AddPaths( subj, ptSubject, true );
	c.AddPaths( clip, ptClip, true );
	c.Execute( ctIntersection, solution, pftNonZero, pftNonZero );

    bool overlaps;
    
    for (auto& i: solution)
    {
        std::cout << i << ' ';
        overlaps = true;
    }
        
    return overlaps;
}