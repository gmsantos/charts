<?php namespace Pcm\Charts;

use Illuminate\Support\Facades\Config;
use Pcm\Charts\Libraries\ChartLibraryInterface;

/**
 * Description of AbstractChart
 *
 * @author gamacsan
 */
abstract class AbstractChart {

	protected $chartLib;
	protected $chartParams   = array();
	protected $xAxisLabels   = array();
	protected $dataSet       = array();
	protected $dataSetParams = array();

	public function __construct(ChartLibraryInterface $chartLib)
	{
		$this->chartLib = $chartLib;
		$this->chartParams = Config::get('charts::config');
	}

	public function insertTitle($title)
	{
		$this->chartParams['caption'] = $title;
	}

	public function insertSubtitle($subtitle)
	{
		$this->chartParams['subcaption'] = $subtitle;
	}

	public function setXAxisName($label)
	{
		$this->chartParams['xAxisName'] = $label;
	}

	public function setYAxisName($label)
	{
		$this->chartParams['yAxisName'] = $label;
	}
	
	public function setSecondYAxisName($label)
	{
		$this->chartParams['yAxisName'] = $label;
	}
	
	public function setChartParams(Array $params)
	{
		array_merge($this->chartParams, $params);
	}

	public function addXAxisPoints(Array $xAxisLabels)
	{
		$this->xAxisLabels = $xAxisLabels;
	}

	public function renderAsXML()
	{
		$this->prepareToRender();

		return $this->chartLib->outputXML();
	}

	public function renderAsJSON()
	{
		$this->prepareToRender();

		return $this->chartLib->outputJSON();
	}

	protected function prepareToRender()
	{
		$this->chartLib->injectChartParams($this->chartParams);
		$this->chartLib->addXAxisPoints($this->xAxisLabels);
	}

}
