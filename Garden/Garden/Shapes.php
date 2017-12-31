<?
/*
 * Shapes.php
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
    
    function __construct()
    {
        $coordinates = [];
        $origin = new point;
    }
}

class Ellipse extends Shaoe
{
    public $a,$b; // The two radii
}

class Circle extends Ellipse
{
    public $radius; // $a==$b
}

class Polygon extends Shape
{
}

?>