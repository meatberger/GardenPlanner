/*
 * garden.js
 * © Andrew Berger, Pellissippi State Community College
 * This script contains functions that draw the garden elements
 * 
 */ 

// Globals
var width = window.innerWidth;
var height = window.innerHeight;
var stage = new Konva.Stage(
{
  container: 'konvaCanvas',
  width: width,
  height: height
});
var layer = new Konva.Layer();
var background = new Konva.Layer();

// Functions
function drawGrid(gridSize)
{
    background.destroy();
    background = new Konva.Layer();
    for (var i = 0; i <= (width / gridSize); i++)
	{
	    background.add(new Konva.Line({
		points: [i * gridSize, 0, i * gridSize, height],
		stroke: '#ccc',
		strokeWidth: 1
	    }));
	    background.add(new Konva.Line({
		points: [0, i * gridSize, width, i * gridSize],
		stroke: '#ccc',
		strokeWidth: 1
	    }));
	}
    stage.add(background);
    background.moveToBottom();
}
function drawRectangle( name, x, y, width, height, color, borderColor, borderWidth)
{
    var rect = new Konva.Rect(
    {
      name: name,
      x: x,
      y: y,
      width: width,
      height: height,
      fill: color,
      stroke: borderColor,
      strokeWidth: borderWidth
    });
    // add the shape to the layer
    layer.add(rect);
    // add the layer to the stage
    stage.add(layer)
}
function drawPolygon( name, xyz, color, borderWidth, borderColor )
{
    var poly = new Konva.Line({
 
      points: xyz,
      zIndex:3,
      fill: color,
      stroke: borderColor,
      strokeWidth: borderWidth,
      closed : true,
      draggable : true,
      name : name
    });
    // add the shape to the layer
    layer.add(poly);
    // add the layer to the stage
    stage.add(layer);
}
function drawEllipse( a, b, x, y, color, borderWidth, borderColor )
{
     //var layer = new Konva.Layer();
     var oval = new Konva.Ellipse(
     {
        x: x,
        y: y,
        radius: {
            x: a,
            y: b
        },
        draggable : true,
        fill: color,
        name: "Coicle",
        stroke: borderColor,
        strokeWidth: borderWidth
    });
    // add the shape to the layer
    layer.add(oval);
    // add the layer to the stage
    stage.add(layer);
}

function writeMessage(message) 
{
      text.setText(message);
      layer.draw();
}

function drawBed(substrate, color, xyz, type, other)
{
    //#plot - make sure that each shape has unique elements in the dom
}
function drawPlant(origin, name, size, z)
{

}
function drawWalkway(substrate, color, length, width, xyz)
{

}
function drawStone(origin, material, color, size, type)
{

}
function removeElement(name)
{
    stage.find("."+name).destroy();
    stage.find('Transformer').destroy();
    layer.draw();
}
function removeAllElementsOfType(type)
{
    var finds = layer.find(type); 
    for(var i=0; i < finds.length; i++) 
        removeElement(finds[i].name());
}
function grow()
{
    // Add the grid
    drawGrid(20);
    
    /*
     * Sandbox
     */

    // call drawPolygon with xyz like this: [40, 20, 40, 160, 80, 100, 160, 120, 300, 140, 280, 100]

    var name = 'PolyNoMeal';
    var xyz = [40, 20, 40, 160, 80, 100, 160, 120, 300, 140, 280, 100, 40, 20];
    var color = '#00D2FF';
    var borderColor = 'black';
    var borderWidth = 2;
    
    var a = 100;
    var b = 50;
    var x = 500;
    var y = 200;
    
    drawEllipse( a, b, x, y, 'yellow', borderWidth, borderColor );
    drawPolygon( name, xyz, color, borderColor, borderWidth );
    drawPolygon( "Two", xyz, color, borderColor, borderWidth );
    drawPolygon( "Freee", xyz, color, borderColor, borderWidth );
}

// documentHasLoaded
$(document).ready(function()
{
    grow();
});

// Event Handling

$(window).resize(function () 
{ 
    width = window.innerWidth;
    height = window.innerHeight;
    stage.width(width);
    stage.height(height);
    stage.draw();
    layer.draw();
    drawGrid(20); 
});

stage.on("dragend", function(e)
{
    // var pos = stage.getPointerPosition();
    // var shape = layer.getIntersection(pos);
    console.log( "e.target = " + e.target.x() );
    //layer.draw();
});
    //var layer = new Konva.Layer();

stage.on('click', function (e) 
{
    /*
    var x = e.target.x();
    var y = e.target.y();
    if (e.target.className == "Ellipse" || e.target.className == "Line") 
    {
        drawRectangle( "ShapeOptions", x, y, 150, 200, 'brown', 'black', 1);
    }
     */
     
    /* Transformation is too buggy for now
    // if click on empty area - remove all transformers
    if (e.target === stage) {
    stage.find('Transformer').destroy();
    layer.draw();
    return;
    }
    if (e.target.className != "Ellipse" && e.target.className != "Line") 
    {
        return;
    }
    // # plot add the transform button 
    // remove old transformers
    stage.find('Transformer').destroy();

    // create new transformer
    var tr = new Konva.Transformer();
    layer.add(tr);
    tr.attachTo(e.target);
    layer.draw();
    */
});