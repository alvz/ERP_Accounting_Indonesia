<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */

$this->breadcrumbs=array(
	'H Vacancies'=>array('index'),
	'Create',
);

$this->menu7=hVacancy::model()->getTopRecentVacancy();

$this->menu=array(
		array('label'=>'Vacancy', 'icon'=>'home', 'url'=>array('/m1/hVacancy')),
		array('label'=>'Applicant', 'icon'=>'home', 'url'=>array('/m1/hApplicant')),
		array('label'=>'Interview', 'icon'=>'home', 'url'=>array('/m1/hVacancy/interview')),
);
$this->menu4=hVacancyApplicant::model()->getTopRecentInterview();
$this->menu8=hApplicant::model()->getTopRecentApplicant();

?>

<div class="page-header">
<h1>Update</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>