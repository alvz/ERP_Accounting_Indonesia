<?php
$this->breadcrumbs=array(
		'G people',
);

$this->menu4=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gLeave')),
);


//$this->menu1=gLeave::getTopUpdated();
//$this->menu2=gLeave::getTopCreated();
$this->menu5=array('Leave');

?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		Leave
	</h1>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
)); ?>

