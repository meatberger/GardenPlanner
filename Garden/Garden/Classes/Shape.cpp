 /*
 * Shape.cpp
 * Pellissippi State Garden
 * Andrew Berger
 * Shape Logic for the c++ shape class
 */
 
#include "Shape.h"

 
Shape::Shape( const point& newOrigin, const int& newLength, const int& newWidth )
{
     // rectangle constructor
     origin = newOrigin;
     l = newLength;
     w = newWidth;
     type = rectangle;
}
 
Shape::Shape()
{
}
 
void Shape::fillRectFromVect( std::vector<int>& s )
{
    for(int i = 0; i < abs( s.size() ); i++)
    {
        int v = s[i];
        
        switch( i )
        {
            case 0:
                type = (shapeType)v;
                break;
            case 1:
                l = v;
                break;
            case 2:
                w = v;
                break;
            case 3:
                origin.x = v;
                break;
            case 4:
                origin.y = v;
                break;
        }
        
    }
}