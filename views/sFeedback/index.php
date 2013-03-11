<?php
$this->breadcrumbs=array(
		'Feedback',
);

//$this->menu=array(
//		array('label'=>'Create', 'url'=>array('create')),
//);

$this->menu1=sFeedback::getTopUpdated();
$this->menu2=sFeedback::getTopCreated();
$this->menu5=array('Feedback');


?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/preferences_desktop_notification.png') ?>
		Feedback
	</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'pills', // 'tabs' or 'pills'
		'tabs' => array(
				array('label'=>'Open Case', 'content' =>$this->renderPartial("_tabOpenCase", array(), true),'active'=>true),
				array('label'=>'In Queue', 'content' =>$this->renderPartial("_tabInQueue", array(), true)),
				array('label'=>'In Process', 'content' =>$this->renderPartial("_tabInProcess", array(), true)),
				array('label'=>'Partial Solved', 'content' =>$this->renderPartial("_tabPartial", array(), true)),
				array('label'=>'Case Closed', 'content' =>$this->renderPartial("_tabCaseClosed", array(), true)),
		),
));
?>
