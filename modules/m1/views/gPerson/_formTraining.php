<?php
/* @var $this GPersonEducationNfController */
/* @var $model GPersonEducationNf */
/* @var $form CActiveForm */
?>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');

Yii::app()->clientScript->registerScript('datepicker15', "
		$(function() {
		$( \"#".CHtml::activeId($model,'start_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
		});
		$( \"#".CHtml::activeId($model,'end_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
		});
			
});

		");
?>


<div class="row">
	<div class="span7">

<?php $form=$this->beginWidget('TbActiveForm', array(
	'id'=>'gperson-education-nf-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>


	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'start_date',array()); ?>

		<?php echo $form->textFieldRow($model,'end_date',array()); ?>

		<?php echo $form->dropDownListRow($model,'type_id',sParameter::items('cTraining')); ?>

		<?php echo $form->textFieldRow($model,'topic',array('class'=>'span4')); ?>

		<?php echo $form->textFieldRow($model,'instructor',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'duration',array()); ?>

		<?php echo $form->dropDownListRow($model,'sertificate',array('-1'=>'Yes','0'=>'No')); ?>

		<?php echo $form->textFieldRow($model,'organizer',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'place',array()); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
</div><!-- form -->