	<div class="well" style='font-size:11px;'>
		<?php
		echo "<div>Department</div>";
		if (isset($model->company)) {
			echo "<strong>".$model->company->department->name."</strong>";
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		echo "</br>";
		?>

		<?php
		echo "<div style='margin-top:10px;'>Job Title</div>";
		if (isset($model->company)) {
			echo "<strong>".$model->mJobTitle()."</strong>";
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		echo "</br>";
		?>

		<?php
		echo "<div style='margin-top:10px;'>Level</div>";
		if (isset($model->company)) {
			echo "<strong>".$model->mLevel()."</strong>";
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		echo "</br>";
		?>

		<?php
		echo "<div style='margin-top:10px;'>Status</div>";
		if (isset($model->status)) {
			echo "<strong>".$model->mStatus()."</strong>";
			echo "<br/>";
			echo $model->countContract();
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		echo "</br>";
		?>

		<?php
		echo "<div style='margin-top:10px;'>Join Date</div>";
		if (isset($model->companyfirst)) {
			echo "<strong>".$model->companyfirst->start_date."</strong>";
			echo "<br/>";
			echo $model->countJoinDate();
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		echo "</br>";
		?>
	</div>
	
