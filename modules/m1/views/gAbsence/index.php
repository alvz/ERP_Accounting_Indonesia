<?php
$this->breadcrumbs=array(
		'G people',
);

$this->menu=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gAbsence')),
		array('label'=>'Schedule Upload', 'icon'=>'calendar','url'=>array('timeBlock')),
		array('label'=>'Attendance Upload', 'icon'=>'user','url'=>array('attendBlock')),
);

$this->menu1=gPerson::getTopUpdated();
$this->menu2=gPerson::getTopCreated();

?>

<div class="pull-right">
	<?php $this->renderPartial('/gAbsence/_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		Attendance
	</h1>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'/gPerson/_view',
)); ?>
