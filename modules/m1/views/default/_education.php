<div style="width:100%">
<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
		  'chart' => array('defaultSeriesType' => 'column'),
		  'title' => array('text' => 'Employee Composition by Education'),
		  'xAxis' => array(
			 'categories' => array('NE','SLTP','SLTA','Dipl','S1','S2','S3')
		  ),
		  'yAxis' => array(
			 'title' => array('text' => 'Total')
		  ),
		  'series' => array(
			 array('name' => 'Education', 'data' => gPerson::compEducation())
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