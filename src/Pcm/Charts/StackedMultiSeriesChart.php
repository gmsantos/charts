<?php namespace Pcm\Charts;

use Pcm\Charts\Libraries\FusionChartsLibrary;

/**
 * Description of StackedMultiSeriesChart
 *
 * @author gamacsan
 */
class StackedMultiSeriesChart extends AbstractChart {
	use Traits\StackedMultiSeriesTrait;

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
	
}
