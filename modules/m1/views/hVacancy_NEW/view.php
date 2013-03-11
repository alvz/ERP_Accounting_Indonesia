<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */

$this->breadcrumbs=array(
	'H Vacancies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List hVacancy', 'url'=>array('index')),
	array('label'=>'Create hVacancy', 'url'=>array('create')),
	array('label'=>'Update hVacancy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete hVacancy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage hVacancy', 'url'=>array('admin')),
);
?>

<h1>View hVacancy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company_id',
		'vacancy_title',
		'vacancy_desc',
		'industry_tag',
		'for_level',
		'specification_tag',
		'work_address',
		'city',
		'min_salary',
		'max_salary',
		'salary_hide',
		'min_working_exp',
		'min_education_level',
		'min_gpa',
		'skill_required',
		'promotion_content',
		'created_date',
		'created_by',
		'updated_date',
		'updated_by',
	),
)); ?>
