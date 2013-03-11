
<?php
	//$this->widget('createNew');
?>

<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'File Management',
    'headerIcon' => 'icon-file',
));

$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>array(
				//array('label'=>'Personal Documents', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/sFileBrowser')),
				//array('label'=>'Public Documents', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/sFileBrowser/publicDocuments')),
				array('label'=>'Company Documents', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/sFileBrowser/companyDocuments')),
				array('label'=>'Admin Upload', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/sFileBrowser/companyDocumentsAdmin'),'visible'=>Yii::app()->user->name == 'admin'),
		),
));

$this->endWidget();
?>

<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Calendar',
    'headerIcon' => 'icon-calendar',
));

 $this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>array(
				array('label'=>'Public Calendar', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/calendar')),
				array('label'=>'Personal Calendar', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/calendar/main/personal')),
		),
));

$this->endWidget();
?>

<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'About Company',
    'headerIcon' => 'icon-flag',
));

 $this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>array(
				array('label'=>'Photo Gallery', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/sGallery')),
				array('label'=>'Company News', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/sCompanyNews')),
		),
));

$this->endWidget();
?>

<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Communication',
    'headerIcon' => 'icon-headphones',
));

 $this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>array(
				//array('label'=>Yii::t('sidebar',' Mail Box'), 'count'=>Yii::app()->getModule("mailbox")->getNewMsgs(Yii::app()->user->id), 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/mailbox')),
				array('label'=>'Mail Box', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/mailbox')),
				//array('label'=>Yii::t('sidebar','Forum'), 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/forum')),
				//array('label'=>Yii::t('sidebar','SMS'), 'icon'=>'list-alt','url'=>'#'),
				//array('label'=>Yii::t('sidebar','Chat'), 'icon'=>'list-alt','url'=>'#'),
				//array('label'=>Yii::t('sidebar','Click To Call'), 'icon'=>'list-alt','url'=>'#'),
		),
));

$this->endWidget();
?>

<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Related Website',
    'headerIcon' => 'icon-refresh',
));

 $this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>require(Yii::app()->basePath.'/config/relatedLink.php'),
)); 

$this->endWidget();
?>

<?php /*

$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Related Website',
    'headerIcon' => 'icon-file',
));

$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>array(
				array('label'=>'Profile', 'icon'=>'list-alt','url'=>Yii::app()->createUrl('/sUser/viewPublic',array('id'=>Yii::app()->user->id))),
				array('label'=>'Theme', 'icon'=>'list-alt','url'=>'#'),
				array('label'=>'Bookmark', 'icon'=>'list-alt','url'=>'#'),
		),
)); 

$this->endWidget();
?>
<br />

*/ ?>

