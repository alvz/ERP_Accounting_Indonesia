<?php
$this->breadcrumbs=array(
		'G people'=>array('index'),
		$model->id,
);

$this->menu=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gAbsence')),
		array('label'=>'Schedule Upload', 'icon'=>'calendar','url'=>array('timeBlock')),
		array('label'=>'Schedule Import', 'icon'=>'download-alt','url'=>array('transferAttendance','id'=>$model->id,'month'=>$month)),
		array('label'=>'Print', 'icon'=>'print', 'url'=>array('/m1/gAbsence/printDetail','id'=>$model->id,'month'=>$month)),
);


$this->menu1=gPerson::getTopUpdated();
$this->menu2=gPerson::getTopCreated();
?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		<?php echo $model->employee_name; ?>
	</h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
				array('label'=>'<< Previous Month','url'=>Yii::app()->createUrl("/m1/gAbsence/view",array("id"=>$model->id, "month"=>$month-1))),
				array('label'=>date("Ym",strtotime(date("Y-m",strtotime($month." month"))."-01")),
						'url'=>Yii::app()->createUrl("/m1/gAbsence/view",array("id"=>$model->id, "month"=>$month))),
				array('label'=>'Next Month >>','url'=>Yii::app()->createUrl("/m1/gAbsence/view",array("id"=>$model->id, "month"=>$month+1))),
		),
));
?>


<?php
$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'tabs' => array(
				array('label'=>'Absence','content' =>$this->renderPartial("_tabAbsence", array("model"=>$model,"modelAbsence"=>$modelAbsence,"month"=>$month), true),'active'=>true),
				array('label'=>'Over Time','content' =>$this->renderPartial("_tabOvertime", array("model"=>$model,"month"=>$month), true)),
				array('label'=>'Leave / Permission','content' =>$this->renderPartial("_tabLeavePermission", array("model"=>$model,"modelAbsence"=>$modelAbsence,"month"=>$month), true)),
				array('label'=>'Detail','content' =>$this->renderPartial("/gPerson/_tabDetail", array("model"=>$model), true),),
		),
));
?>

