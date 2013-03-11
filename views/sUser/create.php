<?php
$this->breadcrumbs=array(
		'User'=>array('index'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
);

$this->menu=array(
		array('label'=>'Home', 'url'=>array('/sUser')),
);

$this->menu2=sUser::getTopCreated();

?>

<div class="page-header">
	<h1>
		<i class="iconic-user"></i>
		<?php echo "Create New User"; ?>
	</h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>