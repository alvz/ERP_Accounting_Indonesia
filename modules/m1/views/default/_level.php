<div style="width:100%">
<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
		  'chart' => array('defaultSeriesType' => 'column'),
		  'title' => array('text' => 'Employee Composition by Level'),
		  'xAxis' => array(
			 'categories' => array('Pelaksana','Officer','Supervisor','Manager','General Manager','Vice President')
		  ),
		  'yAxis' => array(
			 'title' => array('text' => 'Total')
		  ),
		  'series' => array(
			 array('name' => 'Level', 'data' => gPerson::compLevel())
		  ),
			'plotOptions'=> array (
                'column'=> array (
                    'dataLabels'=> array (
                        'enabled'=> true,
                        'color'=> 'colors[0]',
                        'style'=> array (
                            'fontWeight'=> 'bold'
                        ),
                    )
                )
            ),
	   )
	));		
?>
<br/>

</div>