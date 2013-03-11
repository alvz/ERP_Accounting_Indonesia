<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_id'); ?>
		<?php echo $form->textField($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vacancy_title'); ?>
		<?php echo $form->textField($model,'vacancy_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vacancy_desc'); ?>
		<?php echo $form->textField($model,'vacancy_desc',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'industry_tag'); ?>
		<?php echo $form->textField($model,'industry_tag',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'for_level'); ?>
		<?php echo $form->textField($model,'for_level',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'specification_tag'); ?>
		<?php echo $form->textField($model,'specification_tag',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_address'); ?>
		<?php echo $form->textField($model,'work_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_salary'); ?>
		<?php echo $form->textField($model,'min_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_salary'); ?>
		<?php echo $form->textField($model,'max_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salary_hide'); ?>
		<?php echo $form->textField($model,'salary_hide'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_working_exp'); ?>
		<?php echo $form->textField($model,'min_working_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_education_level'); ?>
		<?php echo $form->textField($model,'min_education_level',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_gpa'); ?>
		<?php echo $form->textField($model,'min_gpa',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skill_required'); ?>
		<?php echo $form->textField($model,'skill_required',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promotion_content'); ?>
		<?php echo $form->textArea($model,'promotion_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_date'); ?>
		<?php echo $form->textField($model,'updated_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->