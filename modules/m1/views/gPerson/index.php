<?php
$this->breadcrumbs=array(
		'G people',
);

//$this->menu=array(
//		array('label'=>'Home','url'=>array('/m1/gPerson')),
//		//array('label'=>'Manage gPerson','url'=>array('admin')),
//);



$this->menu1=gPerson::getTopUpdated();
$this->menu2=gPerson::getTopCreated();
$this->menu5=array('Person');

//$this->menu7=array(
//		array('label'=>'All','icon'=>'list','url'=>array('/m1/gPerson')),
//		array('label'=>'Sample Dept','icon'=>'list','url'=>'#'),
//);

$this->menu7=aOrganization::compDeptPersonFilter();

?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<i class="iconic-user"></i>
		Employee Data
	</h1>
</div>

<?php
//$this->widget('DropDownRedirect', array(
//		'data' => aOrganization::compDeptGroupRedirect(),
//		'url' => $this->createUrl('/m1/gPerson/index', array('pid' => '__value__')),
//		'select' =>(isset($_GET['pid'])) ? $_GET['pid'] : "(ALL)",
//		'htmlOptions'=>array('class'=>'span4','prompt'=>'Select Department::'),
//));
?>

<?php 
if (isset($_GET['pid'])) {
	if ((int)$_GET['pid'] !=0) {
		echo "<b><p style='display: block;margin: 5px 0;padding: 2px;background-color: yellow;'>";
		echo "Filter By Directorate/Department: " . aOrganization::model()->findByPk((int)$_GET['pid'])->name;
		echo "</p></b>";
	}
}
?>

<?php 
	$this->widget('bootstrap.widgets.TbListView',array(
	//$this->widget('ext.EColumnListView', array(
		//'columns' => 3,
		'dataProvider'=>$dataProvider,
		'template'=>'{items}{pager}',
		'itemView'=>'/gPerson/_view',
)); ?>

<?php //echo $this->module->filterUserCompany ?>