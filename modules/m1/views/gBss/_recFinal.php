<?php $this->widget('TbGridView', array(
		'id'=>'g-recruitment-grid',
		'dataProvider'=>gSelection::model()->search(6,true),
		'enableSorting'=>false,
		'template'=>'{items}{pager}',
		//'filter'=>$model,
		'columns'=>array(
			array(
				'type'=>'raw',
				'value'=>'CHtml::link($data->PhotoPath,Yii::app()->createUrl("/'.$this->route.'/../view",array("id"=>$data->id,)))',
				'htmlOptions'=>array("width"=>"40px"),
			),
			array(
				'header'=>'Candidate Name',
				'type'=>'raw',
				'value'=> function($data){
					return CHtml::tag('div', array(), CHtml::link($data->candidate_name,Yii::app()->createUrl("/m1/gBss/RecruitmentView",array("id"=>$data->id))))
						. CHtml::tag('div', array('style'=>'font-size: 11px'), isset($data->hrfinal_result) ? "HR: ".$data->hrfinal_result->getWorkflowResult() : "")
						. CHtml::tag('div', array('style'=>'font-size: 11px'), isset($data->userfinal_result) ? "User: ".$data->userfinal_result->getWorkflowResult() : "");
				}
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
			array(
				'header' => 'Email / HP ',
				'type' => 'raw',
				'value'=> function($data){
					return CHtml::tag('div', array(), $data->email)
						. CHtml::tag('div', array(), $data->handphone);
				}
			),					
			//'birthdate',
			//'quick_background',
			//'work_experience',
			//'sallary_expectation',
			array(
					'header'=>'Source',
					'name'=>'source.name',
			),
			array(
					'class'=>'TbButtonColumn',
					'template'=>'{delete}',
					'visible'=>'$data->company_id == sUser::model()->getGroup()',
			),
				
		),
)); ?>
