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
 
 bool overlaps( const rect& r1, const rect& r2 ) 
 {
     return !( r1.origin.x >= r2.origin.x + r2.l || 
               r1.origin.y + r1.w <= r2.origin.y ||
               r1.origin.x + r1.l <= r2.origin.x || 
               r1.origin.y >= r2.origin.y + r2.w );
 }
 