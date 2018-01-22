<?
/*
 * Home.php
 * © Andrew Berger, Pellissippi State Community College
 * The main page for the Garden Planner
 */
 
require_once 'VisualGarden.php';
require_once 'simple_html_dom.php';

function imageForKey($searchKey)
{
    $searchKey=str_replace(' ','+',$searchKey);
    $html = @file_get_html("https://www.google.com/search?q=site:www.burpee.com/+".$searchKey."&tbm=isch") ?? false;
    $result = $html!=false ? $html->find('img') : false;
    if($result!=false) return '<img src="'.$result[0]->src.'">';
    else return 'No Image';

    if(isset($_POST["submit"]))
    {
        $garden = new VisualGarden;
        var_dump($garden);
    }
}
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
		    }
		        ajaxDone();
		});
	}
    stage.on("dragend", function(e)
    {
        // var pos = stage.getPointerPosition();
        // var shape = layer.getIntersection(pos);
        console.log( "e.target = " + e.target.x() );
	
        //layer.draw();
    });
  </script>
<form method="post" action="" enctype="multipart/form-data">
<input type="file" name="userfile" id="userfile" />
<input type="submit" value="Upload Garden File" name="submit" />
</form>
</html> 
