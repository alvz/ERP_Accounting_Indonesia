<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="span6">

<?php $form=$this->beginWidget('TbActiveForm', array(
	'id'=>'h-vacancy-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'vacancy_title',array('class'=>'span3')); ?>
		<?php echo $form->textAreaRow($model,'vacancy_desc',array('class'=>'span6','rows'=>3)); ?>
		<?php echo $form->textFieldRow($model,'industry_tag',array('class'=>'span4')); ?>
		<?php echo $form->textFieldRow($model,'for_level',array('class'=>'span3')); ?>
		<?php echo $form->textFieldRow($model,'specification_tag',array('class'=>'span4')); ?>
		<?php echo $form->textAreaRow($model,'work_address',array('class'=>'span6','rows'=>3)); ?>
		<?php echo $form->textFieldRow($model,'city',array('class'=>'span3')); ?>

</div>
</div>
<div class="row">
<div class="span2">
		<?php echo $form->textFieldRow($model,'min_salary',array('class'=>'span2')); ?>
</div>
<div class="span2">
		<?php echo $form->textFieldRow($model,'max_salary',array('class'=>'span2')); ?>
</div>
<div class="span2">
		<?php echo $form->checkBoxRow($model,'salary_hide'); ?>
</div>
</div>
<div class="row">
<div class="span6">
		<?php echo $form->textFieldRow($model,'min_working_exp',array('class'=>'span1')); ?>
		<?php echo $form->dropDownListRow($model,'min_education_level',sParameter::items('EDU')); ?>
		<?php echo $form->textFieldRow($model,'min_gpa',array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->textAreaRow($model,'skill_required',array('class'=>'span6','rows'=>5)); ?>
		<?php echo $form->textAreaRow($model,'promotion_content',array('rows'=>15, 'class'=>'span6')); ?>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->