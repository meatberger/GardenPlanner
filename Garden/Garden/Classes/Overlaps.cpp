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
	
	//from clipper.hpp ...
	//typedef signed long long cInt;
	//struct IntPoint {cInt X; cInt Y;};
	//typedef std::vector<IntPoint> Path;
	//typedef std::vector<Path> Paths;
void detectClipping()
{
	/*using namespace ClipperLib;
	
	Paths subj(2), clip(1), solution;

	subj[0] << 
	  IntPoint(180,200) << IntPoint(260,200) <<
	  IntPoint(260,150) << IntPoint(180,150);
	
	//define subject's inner triangular 'hole' (with reverse orientation)
	//subj[1] << 
	  //IntPoint(215,160) << IntPoint(230,190) << IntPoint(200,190);
	
	//define orange 'clipping' polygon
	clip[0] << 
	  IntPoint(210,170) << IntPoint(230,170) << 
	  IntPoint(230,180) << IntPoint(210,180);
	
	//perform intersection ...
	Clipper c;
	c.AddPaths(subj, ptSubject, true);
	c.AddPaths(clip, ptClip, true);
	c.Execute(ctIntersection, solution, pftNonZero, pftNonZero);

	//draw solution with user-defined routine ... 
	//DrawPolygons(solution, 0x3000FF00, 0xFF006600); //solution shaded green
    bool overlaps;
    
    for (auto& i: solution)
    {
        std::cout << i << ' ';
        overlaps = true;
    }
        
    if(!overlaps)
        std::cout << "No Overlap";
    */
}    
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
    return true;
}