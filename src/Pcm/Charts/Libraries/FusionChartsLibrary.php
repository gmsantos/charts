<?php namespace Pcm\Charts\Libraries;

require_once __DIR__ . '/../../../FusionCharts.php';

/**
 * Description of FusionChartsLibrary
 *
 * @author gamacsan
 */
class FusionChartsLibrary implements ChartLibraryInterface {

	protected $fusionChart;

	public function __construct($chartType)
	{
		$this->fusionChart = new \FusionCharts($chartType);
	}

	public function addXAxisPoints($xAxisLabels)
	{
		$this->fusionChart->addCategoryFromArray($xAxisLabels);
	}

	public function injectChartParams($chartParams)
	{
		foreach ($chartParams as $param => $value) {
			$this->fusionChart->setChartParam($param, $value);
		}
	}

	public function addDataset($datasetName, $params = "")
	{
		$this->fusionChart->addDataset($datasetName, $params);
	}

	public function addChartData($value)
	{
		$this->fusionChart->addChartData($value);
	}

	public function outputJSON()
	{
		// TODO: fusioncharts does not do this
	}

	public function outputXML()
	{
		return $this->fusionChart->getXML();
	}

}
