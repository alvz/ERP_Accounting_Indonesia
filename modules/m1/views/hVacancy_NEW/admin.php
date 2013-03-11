<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */

$this->breadcrumbs=array(
	'H Vacancies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List hVacancy', 'url'=>array('index')),
	array('label'=>'Create hVacancy', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('h-vacancy-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage H Vacancies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'h-vacancy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'company_id',
		'vacancy_title',
		'vacancy_desc',
		'industry_tag',
		'for_level',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
