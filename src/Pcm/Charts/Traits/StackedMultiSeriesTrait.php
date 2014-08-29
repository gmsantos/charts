<?php namespace Pcm\Charts\Traits;

/**
 * Description of StakedTrait
 *
 * @author gamacsan
 */
trait StackedMultiSeriesTrait {

	protected $datasets = [];
	protected $datasetParams = [];
	private $isMainDatasetInitialized = false;

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
			// No data to insert, move on
			if (!isset($dataArray[$key])) {
				continue;
			}
			
			// Make sure this dataset has params to inject
			$datasetConfig = isset($datasetParams[$key]) ? $datasetParams[$key] : [];

			$addDataMethod = $this->chooseDataset($datasetName, $datasetConfig);

			foreach ($dataArray[$key] as $value) 
			{
				$this->chartLib->{$addDataMethod}($value);
			}
		}
	}

	private function chooseDataset($datasetName, $datasetConfig)
	{
		if (isset($datasetConfig['renderAs']) && $datasetConfig['renderAs'] == 'line') {
			$this->chartLib->addDatasetMSLine($datasetName, $datasetConfig);
			$addDataMethod = 'addMSLinesetData';
		} else {
			$this->initializeMainDataset();
			$this->chartLib->addSubDatasetMS($datasetName, $datasetConfig);
			$addDataMethod = 'addChartData';
		}

		return $addDataMethod;
	}

	private function initializeMainDataset()
	{
		if (!$this->isMainDatasetInitialized) {
			$this->chartLib->createMSStDataset();
			$this->isMainDatasetInitialized = true;
		}
	}

}
