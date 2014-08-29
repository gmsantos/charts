<?php namespace Pcm\Charts;

use Pcm\Charts\Libraries\FusionChartsLibrary;

/**
 * Description of BasicChart
 *
 * @author gamacsan
 */
class StackedMultiSeriesChart extends AbstractChart {
	//use Traits\StackedMultiSeriesTrait;
	
	/**
	 * Belongs to Traits\StackedMultiSeriesTrait
	 */
	
	protected $datasets = [];
	protected $datasetParams = [];
	private $isMainDatasetInitialized = false;
	
	
	public function __construct()
	{
		$fusionChartsLibrary = new FusionChartsLibrary('MSStackedColumn2DLineDY');

		parent::__construct($fusionChartsLibrary);
	}

	protected function prepareToRender()
	{
		$this->chartLib->injectChartParams($this->chartParams);
		$this->chartLib->addXAxisPoints($this->xAxisLabels);
		$this->builtMsStackedDataseries($this->dataArray, $this->datasets, $this->datasetParams);
	}
	
	
	/**
	 * Belongs to Traits\StackedMultiSeriesTrait
	 */
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
			// Make sure this dataset has params to inject
			$datasetConfig = isset($datasetParams[$key]) ? $datasetParams[$key] : [];

			if (isset($datasetConfig['renderAs']) && $datasetConfig['renderAs'] == 'line')
			{
				$this->chartLib->addDatasetMSLine($datasetName, $datasetConfig);
				$addDataMethod = 'addMSLinesetData';
			}
			else
			{
				$this->initializeMainDataset();
				$this->chartLib->addSubDatasetMS($datasetName, $datasetConfig);
				$addDataMethod = 'addChartData';
			}

			if (isset($dataArray[$key]))
			{
				foreach ($dataArray[$key] as $value)
				{
					$this->chartLib->{$addDataMethod}($value);
				}
			}
		}
	}

	private function initializeMainDataset()
	{
		if (!$this->isMainDatasetInitialized)
		{
			$this->chartLib->createMSStDataset();
			$this->isMainDatasetInitialized = true;
		}
	}

}
