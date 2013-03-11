<?php
$this->breadcrumbs=array(
		'Leave'=>array('index'),
		$model->id,
);

$this->menu7=hApplicant::model()->getTopRecentApplicant();

$this->menu=array(
		array('label'=>'Vacancy', 'icon'=>'home', 'url'=>array('/m1/hVacancy')),
		array('label'=>'Applicant', 'icon'=>'home', 'url'=>array('/m1/hApplicant')),
		array('label'=>'Interview', 'icon'=>'home', 'url'=>array('/m1/hVacancy/interview')),
);


?>

<?php $this->beginContent('/layouts/column1N'); ?>


<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		<?php /*
		<div style="width:50px; float:left; margin-right:10px">
		<?php 
			echo $model->photoPath;
		?>
		</div>
		*/ ?>
		<?php echo $model->applicant_name; ?>
	</h1>
</div>

<h3>Application Status</h3>


<?php $this->widget('TbGridView', array(
		'id'=>'g-vacancy-grid',
		'dataProvider'=>hVacancyApplicant::model()->searchByApplicant($model->id),
		//'filter'=>$model,
		'template'=>'{items}{pager}',
		'columns'=>array(
				array(
					'header'=>'Apply Date',
					'value'=>'date("d-m-Y",$data->created_date)',
				),
				array(
					'header'=>'Vacancy Title',
					'type'=>'raw',
					'value'=>'CHtml::link($data->vacancy->vacancytitle,Yii::app()->createUrl("/m1/hVacancy/view",array("id"=>$data->vacancy->id)))',
				),
				array(
					'header'=>'Job Status',
					'value'=>'$data->vacancy->status->name',
				),
				array(
					'header'=>'Applicant Status',
					'value'=>'$data->status->name',
				),
				/*array(
					'class'=>'TbButtonColumn',
					'template'=>'{mydelete}',
					'buttons'=>array (
						'mydelete' => array (
							'label'=>'Delete',
							'url'=>'Yii::app()->createUrl("/vacancy/deleteDetail",array("id"=>$data->id))',
							'visible'=>'$data->status_id ==1',
							'options'=>array(
								'ajax'=>array(
									'type'=>'GET',
									'url'=>"js:$(this).attr('href')",
									'success'=>'js:function(data){
										$.fn.yiiGridView.update("g-vacancy-grid", {
										data: $(this).serialize()});
									}',
								),
								'class'=>'btn btn-mini',
								'style'=>'margin-left:3px;',
							),
						),
					),
				), */
		),
)); ?>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'tabs'=>array(
				array('label'=>'My Profile','content'=>$this->renderPartial("_tabDetail", array("model"=>$model), true),'active'=>true),
				array('id'=>'tab2','label'=>'Create New', 'items'=>array(
					array('label'=>'Experience','content'=>$this->renderPartial("_tabExperience", array("model"=>$model,"modelExperience"=>$modelExperience), true)),
					array('label'=>'Education','content'=>$this->renderPartial("_tabEducation", array("model"=>$model,"modelEducation"=>$modelEducation), true)),
					array('label'=>'Family','content'=>$this->renderPartial("_tabFamily", array("model"=>$model,"modelFamily"=>$modelFamily), true)),
					array('label'=>'Non Formal Education','content'=>$this->renderPartial("_tabEducationNf", array("model"=>$model,"modelEducationNf"=>$modelEducationNf), true)),
				)),
		),
));
?>

<?php $this->endContent(); ?>