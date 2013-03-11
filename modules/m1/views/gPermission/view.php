<?php
$this->breadcrumbs=array(
		'G people'=>array('index'),
		$model->id,
);

$this->menu4=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gPermission')),
);

$this->menu=array(
		//array('label'=>'Print Summary', 'icon'=>'print', 'url'=>array('/m1/gEss/summaryPermission',"pid"=>$model->id)),
);

//$this->menu1=gPermission::getTopUpdated();
//$this->menu2=gPermission::getTopCreated();
$this->menu5=array('Permission');

?>

<div class="pull-right">
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array(
					array('label'=>'Permission', 'items'=>array(
							array('label'=>'Person', 'url'=>Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$model->id))),
							array('label'=>'Absence', 'url'=>'#'),
							array('label'=>'Payroll', 'url'=>'#'),
							array('label'=>'Other Module', 'url'=>'#'),
					)),
			),
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php //echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		<div style="width:50px; float:left; margin-right:10px">
		<?php 
			echo $model->photoPath;
		?>
		</div>
		<?php echo $model->employee_name; ?>
	</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'tabs'=>array(
				array('label'=>'Permission History','content'=>$this->renderPartial("_tabList", array("model"=>$model), true),'active'=>true),
				array('label'=>'Profile','content'=>$this->renderPartial("/gPerson/_tabDetail", array("model"=>$model), true)),
		),
));
?>

