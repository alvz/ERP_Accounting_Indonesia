<?php foreach($models as $data): ?>
	<div class="detail">
		<div class="row">
			<div class="span1">
				<?php echo $data->gPersonPhoto ; ?>
			</div>
			<div class="span2">
				<?php echo $data->gPersonLink ; ?>
				<div style="font-size:10px;">
					<?php echo (isset($data->company)) ? $data->company->company->name : ''; ?>
					<?php echo (isset($data->company)) ? $data->company->department->name : ''; ?>
					<br/>
					<br/>
					<?php echo $data->status->start_date ; ?>
					<?php echo $data->status->remark ; ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<br />


