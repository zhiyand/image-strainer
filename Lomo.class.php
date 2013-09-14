<?php

class Lomo extends Strainer{
	public function __construct($crop_ratio){
		parent::__construct();

		$this->_crop_ratio = $crop_ratio;
	}
	public function process(Imagick $image){
		$geo = $image->getImageGeometry();

		$ratio = $this->_crop_ratio;

		$overlay = new Imagick();
		$overlay->newPseudoImage($geo['width'] * $ratio, $geo['height'] * $ratio, 
			"radial-gradient:none-black");

		$overlay->cropImage($geo['width'], $geo['height'],
			$geo['width']  * ($ratio/2-0.5),
			$geo['height'] * ($ratio/2-0.5));
		$overlay->setImagePage($geo['width'], $geo['height'], 0, 0);

		$image->levelImage(65535 * .33, 1.0, 65535, Imagick::CHANNEL_RED);
		$image->levelImage(65535 * .33, 1.0, 65535, Imagick::CHANNEL_GREEN);

		$image->compositeImage($overlay, $overlay->getImageCompose(), 0, 0);
	}

	private $crop_ratio = 2.5;
};

?>
