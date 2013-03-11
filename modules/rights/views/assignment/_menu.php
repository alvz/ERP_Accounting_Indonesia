<?php
$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
				array('label'=>'Permission','url'=>Yii::app()->createUrl('/rights')),
				array('label'=>'Roles','url'=>Yii::app()->createUrl('/rights/authItem/roles')),
				array('label'=>'Tasks','url'=>Yii::app()->createUrl('/rights/authItem/tasks')),
				array('label'=>'Operations','url'=>Yii::app()->createUrl('/rights/authItem/operations')),

		),
));
?>

