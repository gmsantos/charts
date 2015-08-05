<?php namespace Pcm\Charts\Traits;

trait BasicTrait {

	public function builtDataset($dataArray)
	{
		foreach ($dataArray as $label => $value) {
			$this->chartLib->addChartData($value, $label);
		}
	}

}
