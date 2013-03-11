<?php
$this->breadcrumbs=array(
		'G people'=>array('index'),
		$model->id,
);
$this->menu4=array(
		array('label'=>'Home ESS', 'icon'=>'home', 'url'=>array('/m1/gEss')),
		array('label'=>'Profile', 'icon'=>'user', 'url'=>array('/m1/gEss/person')),
		array('label'=>'Leave', 'icon'=>'plane', 'url'=>array('/m1/gEss/leave')),
		array('label'=>'Permission', 'icon'=>'cog', 'url'=>array('/m1/gEss/permission')),
		array('label'=>'Attendance', 'icon'=>'', 'url'=>'#'),
);

$this->menu=array(
		array('label'=>'Update Profile', 'icon'=>'edit', 'url'=>array('updatePerson')),
);

?>

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
				array('label'=>'Detail','content'=>$this->renderPartial("/gPerson/_tabDetail", array("model"=>$model), true),'active'=>true),
				array('label'=>'Internal Career','content'=>$this->renderPartial("/gPerson/_tabCareer", array("model"=>$model), true)),
				array('label'=>'Family','content'=>$this->renderPartial("/gPerson/_tabFamily", array("model"=>$model), true)),
				array('label'=>'Education','content'=>$this->renderPartial("/gPerson/_tabEducation", array("model"=>$model), true)),
				array('label'=>'Non Formal Education','content'=>$this->renderPartial("/gPerson/_tabEducationNf", array("model"=>$model), true)),
				array('label'=>'Experience','content'=>$this->renderPartial("/gPerson/_tabExperience", array("model"=>$model), true)),
				array('label'=>'Status','content'=>$this->renderPartial("/gPerson/_tabStatus", array("model"=>$model), true)),
				array('label'=>'Other','content'=>$this->renderPartial("/gPerson/_tabOther", array("model"=>$model,"modelOther"=>$modelOther), true)),
		),
));
?>