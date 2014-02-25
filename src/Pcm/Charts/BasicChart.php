<?php namespace Pcm\Charts;

use Pcm\Charts\Libraries\FusionChartsLibrary;
/**
 * Description of BasicChart
 *
 * @author gamacsan
 */
class BasicChart extends AbstractChart{
	//put your code here
	
	public function __construct()
	{
		$fusionChartsLibrary = new FusionChartsLibrary('MSCombi2D');
		
		parent::__construct($fusionChartsLibrary);
	}
}
