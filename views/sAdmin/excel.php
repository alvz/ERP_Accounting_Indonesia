<?php Yii::app()->clientScript->registerScript('export', "
    $('#exportToExcel').click(function(){
        window.location = '". $this->createUrl('excel')  . "?' + $(this).parents('form').serialize() + '&export=true';
        return false;
    });
"); ?>

<?php echo CHtml::button('Export to Excel (xls)', array('id' => 'exportToExcel')); ?>

<?php $this->widget('ext.phpexcel.tlbExcelView', array(
    'id'                   => 'some-grid',
    'dataProvider'         => sUser::model()->search(),
    'grid_mode'            => $production, // Same usage as EExcelView v0.33
    'title'                => 'Some title - ' . date('d-m-Y - H-i-s'),
    'sheetTitle'           => 'Report on ' . date('m-d-Y H-i'),
	'columns'=>array(
			array(
					'name'=>'username',
					'type'=>'raw',
					'value'=>'CHtml::link($data->username,Yii::app()->createUrl("sUser/view",array("id"=>$data->id)))',
			),
			array(
					'header'=>'Rights',
					'type'=>'raw',
					'value'=>'CHtml::link("rights",Yii::app()->createUrl("/rights/assignment/user",array("id"=>$data->id)))',
			),
			array(
					'name'=>'default_group',
					'value'=>'aOrganization::model()->findByPk($data->default_group)->name',
			),
			array(
					'header'=>'Total Group',
					'value'=>'$data->groupCount',
			),
			array(
					'name'=>'last_login',
					'value'=>'waktu::nicetime($data->last_login)',
			),

	),
)); ?>

