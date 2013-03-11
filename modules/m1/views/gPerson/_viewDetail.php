<div class="row-fluid">
	<div class="span2 well">
		<?php 
			echo $data->photoPath;
		?>
	</div>
	<div class="span9">
		<?php echo CHtml::encode($data->employee_code); ?>
		<br/>
		<?php
			if (isset($data->company)) {
				echo CHtml::encode($data->mCompany());
				echo "<br/>";
				echo CHtml::encode($data->mJobTitle()); 
				echo "<br/>";
				echo CHtml::encode($data->mLevel()); 
			}
		?>
		<br/>
		<?php
			if (isset($data->status)) {
				echo CHtml::encode($data->mStatus()); 
			} else
				echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");

			echo "<br/>";

			if (isset($data->companyfirst)) {
				echo $data->companyfirst->start_date;
				echo " (";
				echo $data->countJoinDate();
				echo ")";
			} else
				echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
			echo "</br>";
		?>
		

	</div>


</div>
<?php /*
EQuickDlgs::ajaxIcon(
		Yii::app()->baseUrl .'images/view.png',
		array(
				'controllerRoute' => '/m1/gPerson/view', //'member/view'
				'actionParams' => array('id'=>$data->id), //array('id'=>$model->member->id),
				'dialogTitle' => 'Detailview',
				'dialogWidth' => 800,
				'dialogHeight' => 600,
				'openButtonText' => 'View record',
				'closeButtonText' => 'Close',
		)
);
		*/
		?>