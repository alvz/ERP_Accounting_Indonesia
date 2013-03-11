<?php $this->widget('ext.phpexcel.tlbExcelView', array(
	'id'=>'g-bi-grid',
	'dataProvider'=>$dataProvider,
    'grid_mode'            => $production, // Same usage as EExcelView v0.33
    'title'                => 'Some title - ' . date('d-m-Y - H-i-s'),
    'sheetTitle'           => 'Report on ' . date('m-d-Y H-i'),
	//'template'=>'{items}',
	'columns'=>$field
)); ?>
