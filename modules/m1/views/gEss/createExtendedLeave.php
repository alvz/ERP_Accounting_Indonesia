<?php
$this->breadcrumbs=array(
		'G Cutis'=>array('index'),
		'Create',
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
		array('label'=>'New Permission', 'icon'=>'edit', 'url'=>array('createPermission')),
);


?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		Extended Leave
	</h1>
</div>


<?php echo $this->renderPartial('_formExtendedLeave', array('model'=>$model)); ?>