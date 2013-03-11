<?php
$this->breadcrumbs=array(
		'User'=>array('index'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
);

$this->menu=array(
		array('label'=>'Home', 'url'=>array('/sUser')),
		array('label'=>'View', 'url'=>array('view','id'=>$model->id)),
);

$this->menu2=sUser::getTopCreated();


?>

<div class="page-header">
	<h1>
		<i class="iconic-user"></i>
		<?php echo sUser::model()->findByPk((int)$sid)->username; ?>
	</h1>
</div>

<?php echo $this->renderPartial('_formModule', array('model'=>$model)); ?>