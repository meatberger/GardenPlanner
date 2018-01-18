<?
/*
 * Home.php
 * © Andrew Berger, Pellissippi State Community College
 * The main page for the Garden Planner
 */
 
 require_once 'FileIO.php';
 ?>
<html>
<head>
<script src="https://cdn.rawgit.com/konvajs/konva/1.7.3/konva.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<div id="container"></div>
<script>
/*
    var width = window.innerWidth;
    var height = window.innerHeight;
    var stage = new Konva.Stage({
      container: 'container',
      width: width,
      height: height
    });
    
    var layer = new Konva.Layer();
    var poly = new Konva.Line({
      points: [23, 20, 23, 160, 70, 93, 150, 109, 290, 139, 270, 93],
      fill: '#00D2FF',
      stroke: 'black',
      strokeWidth: 5,
      closed : true
    });
    // add the shape to the layer
    layer.add(poly);
    // add the layer to the stage
    stage.add(layer);
    */
    var gridSize = 20;
    var width = window.innerWidth;
    var height = window.innerHeight;
    var stage = new Konva.Stage(
    {
        container: 'container',
        width: width,
        height: height
    });
    var background = new Konva.Layer();
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
    var layer = new Konva.Layer();
    var poly = new Konva.Line({
      points: [40, 20, 40, 160, 80, 100, 160, 120, 300, 140, 280, 100],
      fill: '#00D2FF',
      stroke: 'black',
      strokeWidth: 0,
      closed : true,
      draggable : true,
      name : "blob"
    });
    // add the shape to the layer
    layer.add(poly);
    // add the layer to the stage
    stage.add(layer);
    var previousShape;

	function ajaxCall(url)
	{
	    if(var1!==false){url=url+'?'+var1Name+'='+var1;}
	    if(var2!==false){url=url+'&'+var2Name+'='+var2;}
		$.ajax(
	    {
		async:true, url:url,success:function(result)
		    {
			json = result;
		}
	    } )
		    .done(function(msg)
		{
		    done = true;
		 
		    switch(msg)
		    {
		        case '23':
		        alert('You may buy no more than 10 of any item');
		        $('#quantity'+id).val(10);
		        break;

		        case '24':
		        alert('Invalid Entry');
		        $('#quantity'+id).val(1);
		        break;

		        default:
		        json=msg;
		        break;
		    }
		        ajaxDone();
		});
	}
    stage.on("dragend", function(e)
    {
        // var pos = stage.getPointerPosition();
        // var shape = layer.getIntersection(pos);
        console.log( "e.target = " + e.target.x() );
	var1
        //layer.draw();
    });
  </script>
</html> 
