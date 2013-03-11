<?php echo $this->renderPartial('_tabTraining',array("model"=>$model,"modelTraining"=>$modelTraining)); ?>

<div class="page-header">
	<h3>New Training</h3>
</div>
<?php echo $this->renderPartial('_formTraining',array('model'=>$modelTraining)); ?>

