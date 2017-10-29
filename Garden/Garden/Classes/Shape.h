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
     hendecagon,
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
        point center;
        int radius;
        shapeType type;
        Shape();
};
class Rectangle : public Shape
{
    public:
        int l, w, r;
        point origin;
        Rectangle();
        Rectangle( const point&, const int&, const int& );
        void fillRectFromVect( std::vector<int>& s );
};
class Circle : public Shape
{
    
};
class Polygon : public Shape
{
    public:
        int sides;
};


#endif