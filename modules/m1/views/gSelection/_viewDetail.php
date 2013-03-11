<div class="row-fluid">
	<div class="span2 well">
		<?php 
			echo $data->photoPath;
		?>
	</div>
	<div class="span9">
		<?php echo "For Position: ".CHtml::encode($data->for_position); ?>
		<br/>
		<?php echo "Company: ". $data->company->name; ?>
		<br/>
		<?php echo "Department: ". $data->department->name; ?>
		<br/>
		<?php echo "Address: ".CHtml::encode($data->address); ?>
		<br/>
		<?php echo "Home Phone: ".CHtml::encode($data->home_phone); ?>
		<br/>
		<?php echo "Handphone: ".CHtml::encode($data->handphone); ?>
		<br/>
		<?php echo "Email: ".CHtml::encode($data->email); ?>
		<br/>
		<?php echo "Source: ".$data->source->name; ?>
		<br/>

	</div>


</div>
