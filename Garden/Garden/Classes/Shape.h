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
#include <iostream>

#define PI 3.14159265

typedef enum ShapeType
{
     INVALID=-1,
     CIRCLE, 
     ELLIPSE,
     POLYGON,
     TRIANGLE,
     RECTANGLE
} ShapeType;
 
typedef struct point
{
    
    int x, y;
    
} point;
 
class Shape
{
    public:
        ShapeType type;
        ClipperLib::Path coordinates;
        ClipperLib::IntPoint origin;
        virtual ~Shape() {}
};

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
        Ellipse();
        Ellipse(const ClipperLib::IntPoint&, int, int);
};
inline Ellipse::Ellipse(const ClipperLib::IntPoint& o, int x, int y)
{
    a = x;
    b = y;
    origin = o;
}
inline Ellipse::Ellipse()
{
    type = ELLIPSE;
}

// Circle inherits from ellipse
class Circle : public Ellipse
{
    public:
        Circle(); 
        Circle(Shape); // Construct a circle from any shape
        int radius;
};

// polygon is any shape other than an ellipse, circle, rectangle
class Polygon : public Shape
{
    public:
        Polygon();
};
inline Polygon::Polygon()
{
    type = POLYGON;
}
inline Polygon polygonFromEllipse( const Ellipse& );
inline Polygon polygonFromEllipse( const Ellipse& e )
{
    using namespace ClipperLib;

    Polygon ellipticalApproximation;
    
        for( double theta = 0; theta <= 2*PI; theta += PI/6 )
        {
            double deltaX = e.a * cos(theta);
            double deltaY = e.b * sin(theta);

            int x = std::round( deltaX ); // round
            int y = std::round( deltaY ); // to the nearest int

            ellipticalApproximation.coordinates << IntPoint(x + (e.origin.X), y + (e.origin.Y));
        }
    return ellipticalApproximation;
}

inline Circle::Circle()
{
    type = CIRCLE;
}

// Create a circle from the polygon
inline Circle::Circle( Shape s )
{
    	using namespace ClipperLib;

        if( s.type == ELLIPSE )
            radius = a > b ? a : b;
        else
        {
            
        IntPoint minX, minY, maxX, maxY;
        
        minX = minY = s.coordinates[0];

        for( auto pnt : s.coordinates )
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

        // radius is the larger axis divided by two
        origin.X = xAxis >> 1;
        origin.Y = yAxis >> 1;
        
        radius = xAxis > yAxis ? origin.X : origin.Y;

    }
}

#endif