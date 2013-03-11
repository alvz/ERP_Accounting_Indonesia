<?php
$this->breadcrumbs=array(
		'G people'=>array('index'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
);


$this->menu7=hApplicant::model()->getTopRecentApplicant();

$this->menu=array(
		array('label'=>'Vacancy', 'icon'=>'home', 'url'=>array('/m1/hVacancy')),
		array('label'=>'Applicant', 'icon'=>'home', 'url'=>array('/m1/hApplicant')),
		array('label'=>'Interview', 'icon'=>'home', 'url'=>array('/m1/hVacancy/interview')),
);
?>

<?php $this->beginContent('/layouts/column1N'); ?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		<?php echo $model->applicant_name; ?>
	</h1>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<?php $this->endContent(); ?>