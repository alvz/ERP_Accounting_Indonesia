<?php
$this->breadcrumbs=array(
		'G people',
);

$this->menu4=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gBss')),
);

$this->menu=array(
		array('label'=>'Report', 'icon'=>'print', 'url'=>array('report')),
);

//$this->menu1=gSelection::getTopUpdated();
//$this->menu2=gSelection::getTopCreated();
$this->menu5=array('Selection');

?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/users_go.png') ?>
		Recruitment
	</h1>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'/gRecruitment/_view',
)); ?>

