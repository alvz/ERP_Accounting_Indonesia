<?php

$Hierarchy=aOrganization::model()->findAll(array('condition'=>Yii::app()->params['parent_organization_filter']));

foreach ($Hierarchy as $Hierarchy){
$models = aOrganization::model()->findByPk($Hierarchy->id);
$items[] = $models->getTreeUser();
}

$this->beginWidget('CTreeView', array(
		'id'=>'module-tree',
		'data'=>$items,
		//'url' => array('/aOrganization/ajaxFillUser'),
		//'collapsed'=>true,
		//'unique'=>true,
));
$this->endWidget();

?>
