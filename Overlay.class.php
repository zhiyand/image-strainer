<?php

if(!class_exists('Overlay')):

class Overlay extends Strainer{
	public function process($im){
		$w = imagesx($im); $h = imagesy($im);

		$overlay = imagecreatetruecolor($w, $h);

		/* Create overlay layer */
		imagealphablending($overlay, false);
		$base = 10;

		$radius = $this->_distance(0, 0, $w/2, $h/2);
		$radius *= 1.5;

		for($i = 0; $i < $w; $i++){
			for($j = 0; $j < $h; $j++){
				$ratio = 1 - $this->_distance($i, $j, $w/2, $h/2) / $radius;
				$c = imagecolorallocatealpha($overlay, $base, $base, $base,
					$ratio * 127);

				imagesetpixel($overlay, $i, $j, $c);
			}
		}

		/* Put overlay layer on top of original image */
		imagealphablending($im, true); // Has to be true
		imagecopyresampled($im, $overlay,
			0, 0, 0, 0,
			$w, $h, $w, $h);
	}
	private function _distance($x1, $y1, $x2, $y2){
		return sqrt(pow($x1-$x2, 2) + pow($y1-$y2, 2));
	}
};

endif;

?>
