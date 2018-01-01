<?
/*
 * GardenElements.php
 * © Andrew Berger, Pellissippi State Community College
 * This class extends the shapes class and provides context
 * For it in terms of the elements of a garden
 */
 
require_once 'ClipDetector.php';

class GardenElement extends Shape
{
    public $name;
}

class GardenBed extends GardenElement
{
    public $substrate;
    public $plants;
}

class CircularBed extends Circle
{
    public $properties;
    public function __construct()
    {
        $this->properties = new GardenBed;
    }
}

class HerbSpiral extends CircularBed
{
    
}

class EllipticalBed extends Ellipse
{
    public $properties;
    public function __construct()
    {
        $this->properties = new GardenBed;
    }
}

class PolygonalBed extends Polygon
{
    public $properties;
    public function __construct()
    {
        $this->properties = new GardenBed;
    }
}

class Stone extends GardenElement
{
    public $material;
}

class Walkway extends GardenElement
{
    public $stones; // array of Stone objects
}

?>