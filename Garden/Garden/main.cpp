#include <string>
#include <sstream>
#include <iostream>
#include "Classes/GardenBed.h"

int main(int argc, char **argv)
{
    using std::string;
    using std::vector;
    
    string coords = argc > 1 ? static_cast<string>( argv[ 1 ] ) : "0,0|0,0";
    
    vector<int> shape1;
    vector<int> shape2;
        
    std::stringstream ss(coords);

    int i;
    bool usingSecondArray;
    
    while (ss >> i)
    {
        if( usingSecondArray )
            shape2.push_back( i );
        else
            shape1.push_back( i );
        
        if( ss.peek() == '|') 
        {
            usingSecondArray = true;
            ss.ignore();
        }
        
        if( ss.peek() == ',' )
            ss.ignore();
    }
    
    // Load up two shapes to be detected    
    rect r1, r2;

    r1.fillRectFromVect( shape1 );
    r2.fillRectFromVect( shape2 );
    if (overlaps( r1,r2 )) std::cout << OVERLAP;
    else
        std::cout << NO_OVERLAP;
        
            return overlaps( r1,r2 ) ? OVERLAP : NO_OVERLAP;
}

#undef OVERLAP
#undef NO_OVERLAP