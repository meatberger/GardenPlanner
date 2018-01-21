<?

/*
 * Garden.php
 * © Andrew Berger, Pellissippi State Community College
 * This class represents the entire garden and all of it
 */
 
require_once 'GardenElements.php';

class Garden
{
    public $beds; // 2D array of all garden beds
    public $walkways; // 2D array of all walkways
    public $size;
    public $unit; // The system of measurement for the garden, 'US' or 'INT'
    public $color;
    public $border;
    public $substrate;
    
    public function __construct()
    {
        $this->beds = [];
        $this->walkways = [];
    }
}

?>
