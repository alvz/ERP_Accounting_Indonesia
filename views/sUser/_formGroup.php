<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');
//Yii::app()->clientScript->registerCoreScript('jquery.ui');


Yii::app()->getClientScript()->registerCoreScript('maskedinput');

Yii::app()->clientScript->registerScript('datepicker', "
		$(function() {
		$( \"#".CHtml::activeId($model,'organization_root_name')."\" ).autocomplete({
		'minLength': '2',
		'source' : '".Yii::app()->createUrl('/aOrganization/organizationAutoComplete')."',
		'focus' : function( event, ui ) {
		$(\"#". CHtml::activeId($model,'organization_root_name') ."\").val(ui.item.label);
		return false;
},
		'select' : function( event, ui ) {
		$(\"#". CHtml::activeId($model,'organization_root_id') ."\").val(ui.item.id);
		return false;
},

});
});

		");


?>

<?php $form=$this->beginWidget('ext.bootstrap.widgets.TbActiveForm',array(
		'id'=>'s-group-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
)); ?>


<?php echo $form->errorSummary($model); ?>

<?php //echo $form->dropDownListRow($model,'organization_root_id', aOrganization::getRootList()  ,array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'organization_root_name'); ?>
<?php echo $form->hiddenField($model,'organization_root_id'); ?>


<div class="form-actions">
	<?php echo CHtml::htmlButton($model->isNewRecord ? '<i class="icon-ok"></i> Create':'<i class="icon-ok"></i> Save', array('class'=>'btn', 'type'=>'submit')); ?>
</div>

<?php $this->endWidget(); ?>
