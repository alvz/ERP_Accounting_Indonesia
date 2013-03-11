<?php $this->breadcrumbs = array(
		'Rights'=>Rights::getBaseUrl(),
		Rights::t('core', 'Operations'),
); ?>

<?php
$this->renderPartial('/assignment/_menu');
?>

<div class="row">
<div class="span12">

	<div class="page-header">
		<h1>
			<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/calculator_operations.png') ?>
			<?php echo Rights::t('core', 'Operations'); ?>
		</h1>
	</div>

	<p>
		<?php echo CHtml::link(Rights::t('core', 'Create a new operation'), array('authItem/create', 'type'=>CAuthItem::TYPE_OPERATION), array(
				'class'=>'add-operation-link btn',
		)); ?>
	</p>

	<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'itemsCssClass'=>'table table-striped table-bordered',
			'template'=>'{items}{pager}{summary}',
			'dataProvider'=>$dataProvider,
			'template'=>'{items}',
			'emptyText'=>Rights::t('core', 'No operations found.'),
			'htmlOptions'=>array('class'=>'grid-view operation-table sortable-table'),
			'columns'=>array(
					array(
							'name'=>'name',
							'header'=>Rights::t('core', 'Name'),
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'name-column'),
							'value'=>'$data->getGridNameLink()',
					),
					array(
							'name'=>'description',
							'header'=>Rights::t('core', 'Description'),
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'description-column'),
					),
					array(
							'name'=>'bizRule',
							'header'=>Rights::t('core', 'Business rule'),
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'bizrule-column'),
							'visible'=>Rights::module()->enableBizRule===true,
					),
					array(
							'name'=>'data',
							'header'=>Rights::t('core', 'Data'),
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'data-column'),
							'visible'=>Rights::module()->enableBizRuleData===true,
					),
					array(
							'header'=>'&nbsp;',
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'actions-column'),
							'value'=>'$data->getDeleteOperationLink()',
					),
			)
	)); ?>

	<p class="info">
		<?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?>
	</p>

</div>
</div>
