<?php
$this->breadcrumbs=array(
		'User'=>array('/sUser'),
		'Manage',
);

$this->menu5=array('User');

$this->menu=array(
		array('label'=>'Rights', 'url'=>array('/rights')),
		array('label'=>'Modules', 'url'=>array('/sModule')),
);

$this->menu2=sUser::getTopCreated();




?>

<div class="page-header">
	<h1>
		<i class="iconic-user"></i>
		User Management
	</h1>
</div>

<?php 
if (isset($_GET['pid'])) {
	if ((int)$_GET['pid'] !=0) {
		echo "<b><p style='display: block;margin: 5px 0;padding: 2px;background-color: yellow;'>";
		echo "Filter By Company: " . aOrganization::model()->findByPk((int)$_GET['pid'])->name;
		echo "</p></b>";
	}
}
?>

	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'sortableAttributes'=>array('last_login','created_date'),
	'itemView'=>'_view',
)); ?>
