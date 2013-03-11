<?php
/* @var $this GVacancyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'G Vacancies',
);

$this->menu5=array('Vacancy');
$this->menu7=hVacancy::model()->getTopRecentVacancy();

$this->menu=array(
		array('label'=>'Vacancy', 'icon'=>'home', 'url'=>array('/m1/hVacancy')),
		array('label'=>'Applicant', 'icon'=>'user', 'url'=>array('/m1/hApplicant')),
		array('label'=>'Interview', 'icon'=>'volume-up', 'url'=>array('/m1/hVacancy/interview')),
);
$this->menu4=hVacancyApplicant::model()->getTopRecentInterview();
$this->menu8=hApplicant::model()->getTopRecentApplicant();

?>



<div class="pull-right"  style="margin-top:15px;">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<h1>Vacancies List</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>'{items}{pager}',
	'itemView'=>'_view',
)); ?>

