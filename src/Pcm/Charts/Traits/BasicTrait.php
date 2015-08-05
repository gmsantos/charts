<?php namespace Pcm\Charts\Traits;

class BasicTrait {

	public function builtDataseries($dataArray)
	{
		foreach ($dataArray[$key] as $value) {
			$this->addChartData($value);
		}
	}

}
