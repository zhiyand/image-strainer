<?php
include('Strainer.class.php');
include('Lomo.class.php');
include('Pipeline.class.php');

$im = new Imagick('images/1.jpg');

//imagefilter( $im , IMG_FILTER_CONTRAST, -10 );

$pipeline = new Pipeline();

$lomo = new Lomo(2.5);

$pipeline->addStrainer($lomo);

$pipeline->process($im);

$im->setImageFormat('jpeg');

header('Content-Type: image/jpeg');

echo $im;

?>
