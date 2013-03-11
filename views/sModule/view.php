<?php
$this->breadcrumbs=array(
		'Module'=>array('index'),
		$model->title,
);

$this->menu=array(
		array('label'=>'Home', 'url'=>array('/sModule')),
		array('label'=>'Update', 'url'=>array('update','id'=>$model->id)),
);

$this->menu4=sModule::getTopOther();

?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/blockdevice.png') ?>
		<?php echo $model->title; ?>
	</h1>
</div>

<?php 
$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
				'parent_id',
				'title',
				'description',
				'link',
		),
));


?>

<h2>User on this Module</h2>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'id'=>'user-module-grid',
		'dataProvider'=>sUserModule::model()->searchModule($model->id),
		'itemsCssClass'=>'table table-striped table-bordered',
		'template'=>'{items}{pager}',
		'columns'=>array(
				array(
						'name'=>'s_user.username',
						'type'=>'raw',
						'value'=>'CHtml::link($data->s_user->username,Yii::app()->createUrl("/sUser/view",array("id"=>$data->s_user->id)))',
				),
				array(
						'name'=>'s_user.default_group',
						'type'=>'raw',
						'value'=>'CHtml::link($data->s_user->organization->name,Yii::app()->createUrl("/aOrganization/view",array("id"=>$data->s_user->default_group)))',
				),
				array(
						'name'=>'s_user.status_id',
						'value'=>'$data->s_user->status->name',
				),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{delete}',
					'deleteButtonUrl'=>'Yii::app()->createUrl("/sModule/deleteUserModule",array("id"=>$data->id))',
				),

		),
)); ?>

<h2>Add New User</h2>
<?php 

$form=$this->beginWidget('TbActiveForm', array(
		'id'=>'user-module-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
)); ?>


<?php echo $form->dropDownListRow($modelUserModule,'s_user_id',sUser::model()->allUsers()); ?>

<?php echo $form->dropDownListRow($modelUserModule,'s_matrix_id', sMatrix::items('sMatrix'),array('class'=>'span3')); ?>

<div class="form-actions">
	<?php echo CHtml::htmlButton($modelUserModule->isNewRecord ? '<i class="icon-ok"></i> Create':'<i class="icon-ok"></i> Save', array('class'=>'btn', 'type'=>'submit')); ?>
</div>


<?php $this->endWidget(); ?>


