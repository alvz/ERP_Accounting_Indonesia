<div class="row-fluid">
	<?php 
	//$this->widget('bootstrap.widgets.TbGridView', array(
	$this->widget('ext.groupgridview.TbGroupGridView', array(
		'extraRowColumns' => array('tMonth'),  
			'id'=>'employee-grid',
			'dataProvider'=>gPerson::model()->employeeOut(),
			'template'=>'{items}',
			'enableSorting'=>false,
			'columns'=>array(
				array(
				'name' => 'tMonth',
				'value' => 'date("M-Y", strtotime($data->status->start_date))',
				'headerHtmlOptions' => array('style' => 'display: none'),
				'htmlOptions' => array('style' => 'display: none'),
				),
				array(
					'type'=>'raw',
					'value'=>'$data->gPersonPhoto',
					'htmlOptions'=>array("width"=>"55px"),
				),
				array(
					'header' => 'Detail',
					'type' => 'raw',
					'value'=> function($data){
						return CHtml::tag('div', array('style'=>'font-weight: bold'), $data->gPersonLink)
							. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), $data->company->department->name)
							. $data->company->level->name
							. "</br>"
							. $data->company->start_date
							. " to "
							. $data->status->start_date;
					}
				),					
				//array(
				//	'header'=>'Join/ Resign Date',
				//	'type' => 'raw',
				//	'value'=> function($data){
				//		return $data->company->start_date
				//		. "</br>"
				//		. $data->status->start_date;
				//	}
				//	//'value'=>'$data->company->start_date',
				//),
				//array(
				//	'header'=>'Resign Date',
				//	'value'=>'$data->status->start_date',
				//),
				//'company.company.name',
				//array(
				//	'header'=>'Status',
				//	'name'=>'status.status.name',
				//),
				//'status.remark',
			),
	)); ?>
</div>
