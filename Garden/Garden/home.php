<?
/*
 * Home.php
 * © Andrew Berger, Pellissippi State Community College
 * The main page for the Garden Planner
 */
 
require_once 'VisualGarden.php';
require_once 'simple_html_dom.php';

function imageForKey( $searchKey )
{
    $searchKey=str_replace( ' ', '+', ( $searchKey . " plant" ) );
    $html = @file_get_html("https://www.google.com/search?q=site:www.burpee.com/+".$searchKey."&tbm=isch") ?? false;
    $result = $html ? $html->find('img') : false;
    if($result)
        return '<img src="'.$result[0]->src.'">';
    else
        return null;
}

function imageOf( $plant )
{
    echo imageForKey($plant) ?? "<p>No Image</p>";
}

if(isset($_POST["submit"]))
{
    $garden = new VisualGarden;
    var_dump($garden);
}

?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/konvajs/konva/master/konva.min.js"></script>
<script src="global.js"></script>
<!--Create a container for garden.js to draw with konva in-->
<div id="konvaCanvas"></div>
<script src="garden.js"></script>

<link rel="stylesheet" type="text/css" href="global.css"/>
</head>

<form method="post" action="" enctype="multipart/form-data">
<input type="file" name="userfile" id="userfile" />
<input type="submit" value="Upload Garden File" name="submit" />
</form>

</html> 
