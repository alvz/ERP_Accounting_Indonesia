<div style="width:100%">
<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
		  'chart' => array('defaultSeriesType' => 'column'),
		  'title' => array('text' => 'Employee Composition by Religion'),
		  'xAxis' => array(
			 'categories' => array('Islam','Kr. Protestan','Kr. Katolik','Budha','Hindu','Kong Hu Cu')
		  ),
		  'yAxis' => array(
			 'title' => array('text' => 'Total')
		  ),
		  'series' => array(
			 array('name' => 'Religion', 'data' => gPerson::compReligion())
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
</div>