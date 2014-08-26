<?php namespace Pcm\Charts\Libraries;

/**
 *
 * @author gamacsan
 */
interface ChartLibraryInterface {
	public function injectChartParams($chartParams);
	public function addXAxisPoints($xAxisLabels);
	public function addDataset($datasetName, $params);
	public function addChartData($value);
	public function outputXML();
	public function outputJSON();
	public function addTrendLine($value, $label, $params);
}
