<div style="width:100%">
<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
		  'chart' => array('defaultSeriesType' => 'column'),
		  'title' => array('text' => 'Employee Composition by Service Years'),
		  'xAxis' => array(
			 'categories' => array('<1','1-2','3-4','5-6','7-8','>8')
		  ),
		  'yAxis' => array(
			 'title' => array('text' => 'Total')
		  ),
		  'series' => array(
			 array('name' => 'Working Years', 'data' => gPerson::compWorking())
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