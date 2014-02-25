<?php namespace Pcm\Charts\Libraries;

require_once __DIR__ . '/../../../FusionCharts.php';

/**
 * Description of FusionChartsLibrary
 *
 * @author gamacsan
 */
class FusionChartsLibrary implements ChartLibraryInterface{
	
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
		foreach ($chartParams as $param => $value){
			$this->fusionChart->setChartParam($param, $value);
		}
	}

	public function outputJSON()
	{
		// TODO: fusioncharts do NOT does this
	}

	public function outputXML()
	{
		return $this->fusionChart->getXML();
	}

}
