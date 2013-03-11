<?php
$this->breadcrumbs=array(
		'Recruitment',
);

$this->menu4=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gBss')),
		array('label'=>'Recruitment', 'icon'=>'user', 'url'=>array('/m1/gBss/recruitment')),
);

$this->menu=array(
		//array('label'=>'Report', 'icon'=>'print', 'url'=>array('report')),
);

//$this->menu1=gRecruitment::getTopUpdated();
//$this->menu2=gRecruitment::getTopCreated();
$this->menu5=array('Recruitment');

?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/users_go.png') ?>
		Branch Self Service	</h1>
</div>

