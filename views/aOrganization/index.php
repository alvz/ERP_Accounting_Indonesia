<?php
$this->breadcrumbs=array(
		'Organization Structure',
);

$this->menu=array(
		array('label'=>'Home','url'=>array('/aOrganization')),
);

$this->menu1=aOrganization::getTopUpdated();
$this->menu2=aOrganization::getTopCreated();
$this->menu5=array('Organization');

?>


<div class="page-header">
	<h1>
	<i class="iconic-image"></i>
	Organization Structure</h1>
</div>


<?php $this->renderPartial('_search',array(
		'model'=>$model,
)); ?>
	
<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
)); ?>
