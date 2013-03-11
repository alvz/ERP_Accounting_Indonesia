<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs=array(
	'Company News'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Home', 'url'=>array('/sCompanyNews')),
	array('label'=>'View', 'url'=>array('/sCompanyNews/view',"id"=>$model->id)),
);

$this->menu1=sCompanyNews::getTopUpdated();
$this->menu2=sCompanyNews::getTopCreated();

?>

<div class="page-header">
<h1>
	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/preferences_desktop_notification.png') ?>
	Update
</h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>