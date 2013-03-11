<div style="width:100%">
<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
		  'chart' => array('defaultSeriesType' => 'column'),
		  'title' => array('text' => 'Employee Join and Resign by Month ('.date("Y").')'),
		  'xAxis' => array(
			 'categories' => array('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des')
		  ),
		  'yAxis' => array(
			 'title' => array('text' => 'Total')
		  ),
/*		  'series' => array(
			 array('name' => 'Tenant', 'data' => array(1,3,2,3,2,1,2,0,2,3,1,0)),
			 array('name' => 'BOD', 'data' => array(0,0,1,2,1,0,0,1,1,2,1,1))
		  ),
*/		  'series'=>gPerson::compEmployeeIn(),	
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