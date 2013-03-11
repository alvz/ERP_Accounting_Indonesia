<table width="100%">
	<?php foreach($this->getRecentData1()->getData() as $data): ?>
	<tr>
		<td>
			<span class="h-icon-bullet_go" style="float:left">
			<div><?php echo CHtml::link(substr($data->long_desc,0,50).' ...',Yii::app()->createUrl('/sFeedback/view',array("id"=>$data->id))); ?></div>
		
			<div style="color:grey;font-size:10px;float:right;"><?php echo Yii::app()->dateFormatter->format("dd-MM-yyyy",$data->sender_date) ?> 
			<?php echo ' | '.$data->status->name.' | ('.$data->countComment.')' ?></div>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
