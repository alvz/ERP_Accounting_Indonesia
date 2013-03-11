<?php
$this->breadcrumbs=array(
		'G people',
);

$this->menu=array(
		array('label'=>'Home','url'=>array('/m1/gPermission')),
		//array('label'=>'Manage gPerson','url'=>array('admin')),
);


//$this->menu1=gPermission::getTopUpdated();
//$this->menu2=gPermission::getTopCreated();
$this->menu5=array('Permission');

?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		Permission
	</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
				array('label'=>'Waiting for Approval','url'=>Yii::app()->createUrl('/m1/gPermission')),
				array('label'=>'Approved Permission','url'=>Yii::app()->createUrl('/m1/gPermission/onApproved')),
				array('label'=>'Pending State','url'=>Yii::app()->createUrl('/m1/gPermission/onPending')),
				array('label'=>'Employee On Permission','url'=>Yii::app()->createUrl('/m1/gPermission/onPermission'),'active'=>true),
				array('label'=>'Recent Permission','url'=>Yii::app()->createUrl('/m1/gPermission/onRecent')),
		),
));
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'g-person-grid',
		'dataProvider'=>gPermission::model()->onPermission(),
		//'filter'=>$model,
		'template'=>'{items}{pager}',
		'columns'=>array(
				array(
						'header'=>'Name',
						'type'=>'raw',
						'value'=>'CHtml::link($data->person->employee_name,Yii::app()->createUrl("/m1/gPermission/view",array("id"=>$data->parent_id)))',
				),
				array(
					'header'=>'Department',
					'name'=>'person.company.department.name',
				),
				'start_date',
				'end_date',
				'number_of_day',
		),
)); ?>
