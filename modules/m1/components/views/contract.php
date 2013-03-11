<?php foreach($this->getRecentData() as $data): ?>
	<div class="row">
	<div class="span1">
	<?php echo $data->gPersonPhoto ; ?>
	</div>
	<div class="span2">
	<?php echo $data->gPersonLink ; ?>
	<br/>
	<div style="font-size:10px;">
		<?php //echo $data->mDepartment(); ?>
		<br/>
		<?php echo $data->mStatus(); ?>
		<br/>
		<?php echo $data->mStatusEndDate() ; ?>
		<?php echo ' ('.$data->countContract().')' ; ?>
	</div>
	</div>
	</div>
<?php endforeach; ?>
<br />

