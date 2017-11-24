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
#include <memory>
#include <cassert>
#include <functional>
#include "clipper.hpp"


typedef enum ShapeType
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
     
} ShapeType;
 
typedef struct point
{
    
    int x, y;
    
} point;
 
class Shape
{
    public:
        ShapeType type;
        ClipperLib::Paths coordinates;
        ClipperLib::IntPoint origin;
        virtual ~Shape() {}
        int radius;
};

typedef std::vector<std::unique_ptr<Shape>> Shapes;

class Rectangle : public Shape
{
    public:
        int l, w, r;
        Rectangle();
        Rectangle( const ClipperLib::IntPoint&, const int&, const int& );
        void fillRectFromVect( std::vector<int>& s );
};

class Ellipse : public Shape
{
    public:
        int a;
        int b;
};

// Circle inherits from ellipse
class Circle : public Ellipse
{
    public:
        Circle(); 
        Circle(Shape); // Construct a circle from any shape
};

// polygon is any shape other than an ellipse, circle, rectangle
class Polygon : public Shape
{
    // Needs no additional properties atm
};
Polygon polygonFromEllipse(Ellipse);

inline Polygon polygonFromEllipse( Ellipse e )
{
    using namespace ClipperLib;

    Polygon ellipticalApproximation;
    
    for( int theta = 0; theta < 360; theta += 15 )
        ellipticalApproximation.coordinates[0] << IntPoint(e.a*cos(theta), e.b*sin(theta));
        
    return ellipticalApproximation;
}

inline Circle::Circle()
{
}

// Create a circle from the polygon
inline Circle::Circle( Shape s )
{
    	using namespace ClipperLib;

    if( s.type == ellipse )
        radius = a > b ? a : b;
    else
    {
        
    IntPoint minX, minY, maxX, maxY;
    
    for( auto pnt : coordinates[0] )
    {
        if( pnt.X < minX.X )
            minX = pnt; // set to the min x val
        if( pnt.Y < minY.Y )
            minY = pnt; // set to the min y val
            
        if( pnt.X > maxX.X )
            maxX = pnt; // max x
        if( pnt.Y > maxY.Y )
            maxY = pnt; // max y
    }
    
    // Use the distance formula to see how large the circle's radius needs to be
    int xAxis = sqrt( pow( maxX.Y - minX.Y, 2 ) + pow( maxX.X - minX.X, 2 ) );
    int yAxis = sqrt( pow( maxY.Y - minY.Y, 2 ) + pow( maxY.X - minY.X, 2 ) );

    // radius is the larger axis
    origin.X = xAxis >> 1;
    origin.Y = yAxis >> 1;
    
    radius = xAxis > yAxis ? origin.X : origin.Y;

    }
}

#endif