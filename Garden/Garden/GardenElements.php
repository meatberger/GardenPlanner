<?
/*
 * GardenElements.php
 * This class extends the shapes class and provides context
 * For it in terms of the elements of a garden
 */
 
require_once 'Shapes.php';

class CircularBed extends Circle
{
    public $name;
    public $plants;
    public $substrate;
}

class HerbSpiral extends CircularBed
{
    
}

class EllipticalBed extends Ellipse
{
    public $name;
    public $plants;
    public $substrate;
}

class PolygonalBed extends Polygon
{
    public $name;
    public $plants;
    public $substrate;
}

class Stones extends Polygon
{
    public $material;
}

class Walkway extends Polygon
{
    public $name;
    public $stones;
    public $substrate;
}

?>