<?php
/* @var $this SCompanyNewsController */
/* @var $data SCompanyNews */
?>

<div class="row-fluid">
<div class="span12">
	<h4>
	<?php echo CHtml::link(CHtml::encode($data->title),Yii::app()->createUrl('/sCompanyNews/view',array('id'=>$data->id))); ?>
	</h4>
</div>	
</div>	
	<div class="row-fluid">
	<div class="span1">
		<?php
			//$this->widget('ext.espaceholder.ESpaceHolder', array(
			//		'size' => '100x100', // you can also do 300x250
			//		'text' => CHtml::encode($data->id),
			//		'htmlOptions' => array( 'title' => 'image' )
			//));
		?>
		<?php	echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/FA-logo-APL-1_ONLY.jpg", CHtml::encode($data->id), array("width"=>"100%")); ?>
	</div>
	<div class="span10">
		<?php echo date('d-m-Y',$data->created_date); ?>
		<br />
<?php
	$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
	$_desc = $data->content ? substr($data->content,0,420) ."..."."</p>" : "";
	echo $_desc ;
	$this->endWidget();
?>
		<br />
		<br />



	</div>
	</div>
