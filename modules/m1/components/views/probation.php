<div id="posts">
<?php foreach($models as $data): ?>
	<div class="detail">
		<div class="row">
			<div class="span1">
				<?php echo $data->gPersonPhoto ; ?>
			</div>
			<div class="span2">
				<?php echo $data->gPersonLink ; ?>
				<div style="font-size:10px;">
					<?php echo (isset($data->company)) ? $data->company->department->name : ''; ?>
					<br/>
					<?php echo $data->mStatus(); ?>
					<br/>
					<?php echo $data->mStatusEndDate() ; ?>
					<?php echo ' ('.$data->countContract().')' ; ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<br />
</div>

<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
		'contentSelector' => '#posts',
		'itemSelector' => 'div.detail',
		'loadingText' => 'Loading...',
		'donetext' => 'This is the end... ',
		'pages' => $pages,
)); ?>