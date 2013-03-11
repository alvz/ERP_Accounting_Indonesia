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
		array('label'=>'Update Profile', 'icon'=>'edit', 'url'=>array('updatePerson')),
		array('label'=>'New Leave', 'icon'=>'edit', 'url'=>array('createLeave')),
		array('label'=>'Cancellation Leave', 'icon'=>'edit', 'url'=>array('createCancellationLeave')),
		array('label'=>'Extended Leave', 'icon'=>'edit', 'url'=>array('createExtendedLeave')),
		array('label'=>'New Permission', 'icon'=>'edit', 'url'=>array('createPermission')),
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

..Reserved Personal Space..