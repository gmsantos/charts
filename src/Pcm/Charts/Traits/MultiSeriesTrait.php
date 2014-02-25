<?php namespace Pcm\Charts\Traits;

/**
 * Description of StakedTrait
 *
 * @author gamacsan
 */
trait MultiSeriesTrait {

	protected $datasets = array();
	protected $datasetParams = array();
	
	public function setDataSet($dataSet)
	{
		$this->datasets = $dataSet;
	}

	public function setDataSetParams($dataSetParams)
	{
		$this->datasetParams = $dataSetParams;
	}
	
	public function addDataset($dataMatrix, $datasets, $datasetParams)
	{
		foreach ($datasets as $key => $datasetName){
			$params = isset($datasetParams[$key]) ? $datasetParams[$key] : '';
			//\Debugbar::info($datasetName);
			$this->chartLib->addDataset($datasetName, $params);
			foreach($dataMatrix[$key] as $value){
				$this->chartLib->addChartData($value);
			}
		}
	}

}
