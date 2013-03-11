<?php
if (isset($model->getparent->getparent->getparent->getparent->name)) {
	$this->breadcrumbs=array(
			$model->getparent->getparent->getparent->getparent->name=>array('view','id'=>$model->getparent->getparent->getparent->id),
			$model->getparent->getparent->getparent->name=>array('view','id'=>$model->getparent->getparent->id),
			$model->getparent->getparent->name=>array('view','id'=>$model->getparent->id),
			$model->getparent->name=>array('view','id'=>$model->getparent->id),
			$model->name,
	);

} elseif (isset($model->getparent->getparent->getparent->name)) {
	$this->breadcrumbs=array(
			$model->getparent->getparent->getparent->name=>array('view','id'=>$model->getparent->getparent->getparent->id),
			$model->getparent->getparent->name=>array('view','id'=>$model->getparent->getparent->id),
			$model->getparent->name=>array('view','id'=>$model->getparent->id),
			$model->name,
	);

} elseif (isset($model->getparent->getparent->name)) {
	$this->breadcrumbs=array(
			$model->getparent->getparent->name=>array('view','id'=>$model->getparent->getparent->id),
			$model->getparent->name=>array('view','id'=>$model->getparent->id),
			$model->name,
	);

} elseif (isset($model->getparent->name)) {
	$this->breadcrumbs=array(
			$model->getparent->name=>array('view','id'=>$model->getparent->id),
			$model->name,
	);
} else {
	$this->breadcrumbs=array(
			$model->name,
	);
}

$this->menu=array(
		array('label'=>'Home', 'url'=>array('/aOrganization')),
		//array('label'=>'Create Root', 'url'=>array('create')),
		array('label'=>'Update', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Delete', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);

$this->menu1=aOrganization::getTopUpdated();
$this->menu2=aOrganization::getTopCreated();
$this->menu3=aOrganization::getTopRelated($model->id);
$this->menu5=array('Organization');

?>

<div class="page-header">
	<h1>
		<i class="iconic-image"></i>
		<div style="width:50px; float:left; margin-right:10px">
		</div>
		<?php echo $model->name; ?>
	</h1>
</div>



<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'tabs', // 'tabs' or 'pills'
	'tabs'=>array(
		array('id'=>'tab1','label'=>'Detail','content'=>$this->renderPartial("_tabDetail", array("model"=>$model), true),'active'=>true),
		array('id'=>'tab2','label'=>'User Member','content'=>$this->renderPartial("_tabUsername", array("model"=>$model), true)),
		array('id'=>'tab3','label'=>'Logo','content'=>$this->renderPartial("_tabLogo", array("model"=>$model), true)),
	),
));
?>

<h3>Child Organization</h3>
<?php $this->widget('bootstrap.widgets.TbGridView', array(

		'id'=>'t-organization-grid',
		'dataProvider'=>aOrganization::model()->searchChild($model->id),
		'itemsCssClass'=>'table table-striped table-bordered',
		'template'=>'{items}{pager}',
		'columns'=>array(
				'branch_code',
				array(
					'header'=>'Name',
					'type'=>'raw',
					'value'=>'CHtml::link($data->name, Yii::app()->createUrl("/aOrganization/view",array("id"=>$data->id)))',
				),
				'address',
				'telephone',
				//'fax',
				//'email',
				//'website',
				array(
						'class'=>'TbButtonColumn',
						'template'=>'{delete}',
				),
		),
)); ?>


<h3>New Child Organization</h3>

<?php echo $this->renderPartial('_form', array('model'=>$modelOrganization)); ?>