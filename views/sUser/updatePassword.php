<?php
$this->breadcrumbs=array(
		'User'=>array('index'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
);

$this->menu=array(
		array('label'=>'View Self', 'url'=>array('viewSelf','id'=>$model->id)),
);

//$this->menu2=sUser::getTopCreated();

?>

<div class="page-header">
	<h1>
		<i class="iconic-user"></i>
		<?php echo $model->username; ?>
	</h1>
</div>

<?php echo $this->renderPartial('_formPassword', array('model'=>$model)); ?>