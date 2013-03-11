<?php
$this->breadcrumbs=array(
		'Notification'=>array('index'),
		'index',
);


$this->menu=array(
		//array('label'=>'Create', 'url'=>array('create')),
);

//$this->menu4=ModelNotifyii::getTopOther();

?>

<div class="page-header">
	<h1><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/blockdevice.png') ?>
	Notification Manager</h1>
</div>

<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'buttons'=>array(
        array('label'=>'Mark All as Read', 'url'=>Yii::app()->createUrl('/sNotification/markRead')),
        //array('label'=>'2', 'url'=>'#'),
    ),
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'notification-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'template'=>'{items}{pager}',
	'columns'=>array(
		//array(
		//	'name'=>'expire',
		//	'value'=>'date("d-m-Y",$data->expire)',
		//),
		array(
			'header'=>'Detail',
			'type'=>'raw',
			//'value'=>'CHtml::link($data->content,Yii::app()->createUrl("sNotification/read",array("id"=>$data->id)))',
			'value'=> function($data){ 
				if ($data->reads ==null) {
					return CHtml::tag('div', array('style'=>'font-weight: bold'), CHtml::link($data->content,Yii::app()->createUrl("sNotification/read",array("id"=>$data->id))))
					.CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'),waktu::nicetime($data->expire));
				} else
					return CHtml::tag('div', array(), CHtml::link($data->content,Yii::app()->createUrl("sNotification/read",array("id"=>$data->id))))
					.CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'),waktu::nicetime($data->expire));
			},
		),
		array(
			'name'=>'title',
		),
		//array(
		//	'name'=>'alert_after_date',
		//	'value'=>'date("d-m-Y",$data->alert_after_date)',
		//),
		//array(
		//	'name'=>'alert_before_date',
		//	'value'=>'date("d-m-Y",$data->alert_before_date)',
		//),
		//array(
		//	'header'=>'Read',
		//	'value'=>'($data->reads ==null) ? "UnRead":"Read"'
		//),
	),
)); ?>


