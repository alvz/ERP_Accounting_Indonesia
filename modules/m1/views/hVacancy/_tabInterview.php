<p>
<?php
	echo CHtml::link('Export to Excel',Yii::app()->createUrl('/m1/hVacancy/toExcel',array("id"=>$model->id)),array('class'=>'btn btn-info'));
?>
</p>
<hr/>

<div class="row">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>hVacancyApplicant::model()->search($model->id,4),
	'template'=>'{items}{pager}',
	'itemView'=>'_tabListEmail',
)); 
?>
