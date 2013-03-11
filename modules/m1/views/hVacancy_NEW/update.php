<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */

$this->breadcrumbs=array(
	'H Vacancies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List hVacancy', 'url'=>array('index')),
	array('label'=>'Create hVacancy', 'url'=>array('create')),
	array('label'=>'View hVacancy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage hVacancy', 'url'=>array('admin')),
);
?>

<h1>Update hVacancy <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>