<?php
$this->breadcrumbs=array(
		'Selection'=>array('index'),
		'Create',
);

$this->menu4=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gSelection')),
);

$this->menu=array(
	array('label'=>'Report', 'icon'=>'print', 'url'=>array('report')),
);


$this->menu1=gSelection::getTopUpdated();
$this->menu2=gSelection::getTopCreated();

?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/users_go.png') ?>
		Create
	</h1>
</div>


<?php echo $this->renderPartial('/gSelection/_form', array('model'=>$model)); ?>