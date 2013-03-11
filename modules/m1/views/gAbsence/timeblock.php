<?php
$this->breadcrumbs=array(
		'Attendance',
);

$this->menu=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gAbsence')),
		//array('label'=>'Schedule Upload', 'icon'=>'calendar','url'=>array('timeBlock')),
);

$this->menu1=gPerson::getTopUpdated();
$this->menu2=gPerson::getTopCreated();

?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		Attendance Schedule Import
	</h1>
</div>

	<?php 
	if (!isset($gridDataProvider)) {
		$this->widget('ext.EAjaxUpload.EAjaxUpload', array(
		'id'=>'uploadFile',
		'config'=>array(
			   'action'=>Yii::app()->createUrl('/m1/gAbsence/timeblockUpload',array()),
			   'allowedExtensions'=>array("xls"),//array("jpg","jpeg","gif","exe","mov" and etc...
			   'sizeLimit'=>5*1024*1024,// maximum file size in bytes
			   //'minSizeLimit'=>1*1024*1024,// minimum file size in bytes
			   'onComplete'=>"js:function(id, fileName, responseJSON){ location.reload(true); }",
			   'messages'=>array(
								 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
								 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
								 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
								 'emptyError'=>"{file} is empty, please select files again without it.",
								 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
								),
			   //'showMessage'=>"js:function(message){ alert(message); }"
			  ),
		)); 
	?>	
		<div class="alert alert-warning">
			<h4 class="alert-heading">Attention!!</h4>
			<p>File name must be: schedule.xls (MS Office 2005 format)</p>
			<p>File size must be less than 5 MB</p>
		</div>
	<?php	
	} else {
		echo CHtml::link('Save to Database',Yii::app()->createUrl('/m1/gAbsence/timeblockSave'),array('class'=>'btn btn-large'));
		echo CHtml::link('Delete Temp File',Yii::app()->createUrl('/m1/gAbsence/deleteTempFile'),array('class'=>'btn btn-large'));
		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'dataProvider'=>$gridDataProvider,
			'template'=>"{items}{pager}",
			'columns'=>$headers,
		)); 
	}
?>
