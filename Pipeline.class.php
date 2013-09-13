<?php

class Pipeline{
	public function addStrainer(Strainer $strainer){
		$this->strainers[] = $strainer;

		return count($this->strainers) -1;
	}

	public function process($im){
		foreach($this->strainers as $strainer){
			$strainer->process($im);
		}
	}

	private $strainers;
};

?>
