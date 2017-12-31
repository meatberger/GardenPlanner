<?
/*
 * FileIO.php
 */

require_once 'Garden.php';

class FileIO
{
    
    public $garden;
    
    public function xmlFromPath( $xmlPath ) // returns a garden on success
    {
        if( file_exists( $xmlPath ) )
            return $garden = simplexml_load_file( $xmlPath, "Garden" ); // always true
        else
            return FALSE;
    }

    public function saveGarden()
    {
        
    }
}


?>