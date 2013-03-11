<?php
	//$this->renderPartial('/gLeave/_leaveDetail',array('model'=>$model));
?>

<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
		//$this->widget('ext.groupgridview.GroupGridView', array(
		//'extraRowColumns' => array('start_date'),
		'id'=>'g-leave-grid',
		'dataProvider'=>GLeave::model()->search($model->id),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				//'start_date',
				'start_date',
				'end_date',
				'number_of_day',
				//'work_date',
				'leave_reason',
				'mass_leave',
				'person_leave',
				'balance',
				//'person.leaveBalance.balance',
				//'replacement',
				array(
						'header'=>'State',
						'value'=>'$data->approved->name',
				),
				array(
						'class'=>'TbButtonColumn',
						'template'=>'{print}',
						'buttons'=>array
						(
								'print' => array
								(
										'label'=>'Print',
										'url'=>'Yii::app()->createUrl("/m1/gLeave/printLeave",array("id"=>$data->id))',
										'visible'=>'$data->approved_id ==1 || $data->approved_id ==8',
										'options'=>array(
												'class'=>'btn btn-mini',
										),
								),
						),

				),
				array(
						'class'=>'TbButtonColumn',
						'template'=>'{approved}',
						'buttons'=>array
						(
								'approved' => array
								(
										'label'=>'Approved',
										'url'=>'Yii::app()->createUrl("/m1/gLeave/approved",array("id"=>$data->id,"pid"=>$data->person->id))',
										'visible'=>'$data->approved_id ==1 || $data->approved_id ==8',
										'options'=>array(
												'ajax'=>array(
														'type'=>'GET',
														'url'=>"js:$(this).attr('href')",
														'success'=>'js:function(data){
														$.fn.yiiGridView.update("g-leave-grid", {
														data: $(this).serialize()
														});
														}',
												),
												'class'=>'btn btn-mini',
										),
								),
						),

				),
				array(
						'class'=>'EJuiDlgsColumn',
						'template'=>'{update}{delete}',
						//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
						'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gLeave/delete",array("id"=>$data->id))',
						'updateDialog'=>array(
								'controllerRoute' => 'm1/gLeave/update',
								'actionParams' => array('id'=>'$data->id'),
								'dialogTitle' => 'Update Leave',
								'dialogWidth' => 512, //override the value from the dialog config
								'dialogHeight' => 530
						),
				),
		),
)); ?>
