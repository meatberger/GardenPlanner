<?
/*
 * Shapes.php
 * © Andrew Berger, Pellissippi State Community College
 * This class represents the objects that will become shapes in the garden
 */
 
const CIRCLE = 0;
const ELLIPSE = 1;
const POLYGON = 2;

class point
{
    public $x,$y;
}

class Shape
{
    public $coordinates;
    public $border;
    public $origin;
    public $type;
    public $area;
    public $borderArea;
    
    function __construct()
    {
        $coordinates = [];
        $origin = new point;
    }
}

class Ellipse extends Shape
{
    public $a,$b; // The two radii
    public function __construct($origin,$a,$b)
    {
        parent::__construct();
        $this->a = $a;
        $this->b = $b;
        $this->origin->x = $origin->x;
        $this->origin->y = $origin->y;
        $this->coordinates[0] = $this->origin;
        $this->type = ELLIPSE;
    }
}
 
class Circle extends Ellipse
{
    public $radius; // $a==$b
    public function __construct($origin, $radius)
    {
        parent::__construct($origin,$radius,$radius);
        $this->type = CIRCLE;
    }
}

class Polygon extends Shape
{
    public function __construct($coordinates)
    {
        $this->origin = $coordinates[0];
        $this->coordinates = $coordinates;
        $this->type = POLYGON;
    }
}

?>