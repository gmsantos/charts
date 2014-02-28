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

	public function addDataset($datasetName, $params)
	{
		$this->fusionChart->addDataset($datasetName, $this->convertDatasetArrayParamsToString($params));
	}

	public function addChartData($value)
	{
		$this->fusionChart->addChartData($value);
	}

	public function outputJSON()
	{
		// TODO
	}

	/**
	 * Output chart data XML 
	 * 
	 * @param boolean $raw 
	 * @return string
	 */
	public function outputXML($raw = false)
	{
		if ($raw) {
			return $this->fusionChart->getXML();
		}
		
		// Output a BOM and xml encoding to XML
		// http://docs.fusioncharts.com/charts/contents/advanced/special-chars/SpChar.html
		return pack("C3", 0xef, 0xbb, 0xbf) 
			. '<?xml version="1.0" encoding="utf-8" ?>' 
			. $this->fusionChart->getXML();
	}

	private function convertDatasetArrayParamsToString($params)
	{
		$params = $this->fusionChart->FC_Transform($params, '{key}={value};');

		return $params;
	}

}
