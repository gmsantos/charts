<?php namespace Pcm\Charts;

use Pcm\Charts\Libraries\FusionChartsLibrary;

/**
 * Description of BasicChart
 *
 * @author gamacsan
 */
class MultiSeriesChart extends AbstractChart{
//	use Traits\MultiSeriesTrait;
	
	/**
	 * Belongs to Traits\MultiSeriesTrait;
	 * 
	 * @var type 
	 */
	protected $datasets = array();
	
	/**
	 * Belongs to Traits\MultiSeriesTrait;
	 * 
	 * @var type 
	 */
	protected $datasetParams = array();
	
	public function __construct()
	{
		$fusionChartsLibrary = new FusionChartsLibrary('MSCombi2D');
		
		parent::__construct($fusionChartsLibrary);
	}

	protected function prepareToRender()
	{
		$this->chartLib->injectChartParams($this->chartParams);
		$this->chartLib->addXAxisPoints($this->xAxisLabels);
		$this->createDataSeries($this->dataMatrix, $this->datasets, $this->datasetParams);
	}

	/**
	 * Belongs to Traits\MultiSeriesTrait;
	 * 
	 * @param type $dataSet
	 */
	public function setDataSet($dataSet)
	{
		$this->datasets = $dataSet;
	}

	/**
	 * Belongs to Traits\MultiSeriesTrait;
	 * 
	 * @param type $dataSet
	 */
	public function setDataSetParams($dataSetParams)
	{
		$this->datasetParams = $dataSetParams;
	}
	
	/**
	 * Belongs to Traits\MultiSeriesTrait;
	 * 
	 * @param type $dataSet
	 */	
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
