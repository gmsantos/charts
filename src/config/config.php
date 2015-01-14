<?php

// TODO: Docblocks and Logicaly organize params

return array(
	
	/*
	|--------------------------------------------------------------------------
	| Loading
	|--------------------------------------------------------------------------
	|
	| Relax! it's just a template :)
	|
	*/
	
	'ChartNoDataText'     => 'No data to display.',
	'PBarLoadingText'     => 'Loading',
	
	/*
	|--------------------------------------------------------------------------
	| Export
	|--------------------------------------------------------------------------
	|
	| Relax! it's just a template :)
	|
	*/
	
	'exportHandler'       => '/FusionChartsExporter.php',
	'exportEnabled'       => 1,
	'exportAtClient'      => 1,
	'exportShowMenuItem'  => 1,
	'showExportDialog'    => 0,
	'exportDialogMessage' => 'Exporting',
	'exportFileName'      => 'graph',
	'exportAction'        => 'save',
	'exportFormat'        => 'png',
	'saveMode'            => 'both',
	'exportCallback'      => 'FC_Exported',
		
	/*
	|--------------------------------------------------------------------------
	| Style
	|--------------------------------------------------------------------------
	|
	| Relax! it's just a template :)
	|
	*/
	
	'baseFontSize'        => 10,
	'animation'           => 0,
	'showLabels'          => 1,
	'showLegend'          => 1,
	'labelDisplay'        => 'auto',
	'logoURL'             => '',
	'logoPosition'        => '',
	'bgColor'             => 'F2F3FF, FFFFFF',
	'bgAlpha'             => '80, 100',
	'bgRatio'             => '20, 80',
	'bgAngle'             => '270',
	'borderColor'         => 'EBEBEB',
	'borderThickness'     => 1,
	'showBorder'          => 1,
	'useRoundEdges'       => 1,
	'legendIconScale'     => 2,
	
	/*
	|--------------------------------------------------------------------------
	| Number Formating
	|--------------------------------------------------------------------------
	|
	| Relax! it's just a template :)
	|
	*/

	'numberSuffix'        => '',
	'numberPrefix'        => '',
	'formatNumberScale'   => 1,
	'sFormatNumberScale'  => 1, 
	'decimalPrecision'    => 2,
	'decimalSeparator'    => ',',
	'thousandSeparator'   => '.',
		
);
