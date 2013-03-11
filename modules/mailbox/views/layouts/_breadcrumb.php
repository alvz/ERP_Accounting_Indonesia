<?php if (!Yii::app()->user->isGuest) { ?>

<div class="row">
	<div class="span12">

			<?php if (isset($this->breadcrumbs)):?>
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs',array(
					'links'=>$this->breadcrumbs,
					'separator'=>'/',
			)); ?>
			<?php endif?>

	</div>
</div>

<?php } ?>
