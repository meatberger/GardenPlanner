/*
 * Overlaps.h
 * Pellissippi State Garden
 * Andrew Berger
 * Class Declaration and header for the Overlap (detection) class
 * 
 */

#ifndef OVERLAPS_H
#define OVERLAPS_H
 
#define OVERLAP 1
#define NO_OVERLAP 0 
 
#include "Shape.h"

typedef Shape rect;

bool overlaps( const rect& r1, const rect& r2 );

#endif