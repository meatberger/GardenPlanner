<?
/*
 * Home.php
 * Pellissippi State Garden
 * Andrew Berger
 * The main page for the Garden Planner
 */
 
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
    for (var i = 0; i <= (width / gridSize); i++) {
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
      closed : true
    });
    // add the shape to the layer
    layer.add(poly);
    // add the layer to the stage
    stage.add(layer);
    
  </script>
</html> 