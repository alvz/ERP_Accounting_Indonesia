<?php
$this->breadcrumbs=array(
		'G people'=>array('index'),
		$model->id,
);

$this->menu4=array(
		array('label'=>'Home ESS', 'icon'=>'home', 'url'=>array('/m1/gEss')),
		array('label'=>'Profile', 'icon'=>'user', 'url'=>array('/m1/gEss/person')),
		array('label'=>'Leave', 'icon'=>'plane', 'url'=>array('/m1/gEss/leave')),
		array('label'=>'Permission', 'icon'=>'cog', 'url'=>array('/m1/gEss/permission')),
		array('label'=>'Attendance', 'icon'=>'', 'url'=>'#'),
);

$this->menu=array(
		array('label'=>'New Permission', 'icon'=>'edit', 'url'=>array('createPermission')),
);


//$this->menu1=gPermission::getTopUpdated();
//$this->menu2=gPermission::getTopCreated();
//$this->menu5=array('Permission');

?>

<div class="page-header">
	<h1>
		<?php //echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		<div style="width:50px; float:left; margin-right:10px">
		<?php 
			echo $model->photoPath;
		?>
		</div>
		<?php echo $model->employee_name; ?>
	</h1>
</div>

<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
		//$this->widget('ext.groupgridview.GroupGridView', array(
		//'extraRowColumns' => array('start_date'),
		'id'=>'g-permission-grid',
		'dataProvider'=>gPermission::model()->search($model->id),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				'start_date',
				'end_date',
				'number_of_day',
				array(
					'header'=>'Permission Type',
					'value'=>'$data->permission_type->name',
				),
				'permission_reason',
				array(
					'header'=>'State',
					'value'=>'$data->approved->name',
				),
				array(
						'class'=>'TbButtonColumn',
						'template'=>'{cupdate}',
						'buttons'=>array
						(
								'cupdate' => array
								(
										'label'=>'Update',
										'url'=>'Yii::app()->createUrl("/m1/gEss/updatePermission",array("id"=>$data->id))',
										'visible'=>'$data->approved_id ==1',
										'options'=>array(
												'class'=>'btn btn-mini',
										),
								),
						),

				),
				array(
						'class'=>'TbButtonColumn',
						'template'=>'{print}',
						'buttons'=>array
						(
								'print' => array
								(
										'label'=>'Print',
										'url'=>'Yii::app()->createUrl("/m1/gEss/printPermission",array("id"=>$data->id))',
										'visible'=>'$data->approved_id ==1',
										'options'=>array(
												'class'=>'btn btn-mini',
												'target'=>'_blank',
										),
								),
						),

				),
		),
)); ?>
