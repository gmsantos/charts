<?php namespace Pcm\Charts;

use Pcm\Charts\Libraries\FusionChartsLibrary;
use Pcm\Charts\Traits\BasicTrait;

/**
 * Description of BasicChart
 *
 * @author gamacsan
 */
class ParetoChart extends AbstractChart {
	
	use BasicTrait;

	public function __construct()
	{
		$fusionChartsLibrary = new FusionChartsLibrary('pareto2d');

		parent::__construct($fusionChartsLibrary);
	}

	protected function prepareToRender()
	{
		$this->chartLib->injectChartParams($this->chartParams);
		$this->chartLib->addXAxisPoints($this->xAxisLabels);
		$this->builtDataseries($this->dataArray);
	}


}
