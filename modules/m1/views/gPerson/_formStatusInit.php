<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');

Yii::app()->clientScript->registerScript('datepicker2', "
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

		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'start_date'); ?>

		<?php echo $form->textFieldRow($model,'end_date'); ?>

		<?php echo $form->dropDownListRow($model,'status_id',sParameter::items('AK')); ?>

		<?php echo $form->textAreaRow($model,'remark',array('class'=>'span4','rows'=>3)); ?>
