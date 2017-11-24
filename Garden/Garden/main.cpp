#include <string>
#include <sstream>
#include <iostream>
#include "Classes/Overlaps.h"

bool loadShape( Shapes& shapeData, const std::string& arg, ShapeType type );

int main(int argc, char **argv)
{
    using std::string;
    using std::vector;
    using std::cout;
    using namespace ClipperLib;
    
    // Must have the first and third argument set to the shape types
    // argv[1] and argv[3] must be coordinates (i.e., "2,2|3,3|1543,183")
    //if(argc != 5) return NO_OVERLAP;

    // Magic pointer array of any shape type
    Shapes shapeData;
    string arg = "2,4|4,5";
    loadShape(shapeData, arg, hexagon);
    //Shape* shape1 = shapeData[0].release();
/*
    for( int i = 1; i < 5; i++ )
    {        
        string arg = static_cast<string>(argv[i]);
        ShapeType type;
            if( i == 1 || i == 3 ) // shape type one
            {
                try // to parse the int out of arg
                {
                    type = static_cast<ShapeType>(stoi(arg));
                }
                catch(...)
                {
                    return NO_OVERLAP;
                }
            }
            else if( i == 2 || i == 4 )
                if(!loadShape(shapeData, arg, type)) return NO_OVERLAP;

    }*/ //end for (all argv)
    //for(auto s : shapeData)

   // cout << "test" << shapeData[0]->coordinates[0][0];
    // Test based on a circle
    // In circle test function, use the constructor to make a circle from a shape
    // If both types are circle, or if no overlap, bail
    // Else, use the detectClipping function that needs revision
            //return detectClipping( r1,r2 ) ? OVERLAP : NO_OVERLAP;
}

/*
 * try to ditch the pointer idea and add the shapes to the vector
 */
bool loadShape( Shapes& shapeData, const std::string& arg, ShapeType type )
{
    using std::string;
    using std::vector;
    using std::cout;
    using namespace ClipperLib;
    
    std::stringstream ss(arg);
    
    int currentParsedInteger;
            
    IntPoint currentPoint;
    
    if(type > 1)
        shapeData.push_back(std::unique_ptr<Polygon>());
    else
        shapeData.push_back(std::unique_ptr<Circle>());
    
    int currentShapeIndex = abs(shapeData.size()) - 1;
    
    while (ss >> currentParsedInteger)
    {
        // if the shape is not an ellipse (including circles)
                
        if(type > 1)
        {
            Shape* c = shapeData[0].get();
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
                c->coordinates[0] << currentPoint; 
            }
        }
        else // circle or ellipse
        {
            if( ss.peek() == ',' )
            {
                ss.ignore();
                shapeData[currentShapeIndex]->origin.X = currentParsedInteger;
            }
            else if( ss.peek() == '|' )
            {
                ss.ignore();
                shapeData[currentShapeIndex]->origin.Y = currentParsedInteger;
            }
            else
                shapeData[currentShapeIndex]->radius = currentParsedInteger; 
        }
        
    }
        return true;
}

#undef OVERLAP
#undef NO_OVERLAP