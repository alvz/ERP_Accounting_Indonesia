<?php
$this->breadcrumbs=array(
		'G people'=>array('index'),
		$model->id,
);

$this->menu4=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gLeave')),

);

$this->menu=array(
		array('label'=>'AGL '.date('Y'), 'icon'=>'barcode', 'url'=>array('/m1/gLeave/autoGeneratedLeave',"id"=>$model->id)),
		array('label'=>'Mass Leave Lebaran '.date('Y'), 'icon'=>'barcode', 'url'=>array('/m1/gLeave/massLeaveLebaran',"id"=>$model->id)),
		array('label'=>'Mass Leave Christmas '.date('Y'), 'icon'=>'barcode', 'url'=>array('/m1/gLeave/massLeaveChristmas',"id"=>$model->id)),
);

$this->menu1=array(
		array('label'=>'Print Summary', 'icon'=>'print', 'url'=>array('/m1/gEss/summaryLeave',"pid"=>$model->id)),

);

//$this->menu1=gLeave::getTopUpdated();
//$this->menu2=gLeave::getTopCreated();
$this->menu5=array('Leave');

?>

<div class="pull-right">
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array(
					array('label'=>'Leave', 'items'=>array(
							array('label'=>'Person', 'url'=>Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$model->id))),
							array('label'=>'Absence', 'url'=>'#'),
							//array('label'=>'Payroll', 'url'=>'#'),
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
	echo $this->renderPartial("/gLeave/_LeaveBalance", array("model"=>$model), true);
?>

<div class="row">
<div class="span10">
<?php
$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'tabs'=>array(
				array('label'=>'Leave History','content'=>$this->renderPartial("_tabList", array("model"=>$model), true),'active'=>true),
				array('label'=>'Profile','content'=>$this->renderPartial("/gPerson/_tabDetail", array("model"=>$model), true)),
				array('label'=>'Temporary Action','content'=>$this->renderPartial("_tabTemporaryAction", array("model"=>$model), true)),
		),
));
?>
</div>
</div>

