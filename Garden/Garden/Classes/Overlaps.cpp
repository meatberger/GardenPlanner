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
	using namespace ClipperLib;
	
	Paths subj(2), clip(1), solution;
	//std::cout << "subj[1] = " << subj[1] << std::endl;
	//define outer blue 'subject' polygon
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
	
	//draw input polygons with user-defined routine ... 
	//DrawPolygons(subj, 0x160000FF, 0x600000FF); //blue
	//DrawPolygons(clip, 0x20FFFF00, 0x30FF0000); //orange
	
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
    
}    
bool overlaps( const Rectangle& r1, const Rectangle& r2 ) 
{
    return !( r1.origin.x >= r2.origin.x + r2.l || 
               r1.origin.y + r1.w <= r2.origin.y ||
               r1.origin.x + r1.l <= r2.origin.x || 
               r1.origin.y >= r2.origin.y + r2.w );
}
bool overlaps( const Circle& c1, const Circle& c2 ) 
{
     return true;
}
bool overlaps( const Polygon& p1, const Polygon& p2 ) 
{
     return true;
}