/*
 * Overlaps.h
 * Pellissippi State Garden
 * Andrew Berger
 * Class Declaration and header for the Overlap (detection) class
 * 
 */

#ifndef OVERLAPS_H
#define OVERLAPS_H
 
#define INPUT_ERROR 2
#define OVERLAP 1
#define NO_OVERLAP 0 
 
#include "Shape.h"

bool overlaps( const Rectangle& r1, const Rectangle& r2 );
bool overlaps( const Circle& r1, const Circle& r2 );
bool overlaps( const Polygon& p1, const Polygon& p2 );

void detectClipping();

#endif