<?php
/* @var $this HApplicantController */
/* @var $data hApplicant */
?>

<h4><?php echo CHtml::link(CHtml::encode($data->applicant_name),Yii::app()->createUrl('/m1/hApplicant/view',array('id'=>$data->id))); ?></h4>

<div class="row">
<div class="span1">
	<?php echo $data->photoPath; ?>
</div>
<div class="span5">
<p>
	<b><?php echo CHtml::encode($data->getAttributeLabel('applicant_code')); ?>:</b>
	<?php echo CHtml::encode($data->applicant_code); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_place')); ?>:</b>
	<?php echo CHtml::encode($data->birth_place); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_date')); ?>:</b>
	<?php echo CHtml::encode($data->birth_date); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex_id')); ?>:</b>
	<?php echo CHtml::encode($data->sex->name); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_id')); ?>:</b>
	<?php echo (isset($data->religion)) ? $data->religion->name : ''; ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('address1')); ?>:</b>
	<?php echo CHtml::encode($data->address1); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('address2')); ?>:</b>
	<?php echo CHtml::encode($data->address2); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('address3')); ?>:</b>
	<?php echo CHtml::encode($data->address3); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('pos_code')); ?>:</b>
	<?php echo CHtml::encode($data->pos_code); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('email2')); ?>:</b>
	<?php echo CHtml::encode($data->email2); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_phone')); ?>:</b>
	<?php echo CHtml::encode($data->home_phone); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('handphone')); ?>:</b>
	<?php echo CHtml::encode($data->handphone); ?> |

	<b><?php echo CHtml::encode($data->getAttributeLabel('handphone2')); ?>:</b>
	<?php echo CHtml::encode($data->handphone2); ?>

<br/>
<strong>Applying on:</strong>
<?php 
foreach ($data->vacancyMany as $list) {
	echo CHtml::link($list->vacancytitle,Yii::app()->createUrl('/m1/hVacancy/view',array('id'=>$list->id)),array('target'=>'_blank'));
	echo " | ";
}
?>

</p>
</div>
</div>
<hr/>
