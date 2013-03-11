<?php $this->widget('TbGridView', array(
		'id'=>'g-recruitment-grid',
		'dataProvider'=>gSelection::model()->search('interviewhr'),
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
					return CHtml::tag('div', array(), CHtml::link($data->candidate_name,Yii::app()->createUrl("/m1/gSelection/view",array("id"=>$data->id))))
						. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), 'HR Interview')
						. CHtml::tag('div', array('style'=>'font-size: 11px'), $data->hrinterview_status->getWorkflowResult())
						. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), waktu::nicetime(strtotime($data->input_date)));
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
