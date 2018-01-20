<?

require_once 'FileIO.php';

class VisualGarden
{
    public $gardenFile;
    public $xml;    

    public function __construct()
    {
        $this->gardenFile = new FileIO;

        if( !$this->gardenFile->isLoaded() )
        {
            echo 'There was an error loading the garden file';
            die;
        }
        else
        {
            $this->grow();
        }
    }
    public function grow()
    {
        $this->gardenFile->garden->addChild("bed", "testing the add element");
        var_dump($this->gardenFile);
        //$this->xml = $this->gardenFile->save($this->gardenFile->garden,'sample.garden');
    }
    
}

?>
