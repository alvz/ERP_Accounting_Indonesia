<?php
/* @var $this GRecruitmentController */
/* @var $model gRecruitment */

$this->breadcrumbs=array(
	'G Recruitments'=>array('index'),
	$model->id,
);

$this->menu4=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gSelection')),
);

$this->menu=array(
	array('label'=>'Update Profile', 'icon'=>'edit','url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Report', 'icon'=>'print', 'url'=>array('report')),
);

$this->menu1=gSelection::getTopUpdated();
$this->menu2=gSelection::getTopCreated();
$this->menu5=array('Selection');

?>

<div class="page-header">
	<h1>
		<?php //echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		<div style="width:50px; float:left; margin-right:10px">
		<?php 
			echo $model->photoPath;
		?>
		</div>
		<?php echo $model->candidate_name; ?>
	</h1>
</div>

	<?php
	$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'tabs'=>array(
			array('id'=>'tab1','label'=>'Final Result','content'=>$this->renderPartial("/gSelection/_tabProgress", array("model"=>$model), true),'active'=>true),
			array('id'=>'tab4','label'=>'Profile/Photo','content'=>$this->renderPartial("/gSelection/_tabDetail", array("model"=>$model), true)),
			array('id'=>'tab5','label'=>'Document','content'=>$this->renderPartial("/gSelection/_tabDocument", array("model"=>$model), true)),
		),
	));
	?>
	
<?php if ($model->company_id == sUser::model()->getGroup()) { ?>
	
<div class="page-header">
	<h3>New Process</h3>
</div>

<?php echo $this->renderPartial('_formRecruitment', array('model'=>$modelRecruitment)); } ?>

<hr/>

<div class="row">
<div class="span4">
<h3>Related Position</h3>

<?php $this->widget('TbGridView', array(
		'id'=>'g-recruitment-related-grid',
		'dataProvider'=>gSelection::model()->related($model),
		'enableSorting'=>false,
		'template'=>'{items}{pager}',
		//'filter'=>$model,
		'columns'=>array(
			array(
				'type'=>'raw',
				'value'=>'CHtml::link($data->PhotoPath,Yii::app()->createUrl("/'.$this->route.'/../view",array("id"=>$data->id,)))',
				'htmlOptions'=>array("width"=>"40px"),
			),
			//'code',
			array(
					'header'=>'Candidate Name',
					'type'=>'raw',
					'value'=>'CHtml::link($data->candidate_name,Yii::app()->createUrl("/m1/gSelection/view",array("id"=>$data->id)))',
			),
			'for_position',
			array(
				'header' => 'Company / Dept',
				'type' => 'raw',
				'value'=> function($data){
					return CHtml::tag('div', array(), $data->company->name)
						. CHtml::tag('div', array(), $data->department->name);
				}
			),
		),
)); ?>

</div>
<div class="span5">
<h3>Same Company</h3>
<?php $this->widget('TbGridView', array(
		'id'=>'g-recruitment-company-grid',
		'dataProvider'=>gSelection::model()->relatedCompany($model),
		'enableSorting'=>false,
		'template'=>'{items}{pager}',
		//'filter'=>$model,
		'columns'=>array(
			array(
				'type'=>'raw',
				'value'=>'CHtml::link($data->PhotoPath,Yii::app()->createUrl("/'.$this->route.'/../view",array("id"=>$data->id,)))',
				'htmlOptions'=>array("style"=>"width:40px"),
			),
			//'code',
			array(
					'header'=>'Candidate Name',
					'type'=>'raw',
					'value'=>'CHtml::link($data->candidate_name,Yii::app()->createUrl("/m1/gRecruitment/view",array("id"=>$data->id)))',
			),
			'for_position',
			//'department.name',
			array(
				'header' => 'Email / HP ',
				'type' => 'raw',
				'value'=> function($data){
					return CHtml::tag('div', array(), $data->email)
						. CHtml::tag('div', array(), $data->handphone);
				}
			),					
			//array(
			//		'header'=>'Source',
			//		'name'=>'source.name',
			//),
		),
)); ?>

</div>
</div>