<?php foreach($this->getRecentData() as $data): ?>
	<div class="row">
	<div class="span1">
	<?php echo $data->gPersonPhoto ; ?>
	</div>
	<div class="span2">
	<?php echo $data->gPersonLink ; ?>
	<br/>
	<div style="font-size:10px;">
		<?php echo (isset($data->company)) ? $data->company->department->name : ''; ?>
		<br/>
		<?php echo $data->birth_date ; ?>
		<?php echo ' ('. $data->countAge() .')'; ?>
		<br/>
		<?php echo $data->countBirthdate() ?>
	</div>
	</div>
	</div>
<?php endforeach; ?>
<br />

