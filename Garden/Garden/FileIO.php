<?
/*
 * FileIO.php
 */

require_once 'Garden.php';

class FileIO
{
    public function xmlFromPath( $xmlPath ) // returns a garden on success
    {
        if( file_exists( $xmlPath ) )
            return simplexml_load_file( $xmlPath, "Garden" );
        else
            return FALSE;
    }
    
}


?>