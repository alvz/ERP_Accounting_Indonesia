<?php
/* @var $this GVacancyController */
/* @var $data gVacancy */
?>

<div class="row">
<div class="span6">

	<h3><?php
			echo CHtml::link(CHtml::encode($data->vacancytitle),
			Yii::app()->createUrl('/m1/hVacancy/view',array('id'=>$data->id))); 
	?>
	</h3>	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('industryid')); ?>:</b>
	<?php echo CHtml::encode($data->industry->name); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('plevelid')); ?>:</b>
	<?php echo (isset($data->level)) ? $data->level->name :""; ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('jspecid')); ?>:</b>
	<?php echo CHtml::encode($data->spec->name); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_address')); ?>:</b>
	<?php echo CHtml::encode($data->work_address); ?> | 

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_area')); ?>:</b>
	<?php echo CHtml::encode($data->work_area); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('salary_currency')); ?>:</b>
	<?php echo CHtml::encode($data->salary_currency); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_required')); ?>:</b>
	<?php echo CHtml::encode($data->skill_required); ?>

	<?php if (!Yii::app()->user->isGuest) { ?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('salary_min')); ?>:</b>
		<?php echo CHtml::encode($data->salary_min); ?> |
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('salary_max')); ?>:</b>
		<?php echo CHtml::encode($data->salary_max); ?> |
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('min_work_exp')); ?>:</b>
		<?php echo CHtml::encode($data->min_work_exp); ?> |
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('min_edulvl')); ?>:</b>
		<?php echo (isset($data->edulevel)) ? $data->edulevel->name :""; ?> |
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('min_grade')); ?>:</b>
		<?php echo CHtml::encode($data->min_grade); ?>
		<br/>
	<?php } ?>

	<?php //echo CHtml::link('apply',Yii::app()->createUrl('/vacancy/apply',array('id'=>$data->id)),array('class'=>'btn btn-mini')); ?>


</div>
</div>

