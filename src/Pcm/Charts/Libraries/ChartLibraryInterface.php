<?php namespace Pcm\Charts\Libraries;

/**
 *
 * @author gamacsan
 */
interface ChartLibraryInterface {
	public function injectChartParams($chartParams);
	public function addXAxisPoints($xAxisLabels);
	public function outputXML();
	public function outputJSON();
}
