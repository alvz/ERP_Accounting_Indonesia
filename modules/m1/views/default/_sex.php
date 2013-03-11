<div style="width:100%">
<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
			'chart' => array('defaultSeriesType' => 'column'),
			'title' => array('text' => 'Employee Composition by Gender'),
			'xAxis' => array(
				'categories' => array('Male', 'Female')
			),
			'yAxis' => array(
				'title' => array('text' => 'Total')
			),
			'series' => array(
				array('name' => 'Sex', 'data' => gPerson::compSex())
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