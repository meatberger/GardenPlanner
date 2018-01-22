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
                $bed->substrateColor = 'rgb('.$xmlBed->color.');';
                $bed->border = $xmlBed->border;
                foreach( $xmlBed->features as $feature )
                {
                     if($feature->$featureType==0)
                     {
                        $origins = explode(" ", $feature->origins);
                        $names = explode(",", $feature->names);
                        $sizes = explode(",", $feature->sizes);
                        $i = 0;

                        $numOrigins = count($origins);

                        if( $numOrigins !== count($names) || $numOrigins !== count($sizes) ) return false;
                        
                        foreach( $origins as $origin )
                        {
                            $plant = new Plant;
                            $plant->origin = $origin;
                            $plant->name = $names[$i];
                            $plant->size = $sizes[$i];
                            $plant->z = $feature->z;
                            $bed->plants[] = $plant;
                            $i++;
                        }                     
                        
                     }
                }
               
                $this->garden->beds[] = $bed;
            } // end of garden beds

            foreach($this->xml->walkways as $xmlWalkway)
            {
                $walkway = new Walkway;
                $walkway->type = $xmlWalkway->type;
                $walkway->substrate = $xmlWalkway->substrate;
                $walkway->substrateColor = 'rgb('.$xmlWalkway->color.');';
                $walkway->border = $xmlWalkway->border;
                $walkway->coordinates = explode(" ", $xmlWalkway->coordinates);
                $stonesOrigins = explode( " ", $xmlWalkway->stones->coordinates );
                foreach( $stonesOrigins as $coord )
                {   
                    $stone = new Stone;
                    $stone->color = "rgb(" . $xmlWalkway->stones->color . ");";
                    $stone->size = $xmlWalkway->stones->size;
                    $stone->type = $xmlWalkway->stones->type;
                    $stone->origin = $coord;
                    $walkway->stones[] = $stone;
                }
                $this->garden->walkways[] = $xmlWalkway;
            } 
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
