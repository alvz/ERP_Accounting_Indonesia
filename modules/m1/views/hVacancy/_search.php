<div class="pull-right">

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			//'action'=>Yii::app()->createUrl($this->route),
			//'action'=>Yii::app()->createUrl('/m1/gPerson/view',array("id"=> *_PARAMETER_*),
			'action'=>Yii::app()->createUrl('/m1/hVacancy/index'),
			'method'=>'get',
			'id'=>'searchForm',
			'htmlOptions'=>array('class'=>'form-inline'),
	)); ?>

	<?php echo $form->textField($model,'vacancy_title',array('class'=>'span2','maxlength'=>100)); ?>

	<?php echo CHtml::htmlButton('<i class="icon-search"></i> Search', array('class'=>'btn','type'=>'submit')); ?>

	<?php $this->endWidget(); ?>
</div>
