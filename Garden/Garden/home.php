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
</head>
<div id="container"></div>
<script>
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
  </script>
</html> 