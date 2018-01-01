<?

/*
 * ClipDetector.php
 * © Andrew Berger, Pellissippi State Community College
 * Utilizes the C++ overlap binary to detect shape overlap
 */

require_once 'Shapes.php';

class ClipDetector
{
    public $clippedArea;
    
    public function __construct()
    {
        $this->clippedArea = new Shape;
    }
    
    public function foundClipping( $s1, $s2 ) : bool
    {
        $answer = '';
        $exitCode = 0;

        $numberOfShapeOneCoordinates = count($s1.coordinates);
        $numberOfShapeTwoCoordinates = count($s2.coordinates);
        // Make the query string ( Arguments in the form type type "x,y|x,y" "x,y|x,y" ) then | radii
        $clipQuery = '/opt/lampp/bin/Garden' . intval($s1.type) . ' ' . intval($s2.type) . ' "';
        // So far (example) -> '/opt/lampp/bin/Garden 2 2 "'
        for( $i = 0; $i < $numberOfShapeOneCoordinates; $i++ )
            $clipQuery .= intval( $s1.coordinates[$i] ) . ( ( $i % 2 == 1 && $i != $numberOfShapeOneCoordinates - 1 ) ? '|' : ',' );
        $clipQuery .= '" ';
        if( $s1.type == CIRCLE )
            $clipQuery .= $s1.radius;
        else if( $s1.type == ELLIPSE )
            $clipQuery .= $s1.a . '|' . $s1.b;
        // Now -> '/opt/lampp/bin/Garden 2 2 "1,2|3,4|6,4"'
        for( $i = 0; $i < $numberOfShapeTwoCoordinates; $i++ )
            $clipQuery .= intval( $s2.coordinates[$i] ) . ( ( $i % 2 == 1 && $i != $numberOfShapeTwoCoordinates - 1 ) ? '|' : ',' );
        $clipQuery .= '" ';
        if( $s2.type == CIRCLE )
            $clipQuery .= $s2.radius;
        else if( $s2.type == ELLIPSE )
            $clipQuery .= $s2.a . '|' . $s2.b;
        // Final string -> '/opt/lampp/bin/Garden 2 2 "1,2|3,4|6,4" "5,2|8,4|7,5"'
        exec($clipQuery, $answer, $exitCode);
        // If there is overlap and a coordinate-based answer, parse the coordinates
        if( $exitCode === 1 && !empty($answer) )
        {
            foreach( $answer as $character )
            {
                if( preg_match( '/^)(,/', $answer ) ) 
                    $this->clippedArea->coordinates[] = intval($character);
            }
        }           
            return $exitCode;
    }
    
}

?>