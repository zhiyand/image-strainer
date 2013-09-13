<?php
if(!class_exists('Strainer')):

abstract class Strainer{
	function __construct(){
	}
	abstract public function process($im);
};

endif;
?>
