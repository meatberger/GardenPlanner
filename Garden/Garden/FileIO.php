<?
/*
 * FileIO.php
 * © Andrew Berger, Pellissippi State Community College
 * This class will allow users to create and load garden save files
 */

require_once 'Garden.php';

class FileIO
{
    private $saveFileName;
    private $xml;
    public $garden;
    public $isLoaded;

    public function __construct($autoLoad = true)
    {
        $this->garden = new Garden;
        $this->isLoaded = false;
        if($autoLoad) $this->load();
    }

    private function load()
    {
        if( isset($_FILES['userfile']['tmp_name']) && file_exists( $_FILES['userfile']['tmp_name'] ) )
        {
            $this->saveFileName = $_FILES['userfile']['name'];
            $this->xml = simplexml_load_file( $_FILES['userfile']['tmp_name'] );
            $xmlString = $this->xml->asXML();
        
            // Prevent XML injection with the following:
            
            $oldValue = libxml_disable_entity_loader(true);
            $dom = new DOMDocument;
            $dom->loadXML($xmlString);
            foreach ( $dom->childNodes as $child ) 
            {
                if ($child->nodeType === XML_DOCUMENT_TYPE_NODE) 
                {
                    throw new \InvalidArgumentException(
                    'Invalid .garden file: Detected use of disallowed DOCTYPE' );
                }
            }
            libxml_disable_entity_loader( $oldValue );
            
            // Now, we can process $this->xml
            $this->garden->unit = $this->xml->unit;
            $this->garden->size = $this->xml->size;
            $this->garden->color = $this->xml->color;
            $this->garden->border = $this->xml->border;
            foreach($this->xml->bed as $xmlBed)
            {
                $bed = new GardenBed;
                $bed->type = $xmlBed->type;
                $bed->substrate = $xmlBed->substrate;
                $bed->substrateColor = 'rgb('.$xmlBed->color.')';
                $bed->border = $xmlBed->border;
                foreach( $xmlBed->features as $feature )
                {
                     if($feature->$featureType==0) // plant, change this code in future to add features
                     {#plot -> Change this code to load plant objects into array, and stones
                        $plant = new Plant;
                        $plant->origins = $feature->origins;
                        $plant->names = $feature->names;
                        $plant->sizes = $feature->sizes;
                        $plant->z = $feature->z;
                        $bed->plants[] = $plant;
                     }
                }
               
                $this->garden->beds[] = $bed;
            }

            foreach($this->xml->walkways as $walkway)
            {
                
            } $this->garden->walkways[] = $walkway;
        }        
        else 
            $this->xml = new SimpleXMLElement("<garden></garden>");
        
        $this->isLoaded = true;
    }
    
    public function save()
    {
        $file = tmpfile();
        $xmlString = $this->xml->asXML();
        fwrite($file, $xmlString);
        
        $newPath = stream_get_meta_data($file)['uri'];

        if (file_exists($newPath))
        {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.$this->saveFileName.'"');
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
    public function isValidFileName( $fileName ) : bool
    {
        return preg_match('/[^A-Za-z0-9.]|(\.\w+\.)|\.{2,}|^[^.]*$/') ? false : true;
    }
    public function saveAs( $fileName ) // Returns false on failure
    {
        $this->saveFileName = $fileName;
        if( $this->isValidFileName( $fileName ) ) $this->save();
        else return false;
    }
}


?>
