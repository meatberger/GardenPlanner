<?
/*
 * FileIO.php
 * © Andrew Berger, Pellissippi State Community College
 * This class will allow users to create and load garden save files
 */

require_once 'Garden.php';

class FileIO
{
    public $garden;
    
    public function load()
    {
        if( file_exists( $_FILES['userfile']['tmp_name'] ) )
            $xml = simplexml_load_file( $_FILES['userfile']['tmp_name'] );
        else return FALSE;
        
        $xmlString = $xml->asXML();
        
        // Prevent XML injection with the following:
        
        $oldValue = libxml_disable_entity_loader(true);
        $dom = new DOMDocument;
        $dom->loadXML($xmlString);
        foreach ( $dom->childNodes as $child ) 
        {
            if ($child->nodeType === XML_DOCUMENT_TYPE_NODE) 
            {
                throw new \InvalidArgumentException(
                'Invalid XML: Detected use of disallowed DOCTYPE' );
            }
        }
        libxml_disable_entity_loader( $oldValue );
        
        // Now, we can process $xml
        
            return $xml;
    }
    
    public function save( SimpleXMLElement $xml )
    {
        $file = tmpfile();
        $xml->asXML();
        fwrite($file, $xml);
        
        if (file_exists($file))
        {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            fclose($file); // this removes the file
            exit;
        }
    }
}


?>