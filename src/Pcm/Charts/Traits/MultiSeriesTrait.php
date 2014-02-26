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
	
	public function createDataSeries($dataMatrix, $datasets, $datasetParams)
	{
		foreach ($datasets as $key => $datasetName){
			
			// Make sure this dataset has params to inject
			$dataSetParams = isset($datasetParams[$key]) ? $datasetParams[$key] : array();
			
			$this->chartLib->addDataset($datasetName, $dataSetParams);
			foreach($dataMatrix[$key] as $value){
				$this->chartLib->addChartData($value);
			}
		}
	}

}
