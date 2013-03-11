<?php
$this->breadcrumbs=array(
		'Leave'=>array('index'),
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
		array('label'=>'New Leave', 'icon'=>'edit', 'url'=>array('createLeave')),
		array('label'=>'Cancellation Leave', 'icon'=>'edit', 'url'=>array('createCancellationLeave')),
		array('label'=>'Extended Leave', 'icon'=>'edit', 'url'=>array('createExtendedLeave')),
);

$this->menu1=array(
		array('label'=>'Print Leave History', 'icon'=>'print', 'url'=>array('/m1/gEss/summaryLeave',"pid"=>$model->id)),
);


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
	echo $this->renderPartial("/gLeave/_LeaveBalance", array("model"=>$model), true);
?>

<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
		//$this->widget('ext.groupgridview.GroupGridView', array(
		//'extraRowColumns' => array('d_cuti'),
		'id'=>'g-person-grid',
		'dataProvider'=>gLeave::model()->search($model->id),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				array(
					'name'=>'start_date',
					'htmlOptions'=>array(
						'style'=>'width:85px',
					)
				),
				array(
					'name'=>'end_date',
					'htmlOptions'=>array(
						'style'=>'width:85px',
					)
				),
				'number_of_day',
				//'work_date',
				array(
						'name'=>'leave_reason',
						'htmlOptions'=>array(
							'style'=>'width:250px',
						)
				),
				//'leave_reason',
				'mass_leave',
				'person_leave',
				'balance',
				//'replacement',
				array(
						'header'=>'State',
						'value'=>'$data->approved->name',
						'htmlOptions'=>array(
							'style'=>'width:150px',
						)
				),
				array(
						'class'=>'TbButtonColumn',
						'template'=>'{mydelete}',
						'buttons'=>array
						(
								'mydelete' => array
								(
										'label'=>'Del',
										//'icon'=>'icon-delete',
										'url'=>'Yii::app()->createUrl("/m1/gEss/deleteLeave",array("id"=>$data->id))',
										'visible'=>'$data->balance == null',
										'options'=>array(
												'class'=>'btn btn-mini',
										),
								),
						),

				),
				array(
						'class'=>'TbButtonColumn',
						'template'=>'{cupdate}{cupdatecancel}',
						'buttons'=>array
						(
								'cupdate' => array
								(
										'label'=>'Update',
										'url'=>'Yii::app()->createUrl("/m1/gEss/updateLeave",array("id"=>$data->id))',
										'visible'=>'$data->approved_id ==1',
										'options'=>array(
												'class'=>'btn btn-mini',
										),
								),
								'cupdatecancel' => array
								(
										'label'=>'Update',
										'url'=>'Yii::app()->createUrl("/m1/gEss/updateCancellationLeave",array("id"=>$data->id))',
										'visible'=>'$data->approved_id ==8 AND $data->balance ==null',
										'options'=>array(
												'class'=>'btn btn-mini',
										),
								),
						),

				),
				array(
						'class'=>'TbButtonColumn',
						'template'=>'{print}{printcancel}',
						'buttons'=>array
						(
								'print' => array
								(
										'label'=>'Print',
										'url'=>'Yii::app()->createUrl("/m1/gEss/printLeave",array("id"=>$data->id))',
										'visible'=>'$data->approved_id ==1',
										'options'=>array(
												'class'=>'btn btn-mini',
												'target'=>'_blank',
										),
								),
								'printcancel' => array
								(
										'label'=>'Print',
										'url'=>'Yii::app()->createUrl("/m1/gEss/printCancellationLeave",array("id"=>$data->id))',
										'visible'=>'$data->approved_id ==8 AND $data->balance ==null',
										'options'=>array(
												'class'=>'btn btn-mini',
												'target'=>'_blank',
										),
								),
						),

				),
		),
)); ?>
