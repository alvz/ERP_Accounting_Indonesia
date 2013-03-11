<?php
$this->breadcrumbs=array(
		'Feedback'=>array('index'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
);

$this->menu=array(
		array('label'=>'Home', 'url'=>array('/sFeedback')),
		array('label'=>'View', 'url'=>array('view', 'id'=>$model->id)),
);

$this->menu1=sFeedback::getTopUpdated();
$this->menu2=sFeedback::getTopCreated();


?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/preferences_desktop_notification.png') ?>
		Update:
		<?php echo $model->id; ?>
	</h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>