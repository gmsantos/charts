<?php namespace Pcm\Charts\Libraries;

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
		$this->fusionChart->addDataset($datasetName, $this->arrayParamsToString($params));
	}

	public function addSubDatasetMS($datasetName, $params)
	{
		$this->fusionChart->addMSStSubDataset($datasetName, $this->arrayParamsToString($params));
	}

	public function addDatasetMSLine($datasetName, $params)
	{
		$this->fusionChart->addMSLineset($datasetName, $this->arrayParamsToString($params));
	}

	public function addChartData($value, $label = '', $params = [])
	{
		if (!is_null($label)) {
			$params['label'] = $label;
		}

		$this->fusionChart->addChartData($value, $this->arrayParamsToString($params));
	}

	public function addTrendLine($value, $label, $params)
	{
		$trendLine = $this->trendRange($value);
		$trendLine['displayvalue'] = $label;

		$this->fusionChart->addTrendLine($this->arrayParamsToString(array_merge($trendLine, $params)));
	}

	public function __call($name, $arguments)
	{
		if (method_exists($this->fusionChart, $name)) {
			switch (count($arguments)) {
				case 0:
					return $this->fusionChart->{$name}();
				case 1:
					return $this->fusionChart->{$name}($arguments[0]);
				case 2:
					return $this->fusionChart->{$name}($arguments[0], $arguments[1]);
				case 3:
					return $this->fusionChart->{$name}($arguments[0], $arguments[1], $arguments[2]);
				default:
					throw new \Exception('Too much params on ' . get_class($this->fusionChart));
			}
		} else {
			throw new \BadMethodCallException('Not Implemented Method on ' . get_class($this->fusionChart));
		}
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

		// Output a BOM and xml header
		// http://docs.fusioncharts.com/charts/contents/advanced/special-chars/SpChar.html
		return pack("C3", 0xef, 0xbb, 0xbf) . '<?xml version="1.0" encoding="utf-8" ?>' . $this->fusionChart->getXML();
	}

	private function arrayParamsToString($params)
	{
		$params = $this->fusionChart->FC_Transform($params, '{key}={value};');

		return $params;
	}

	private function trendRange($value)
	{
		if (is_array($value)) {
			$trendLine['startValue'] = $value[0];
			$trendLine['endValue'] = $value[1];
		} else {
			$trendLine['startValue'] = $value;
		}

		return $trendLine;
	}

}
