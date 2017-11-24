 /*
 * Shape.cpp
 * Pellissippi State Garden
 * Andrew Berger
 * Shape Logic for the c++ shape class
 */
 
#include "Shape.h"

 
Rectangle::Rectangle( const ClipperLib::IntPoint& newOrigin, const int& newLength, const int& newWidth )
{
     // rectangle constructor
     origin = newOrigin;
     l = newLength;
     w = newWidth;
     type = RECTANGLE;
}
Rectangle::Rectangle()
{
     
}
 
void Rectangle::fillRectFromVect( std::vector<int>& s )
{
    for(int i = 0; i < abs( s.size() ); i++)
    {
        int v = s[i];
        
        switch( i )
        {
            case 0:
                type = static_cast<ShapeType>( v );
                break;
            case 1:
                l = v;
                break;
            case 2:
                w = v;
                break;
            case 3:
                origin.X = v;
                break;
            case 4:
                origin.Y = v;
                break;
        }
        
    }
}