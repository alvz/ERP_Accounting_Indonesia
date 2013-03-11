<div class="row-fluid">
<?php 
	//$this->widget('bootstrap.widgets.TbGridView', array(
	$this->widget('ext.groupgridview.TbGroupGridView', array(
		//'extraRowColumns' => array('tMonth'),  
		'id'=>'employee-grid',
		'dataProvider'=>gPerson::model()->getBirthday(),
		'enableSorting'=>false,
		'template'=>'{items}',
		'columns'=>array(
			array(
				'type'=>'raw',
				'value'=>'$data->photoPath',
				'htmlOptions'=>array("width"=>"55px"),
			),
			array(
				'header' => 'Name',
				'type' => 'raw',
				'value'=> function($data){
					return CHtml::tag('div', array('style'=>'font-weight: bold'), $data->employee_name)
						. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), $data->company->department->name)
						. $data->company->level->name;
				}
			),					
			array(
				'header' => 'Birthday',
				'type' => 'raw',
				'value'=> function($data){
					return CHtml::tag('div', array('style'=>'font-weight: bold'), $data->birth_date)
						. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), ' ('. $data->countAge() .')')
						. $data->countBirthdate();
				},
				'htmlOptions'=>array("width"=>"250px"),
			),					
			array(
				'header'=>'Status',
				'name'=>'status.status.name',
			),
		),
)); ?>
</div>

	
