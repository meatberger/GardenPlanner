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
#include "clipper.hpp"

bool overlaps( const Rectangle& r1, const Rectangle& r2 );
bool overlaps( const Circle& r1, const Circle& r2 );
bool overlaps( const Polygon& c1, const Polygon& r2 );

void detectClipping();

#endif