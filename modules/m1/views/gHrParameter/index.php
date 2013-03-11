
<?php
$this->breadcrumbs=array(
		$this->module->id,
);
?>
<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		HR Parameter
	</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'tabs', // 'tabs' or 'pills'
	'placement'=>'left',
	'tabs'=>array(
		array('id'=>'tab5','label'=>'Level','content'=>$this->renderPartial('_tabParamLevel',array('model'=>$modelParamLevel),true),'active'=>true),
		array('id'=>'tab6','label'=>'Permission','content'=>$this->renderPartial('_tabParamPermission',array('model'=>$modelParamPermission),true)),
		array('id'=>'tab7','label'=>'Attendance Time Block','content'=>$this->renderPartial('_tabParamTimeblock',array('model'=>$modelParamTimeblock),true)),
		
		array('id'=>'tab1','label'=>'Mass Leave Generator','content'=>$this->renderPartial('_tabMassLeave',array(),true)),
		array('id'=>'tab2','label'=>'Absence Work Pattern','content'=>'Testing'),
		array('id'=>'tab3','label'=>'OverTime Process','content'=>'Testing'),
		array('id'=>'tab4','label'=>'Absence Recapitulation','content'=>'Testing'),
	),
));

?>

