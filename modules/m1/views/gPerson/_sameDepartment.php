<?php if (isset($model->company->department_id)): ?>
		
		<h3>Same Department (<?php echo gPerson::model()->sameDepartment($model->mDepartmentId())->totalItemCount ?>)</h3>
		<?php $this->widget('bootstrap.widgets.TbGridView',array(
				'id'=>'g-person1-grid',
				'dataProvider'=>gPerson::model()->sameDepartment($model->mDepartmentId()),
				'enableSorting'=>false,
				'template'=>'{items}{pager}',
				'columns'=>array(
					array(
						'type'=>'raw',
						'value'=>'CHtml::link($data->PhotoPath,Yii::app()->createUrl("'.$this->route.'/../view",array("id"=>$data->id,)))',
						'htmlOptions'=>array("width"=>"60px"),
					),
					array(
						'header' => 'Name',
						'type' => 'raw',
						'value'=> function($data){
							return CHtml::tag('div', array('style'=>'font-weight: bold'), $data->GPersonLink)
								. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), $data->employee_code);
								//. $data->countJoinDate();
						},
						'visible'=>$this->id =="gPerson",
						
					),					
					array(
						'header' => 'Name',
						'type' => 'raw',
						'value'=> function($data){
							return CHtml::tag('div', array('style'=>'font-weight: bold'), $data->GTalentLink)
								. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), $data->employee_code);
								//. $data->countJoinDate();
						},
						'visible'=>$this->id =="gTalent",
						
					),					
					array(
						'header' => 'Name',
						'type' => 'raw',
						'value'=> function($data){
							return CHtml::tag('div', array('style'=>'font-weight: bold'), $data->GTrainingLink)
								. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), $data->employee_code);
								//. $data->countJoinDate();
						},
						'visible'=>$this->id =="gTraining",
						
					),					
					array(
						'header'=>'Job Title',
						'value'=>'$data->mJobTitle()',
					),
					array(
						'header'=>'Level',
						'value'=>'$data->mLevel()',
					),
				),
		)); ?>

<?php endif; ?>

