<?php
$this->breadcrumbs=array(
		'Recruitment',
);

$this->menu4=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gBss')),
);

$this->menu=array(
		array('label'=>'Report', 'icon'=>'print', 'url'=>array('report')),
);

//$this->menu1=gSelection::getTopUpdated();
//$this->menu2=gSelection::getTopCreated();
$this->menu5=array('Selection');

?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/users_go.png') ?>
		Recruitment	</h1>
</div>

<?php
		$this->widget('bootstrap.widgets.TbTabs', array(
			'type'=>'pills', // 'tabs' or 'pills'
			'tabs'=>array(
				array('id'=>'tab1','label'=>'New Entry','content'=>$this->renderPartial("_recNewEntry", array(), true),'active'=>true),
				array('label'=>'Invitation', 'items'=>array(
					array('id'=>'tab2a','label'=>'Schedule','content'=>$this->renderPartial("_recInvited", array(), true)),
					array('id'=>'tab2b','label'=>'Result','content'=>$this->renderPartial("_recInvitedResult", array(), true)),
				)),
				array('id'=>'tab3','label'=>'Today Appointment','content'=>$this->renderPartial("_recAppointment", array(), true)),
				array('label'=>'Psycho / Technical Tested', 'items'=>array(
					array('id'=>'tab4a','label'=>'Schedule','content'=>$this->renderPartial("_recPsikotestSchedule", array(), true)),
					array('id'=>'tab4b','label'=>'Result','content'=>$this->renderPartial("_recPsikotestResult", array(), true)),
				)),
				array('id'=>'tab5','label'=>'HR Interviewed','content'=>$this->renderPartial("_recInterviewHr", array(), true)),
				array('id'=>'tab6','label'=>'User Interviewed','content'=>$this->renderPartial("_recInterviewUser", array(), true)),
				array('id'=>'tab7','label'=>'Final Result','content'=>$this->renderPartial("_recFinal", array(), true)),
			),
		));
?>
				