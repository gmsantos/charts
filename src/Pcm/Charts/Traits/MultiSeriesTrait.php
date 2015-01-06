<?php
namespace Pcm\Charts\Traits;

/**
 * Description of StakedTrait
 *
 * @author gamacsan
 */
trait MultiSeriesTrait
{

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

	public function builtDataseries($dataArray, $datasets, $datasetParams)
	{
		foreach ($datasets as $key => $datasetName)
		{
			// Make sure this dataset has params to inject
			$datasetConfig = isset($datasetParams[$key]) ? $datasetParams[$key] : array();
			
			$this->chartLib->addDataset($datasetName, $datasetConfig);
			foreach ($dataArray[$key] as $value)
			{
				$this->addChartData($value);
			}
		}
	}
}
