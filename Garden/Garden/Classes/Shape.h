/*
 * Shape.h
 * Pellissippi State Garden
 * Andrew Berger
 * Shape Logic for the c++ shape class
 */
 
#ifndef SHAPE_H
#define SHAPE_H

#include <vector>
#include <stdio.h>
#include <cstdlib>
#include <cmath>
 
 typedef enum shapeType
 {
     
     circle, 
     ellipse,
     custom, 
     triangle, 
     rectangle, 
     pentagon, 
     hexagon, 
     septagon, 
     octagon,
     nonagon,
     decagon,
     dodecagon,
     multi
     
 } shapeType;
 
typedef struct point
{
    
    int x, y;
    
} point;
 
class Shape
{
    public:
    
        point origin;
        int l, w, r;
        shapeType type;
        bool isCircular;
        Shape();
        Shape( const point&, const int&, const int& );
        void fillRectFromVect( std::vector<int>& s );
};


#endif