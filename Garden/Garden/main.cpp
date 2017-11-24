#include <string>
#include <sstream>
#include <iostream>
#include "Classes/Overlaps.h"

Polygon polygonFromString( const std::string& arg );
Circle circleFromString( const std::string& arg );
ShapeType shapeTypeFromString( char* );

int main(int argc, char **argv)
{
    using std::string;
    using std::cout;
    
    // Must have argv[1] and argv[2] set to the shape types
    // argv[3] and argv[4] must be coordinates (i.e., "2,2|3,3|1543,183")
    if(argc != 5) return INPUT_ERROR;

    // Make two polygons from makePolygon() and test for overlap

    ShapeType type1, type2;

    // Parse the ShapeTypes from the first and second argument
    type1 = shapeTypeFromString(argv[1]);
    type2 = shapeTypeFromString(argv[2]);

    // If there is a parse error...
    if( type1 == invalid || type2 == invalid ) 
        return INPUT_ERROR;
        
    // get the 2 strings of coordinates from the user
    string arg1 = static_cast<string>(argv[3]);
    string arg2 = static_cast<string>(argv[4]);
    
    // if the overlap is between two simple circles...
    if(type1 == circle && type2 == circle)
        return overlaps( circleFromString(arg1), circleFromString(arg2) ) ? OVERLAP : NO_OVERLAP;

    Circle c1, c2;
    
    Polygon p1,p2;
    
    // test the shapes as two simple circles
    // The Circle(Shape) constructor approximates thier radii

    if(type1 == circle)
        c1 = circleFromString(arg1);
    else
    {
        p1 = polygonFromString(arg1);
        c1 = Circle(p1);
    }
    if(type2 == circle)
        c2 = circleFromString(arg2);
    else
    {
        p2 = polygonFromString(arg2);
        c2 = Circle(p2);
    }
    // Now, a circle has been constructed for each shape
    bool mayHaveOverlap = overlaps( c1, c2 );
    
    // If their circular approximations don't overlap...
    if( !mayHaveOverlap ) return NO_OVERLAP; 
    
    // further testing is required... 
    // Else, use the detectClipping function that needs revision
            //return detectClipping( r1,r2 ) ? OVERLAP : NO_OVERLAP;
}
ShapeType shapeTypeFromString( char* arg )
{
    try
    {
        return static_cast<ShapeType>(stoi(static_cast<std::string>(arg)));
    }
    catch(...)
    {
        return invalid;
    }
}
Polygon polygonFromString( const std::string& arg )
{
    using std::string;
    using std::vector;
    using std::cout;
    using namespace ClipperLib;
    
    std::stringstream ss(arg);
    
    int currentParsedInteger;
    
    Polygon p;

    IntPoint currentPoint;

        while (ss >> currentParsedInteger)
        {
            //See if you are on the X coordinate
            if( ss.peek() == ',' )
            {
                ss.ignore();
                currentPoint.X = currentParsedInteger;
            }
            else if( ss.peek() == '|' ) // Y coordinate
            {
                ss.ignore();
                currentPoint.Y = currentParsedInteger;
                
                //coordinates[0] << is the default setter for clipper paths
                p.coordinates << currentPoint;
            }
        }
    return p;
}

Circle circleFromString( const std::string& arg )
{
    std::stringstream ss(arg);
    
    int currentParsedInteger;
                           
    Circle c;

    while (ss >> currentParsedInteger)
    {
        if( ss.peek() == ',' )
        {
            ss.ignore();
            c.origin.X = currentParsedInteger;
        }
        else if( ss.peek() == '|' )
        {
            ss.ignore();
            c.origin.Y = currentParsedInteger;
        }
        else
            c.radius = currentParsedInteger; 
    }
        return c;
}

#undef OVERLAP
#undef NO_OVERLAP