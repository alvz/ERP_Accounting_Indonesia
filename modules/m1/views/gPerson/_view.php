<div style="<? echo (in_array($data->mStatusId(),Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY)) ? "background-color:#D5D5D5;padding:10px;margin-bottom:10px;" : "background-color:white";?>" >
		<h3>
			<?php echo CHtml::link($data->employee_name_r, Yii::app()->createUrl($this->route.'/../view', array('id'=>$data->id,))); ?>
		</h3>
		
<?php echo $this->renderPartial('/gPerson/_viewDetail',array('data'=>$data)); ?>

</div>
