<?php  
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/peter_custom.css');

?>

<?php
$this->breadcrumbs=array(
		$this->module->id,
);
?>

<div class="page-header">
	<h3>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/company.png') ?>
		<?php
			if (Yii::app()->user->name !="admin") {
				echo sUser::model()->GroupName; 
			} else
				echo "Corporate DashBoard"; 
			
		?>
	</h3>
</div>



<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Graphics', 'url'=>Yii::app()->createUrl('/m1/default')),
        //array('label'=>'Report', 'url'=>Yii::app()->createUrl('/m1/default/index2'), 'active'=>true),
        array('label'=>'Business Intellegent', 'url'=>'#'),
    ),
)); ?>
<hr/>

<?php echo CHtml::link('Report Employee per Department',Yii::app()->createUrl('/m1/default/report4'),array('target'=>'_blank'))  ?>
<br/>

<?php echo CHtml::link('Report Level Employee per Department',Yii::app()->createUrl('/m1/default/report3'),array('target'=>'_blank'))  ?>
<br/>
