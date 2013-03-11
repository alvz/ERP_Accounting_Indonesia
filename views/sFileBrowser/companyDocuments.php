<?php
$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
				//array('label'=>'Personal Documents','url'=>Yii::app()->createUrl('/sFileBrowser')),
				//array('label'=>'Public Documents','url'=>Yii::app()->createUrl('/sFileBrowser/publicDocuments')),
				array('label'=>'Company Documents','url'=>Yii::app()->createUrl('/sFileBrowser/companyDocuments'),'active'=>true),
				array('label'=>'Company Documents Upload','url'=>Yii::app()->createUrl('/sFileBrowser/companyDocumentsAdmin'),'visible'=>Yii::app()->user->name == 'admin'),

		),
));
?>

<?php
// ElFinder widget
$this->widget('ext.elFinder.ElFinderWidget', array(
        'connectorRoute' => 'sFileBrowser/connectorCompanyDocuments',
        )
);

?>