<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');
Yii::app()->getClientScript()->registerCoreScript('maskedinput');


Yii::app()->clientScript->registerScript('datepicker', "
		$(function() {
		$( \"#".CHtml::activeId($model,'input_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
		$( \"#".CHtml::activeId($model,'start_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
		$( \"#".CHtml::activeId($model,'end_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
		$( \"#".CHtml::activeId($model,'input_date')."\" ).mask('99-99-9999');
		$( \"#".CHtml::activeId($model,'start_date')."\" ).mask('99-99-9999');
		$( \"#".CHtml::activeId($model,'end_date')."\" ).mask('99-99-9999');
});
		");
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'g-cuti-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'input_date',array('class'=>'span2')); ?>

<?php echo $form->textFieldRow($model,'start_date',array('class'=>'span2','hint'=>'Date when your leave cancelled')); ?>

<?php echo $form->textFieldRow($model,'end_date',array('class'=>'span2','hint'=>'Date when your cancelled leave ended')); ?>

<?php echo $form->textFieldRow($model,'number_of_day',array('class'=>'span1','hint'=>'Total days of cancelled leaving')); ?>

<?php echo $form->textAreaRow($model,'leave_reason',array('class'=>'span4','rows'=>3)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
</div>

<?php $this->endWidget(); ?>
