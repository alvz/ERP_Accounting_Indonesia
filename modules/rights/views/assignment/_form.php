<?php $form=$this->beginWidget('TbActiveForm'); ?>

<?php echo $form->dropDownListRow($model, 'itemname', $itemnameSelectOptions); ?>

<div class="form-actions">
	<?php echo CHtml::submitButton(Rights::t('core', 'Assign')); ?>
</div>

<?php $this->endWidget(); ?>

