<?php
include('Strainer.class.php');
include('Overlay.class.php');
include('Pipeline.class.php');

$im = imagecreatefromjpeg('images/1.jpg');

/*
imagefilter( $im , IMG_FILTER_PIXELATE, 100, 1);
 */

$pipeline = new Pipeline();

$overlay = new Overlay();

$pipeline->addStrainer($overlay);

$pipeline->process($im);

imagejpeg($im, 'output.jpg');

?>
