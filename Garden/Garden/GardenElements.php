<?
/*
 * GardenElements.php
 * © Andrew Berger, Pellissippi State Community College
 * This class extends the shapes class and provides context
 * For it in terms of the elements of a garden
 */
 
require_once 'ClipDetector.php';

// No substrate
const GRASS = -1;

// Substrate types
const MULCH = 0;
const SOIL = 1;
const WATER = 2;

// Stone materials
const BRICK = 3;
const STONE = 4;

class GardenElement extends Shape
{
    public $name;
}

class GardenBed extends GardenElement
{
    public $substrate;
    public $substrateColor;
    public $border;
    public $plants;
    public $otherFeatures; // non-plant garden features
    public $type; // Shape type (Circle, Ellipse, Polygon)
    public function __construct()
    {
        $this->plants = [];
        $this->otherFeatures = [];
    }
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
    public $color;
    public $size;
    public $origin;
    public $type;
}

class Walkway extends GardenElement
{
    public $stones; // array of Stone objects
    public $substrate;
    public $substrateColor;
    public $length;
    public $width;
    
    public function __construct()
    {
        $this->stones = [];
    }
}
class Border
{
    public $width;
    public $substrate;
    public $color;
    public function __construct($width=1,$substrate=0,$r=178,$g=34,$b=34)
    {
        $this->width = $width;
        $this->substrate = $substrate;
        $this->color = "rgb($r,$g,$b)";
    }
}
class Plant extends Circle
{
    public $origin;
    public $name;
    public $size;
    public $z;
}
?>
