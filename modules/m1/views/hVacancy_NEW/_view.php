<?php
/* @var $this HVacancyController */
/* @var $data hVacancy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode($data->company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vacancy_title')); ?>:</b>
	<?php echo CHtml::encode($data->vacancy_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vacancy_desc')); ?>:</b>
	<?php echo CHtml::encode($data->vacancy_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('industry_tag')); ?>:</b>
	<?php echo CHtml::encode($data->industry_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('for_level')); ?>:</b>
	<?php echo CHtml::encode($data->for_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('specification_tag')); ?>:</b>
	<?php echo CHtml::encode($data->specification_tag); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('work_address')); ?>:</b>
	<?php echo CHtml::encode($data->work_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_salary')); ?>:</b>
	<?php echo CHtml::encode($data->min_salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_salary')); ?>:</b>
	<?php echo CHtml::encode($data->max_salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salary_hide')); ?>:</b>
	<?php echo CHtml::encode($data->salary_hide); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_working_exp')); ?>:</b>
	<?php echo CHtml::encode($data->min_working_exp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_education_level')); ?>:</b>
	<?php echo CHtml::encode($data->min_education_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_gpa')); ?>:</b>
	<?php echo CHtml::encode($data->min_gpa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_required')); ?>:</b>
	<?php echo CHtml::encode($data->skill_required); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_content')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_date')); ?>:</b>
	<?php echo CHtml::encode($data->updated_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	*/ ?>

</div>