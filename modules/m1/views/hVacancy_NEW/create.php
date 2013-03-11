<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */

$this->breadcrumbs=array(
	'H Vacancies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List hVacancy', 'url'=>array('index')),
	array('label'=>'Manage hVacancy', 'url'=>array('admin')),
);
?>

<h1>Create hVacancy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>