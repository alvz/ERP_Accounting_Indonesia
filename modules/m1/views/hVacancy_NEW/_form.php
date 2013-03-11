<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'h-vacancy-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->textField($model,'company_id'); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vacancy_title'); ?>
		<?php echo $form->textField($model,'vacancy_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'vacancy_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vacancy_desc'); ?>
		<?php echo $form->textField($model,'vacancy_desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'vacancy_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'industry_tag'); ?>
		<?php echo $form->textField($model,'industry_tag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'industry_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'for_level'); ?>
		<?php echo $form->textField($model,'for_level',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'for_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'specification_tag'); ?>
		<?php echo $form->textField($model,'specification_tag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'specification_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_address'); ?>
		<?php echo $form->textField($model,'work_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'work_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_salary'); ?>
		<?php echo $form->textField($model,'min_salary'); ?>
		<?php echo $form->error($model,'min_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_salary'); ?>
		<?php echo $form->textField($model,'max_salary'); ?>
		<?php echo $form->error($model,'max_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salary_hide'); ?>
		<?php echo $form->textField($model,'salary_hide'); ?>
		<?php echo $form->error($model,'salary_hide'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_working_exp'); ?>
		<?php echo $form->textField($model,'min_working_exp'); ?>
		<?php echo $form->error($model,'min_working_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_education_level'); ?>
		<?php echo $form->textField($model,'min_education_level',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'min_education_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_gpa'); ?>
		<?php echo $form->textField($model,'min_gpa',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'min_gpa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skill_required'); ?>
		<?php echo $form->textField($model,'skill_required',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'skill_required'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promotion_content'); ?>
		<?php echo $form->textArea($model,'promotion_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'promotion_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_date'); ?>
		<?php echo $form->textField($model,'updated_date'); ?>
		<?php echo $form->error($model,'updated_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->