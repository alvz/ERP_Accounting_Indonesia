<?php
$this->breadcrumbs=array(
		'Feedback'=>array('index'),
		'Create',
);

$this->menu=array(
		array('label'=>'Home', 'url'=>array('/sFeedback')),
);

$this->menu1=sFeedback::getTopUpdated();
$this->menu2=sFeedback::getTopCreated();


?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/preferences_desktop_notification.png') ?>
		Create
	</h1>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>