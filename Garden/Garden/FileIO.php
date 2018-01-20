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
    
    public function __construct()
    {
        $this->garden = $this->load() ?? FALSE;
    }
    public function isLoaded() : bool
    {
        return $this->garden!==false ? true : false;
    }
    public function load()
    {
        if( isset($_FILES['userfile']['tmp_name']) && file_exists( $_FILES['userfile']['tmp_name'] ) )
        {
            $xml = simplexml_load_file( $_FILES['userfile']['tmp_name'] );
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
        }        
        else 
            $xml = new SimpleXMLElement("<garden></garden>");
        
            return $xml;
    }
    
    public function save( SimpleXMLElement $xml , $as )
    {
        $file = tmpfile();
        $xmlString = $xml->asXML();
        fwrite($file, $xmlString);
        
        $newPath = stream_get_meta_data($file)['uri'];

        if (file_exists($newPath))
        {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.$as.'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($newPath));
            readfile($newPath);
            fclose($file); // this removes the file
            exit;
        }
        else return false;
    }
}


?>
