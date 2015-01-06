<?php namespace Pcm\Charts\Traits;

/**
 * Description of StakedTrait
 *
 * @author gamacsan
 */
trait StackedMultiSeriesTrait {

	protected $datasets = array();
	protected $datasetParams = array();
	private $isDatasetInitialized = false;

	public function setDataSet($dataSet)
	{
		$this->datasets = $dataSet;
	}

	public function setDataSetParams($dataSetParams)
	{
		$this->datasetParams = $dataSetParams;
	}


	public function builtMsStackedDataseries($dataArray, $datasets, $datasetParams)
	{
		foreach ($datasets as $key => $datasetName)
		{
			if(is_array($datasetName)){
				$this->isDatasetInitialized = false;
				$this->builtMsStackedDataseries($dataArray, $datasetName, $datasetParams);
				continue;
			}
			
			// Make sure this dataset has params to inject
			$datasetConfig = isset($datasetParams[$key]) ? $datasetParams[$key] : array();

			$this->initializeDataset();
			
			if (isset($datasetConfig['renderAs']) && $datasetConfig['renderAs'] == 'line')
			{
				$this->chartLib->addDatasetMSLine($datasetName, $datasetConfig);
				$addDataMethod = 'addMSLinesetData';
			}
			else
			{
				$this->chartLib->addSubDatasetMS($datasetName, $datasetConfig);
				$addDataMethod = 'addChartData';
			}

			if (isset($dataArray[$key]))
			{
				$this->insertDataInDataset($dataArray[$key], $addDataMethod);
			}
		}
	}
	
	private function initializeDataset()
	{
		if (!$this->isDatasetInitialized)
		{
			$this->chartLib->createMSStDataset();
			$this->isDatasetInitialized = true;
		}
	}

	private function insertDataInDataset($dataArray, $addDataMethod)
	{
		foreach ($dataArray as $value)
		{
			$this->chartLib->{$addDataMethod}($value);
		}
	}

}
