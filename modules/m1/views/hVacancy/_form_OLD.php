<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('TbActiveForm', array(
	'id'=>'h-vacancy-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'vacancytitle',array('class'=>'span4')); ?>

		<?php echo $form->textFieldRow($model,'company_name',array('class'=>'span4')); ?>

		<?php echo $form->dropDownListRow($model,'industryid',sParameter::items('cRecruitmentIndustry')); ?>

		<?php echo $form->dropDownListRow($model,'plevelid',sParameter::items('cRecruitmentLevel')); ?>

		<?php echo $form->dropDownListRow($model,'jspecid',sParameter::items('cRecruitmentSpec')); ?>

		<?php echo $form->textAreaRow($model,'work_address',array('rows'=>3,'class'=>'span4')); ?>

		<?php echo $form->textFieldRow($model,'work_area',array('class'=>'span3')); ?>

		<?php echo $form->dropDownListRow($model,'salary_currency',array('IDR'=>'IDR','USD'=>'USD','EUR'=>'EUR','SGD'=>'SGD')); ?>

		<?php echo $form->textFieldRow($model,'salary_min',array('size'=>10,'maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'salary_max',array('size'=>10,'maxlength'=>10)); ?>

		<?php echo $form->checkBoxRow($model,'salary_hide'); ?>

		<?php //echo $form->textFieldRow($model,'date_start'); ?>

		<?php //echo $form->textFieldRow($model,'date_end'); ?>

		<?php echo $form->textFieldRow($model,'min_work_exp'); ?>

		<?php echo $form->dropDownListRow($model,'min_edulvl',sParameter::items('EDU')); ?>

		<?php echo $form->textFieldRow($model,'min_grade',array('class'=>'span2')); ?>

		<?php echo $form->textAreaRow($model,'skill_required',array('class'=>'span6','rows'=>6)); ?>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>

		</div>

<?php $this->endWidget(); ?>

</div>