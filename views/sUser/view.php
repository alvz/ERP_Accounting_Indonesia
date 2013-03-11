<?php
$this->breadcrumbs=array(
		'User'=>array('view'),
		$model->id,
);

$this->menu=array(
		array('label'=>'Home', 'url'=>array('/sUser')),
		array('label'=>'Rights', 'url'=>array('/rights/assignment/user','id'=>$model->id)),
		array('label'=>'Update', 'url'=>array('update','id'=>$model->id)),
		array('label'=>'Delete', 'url'=>array('delete','id'=>$model->id)),
		array('label'=>'Update Password', 'url'=>array('updatePassword','id'=>$model->id)),
		array('label'=>'Duplicate', 'url'=>array('duplicate','id'=>$model->id)),
		array('label'=>($model->status_id ==1) ? 'Set NON ACTIVE' : 'Set ACTIVE', 'url'=>array('toggleStatus','id'=>$model->id)),
);

$this->menu2=sUser::getTopCreated();


?>

<div class="page-header">
	<h1>
		<i class="iconic-user"></i>
		<?php echo CHtml::encode($model->username); ?>
	</h1>
</div>

<?php 
$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
				'full_name',
				'username',
				'password',
				array(
						'label'=>'Default Group',
						'value'=>aOrganization::model()->findByPk($model->default_group)->name,
				),
				array(
						'label'=>'Status',
						'value'=>$model->status->name,
				),
				array(
						'label'=>'SSO',
						'value'=>$model->sso(),
				),
		),
));

?>
<br />

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'tabs'=>array(
				array('label'=>'Module', 'content'=>$this->renderPartial("_tabModule", array("model"=>$model,"modelModule"=>$modelModule), true),'active'=>true),
				array('label'=>'Rights', 'content'=>$this->renderPartial("_tabRight", array("model"=>$model), true)),
				array('label'=>'Entity Group', 'content'=>$this->renderPartial("_tabGroup", array("model"=>$model,"modelGroup"=>$modelGroup), true)),
				array('label'=>'Notification Group', 'content'=>$this->renderPartial("_tabNotifGroup", array("model"=>$model), true)),
				array('label'=>'SSO', 'content'=>$this->renderPartial("_tabSSO", array("model"=>$model), true)),
		),
));
?>