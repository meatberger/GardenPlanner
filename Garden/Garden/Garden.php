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
    public $length;
    public $width;
    public $unit; // The unit of measurement for the garden
}

?>