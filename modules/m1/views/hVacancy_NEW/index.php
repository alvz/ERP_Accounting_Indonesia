<?php
/* @var $this HVacancyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'H Vacancies',
);

$this->menu=array(
	array('label'=>'Create hVacancy', 'url'=>array('create')),
	array('label'=>'Manage hVacancy', 'url'=>array('admin')),
);
?>

<h1>H Vacancies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
