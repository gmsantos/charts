<?php namespace Pcm\Charts;

use Pcm\Charts\Libraries\FusionChartsLibrary;
/**
 * Description of BasicChart
 *
 * @author gamacsan
 */
class MultiSeriesChart extends AbstractChart{
	use Traits\MultiSeriesTrait;
	
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

}
