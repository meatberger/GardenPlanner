<?

require_once 'FileIO.php';

class VisualGarden
{
    public $gardenFile;

    public function __construct()
    {
        $this->gardenFile = new FileIO;

        
    }
    public function grow()
    {
        $this->gardenFile->garden->addChild("bed", "testing the add element");
        $this->saveFileName = 'sample.garden';
        $this->gardenFile->save();
    }
    
}

?>
