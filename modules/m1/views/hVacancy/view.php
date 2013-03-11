<?php
/* @var $this GVacancyController */
/* @var $model gVacancy */

$this->breadcrumbs=array(
	'G Vacancies'=>array('index'),
	$model->id,
);

$this->menu7=hVacancy::model()->getTopRecentVacancy();

$this->menu=array(
		array('label'=>'Vacancy', 'icon'=>'home', 'url'=>array('/m1/hVacancy')),
		array('label'=>'Applicant', 'icon'=>'user', 'url'=>array('/m1/hApplicant')),
		array('label'=>'Interview', 'icon'=>'volume-up', 'url'=>array('/m1/hVacancy/interview')),
		array('label'=>'Update', 'icon'=>'edit', 'url'=>array('/m1/hVacancy/update','id'=>$model->id)),
		array('label'=>'Broadcast', 'icon'=>'envelope', 'url'=>array('/m1/hVacancy/broadcast','id'=>$model->id)),
);
$this->menu4=hVacancyApplicant::model()->getTopRecentInterview();
$this->menu8=hApplicant::model()->getTopRecentApplicant();


?>

		<div class="btn-toolbar pull-right">
			<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
				'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'buttons'=>array(
					array('label'=>'Job Status', 'items'=>array(
						array('label'=>'Opened', 'url'=>Yii::app()->createUrl('/m1/hVacancy/status',array('id'=>$model->id,'act'=>1))),
						array('label'=>'Closed', 'url'=>Yii::app()->createUrl('/m1/hVacancy/status',array('id'=>$model->id,'act'=>4))),
						array('label'=>'Update', 'url'=>Yii::app()->createUrl('/m1/hVacancy/update',array('id'=>$model->id))),
					)),
				),
			)); ?>
		</div>

<div class="page-header">
	<h1>
	<?php 
			if ($model->status_id ==4) {
				echo " [Closed] ";
			}
			echo $model->vacancytitle;
	?>
	
	</h1>
</div>
<p>
	<b><?php echo CHtml::encode($model->getAttributeLabel('industryid')); ?>:</b>
	<?php echo CHtml::encode($model->industry->name); ?> |

	<b><?php echo CHtml::encode($model->getAttributeLabel('plevelid')); ?>:</b>
	<?php echo (isset($model->level)) ? $model->level->name :""; ?> |

	<b><?php echo CHtml::encode($model->getAttributeLabel('jspecid')); ?>:</b>
	<?php echo CHtml::encode($model->spec->name); ?> |

	<b><?php echo CHtml::encode($model->getAttributeLabel('work_address')); ?>:</b>
	<?php echo CHtml::encode($model->work_address); ?> | 

	<b><?php echo CHtml::encode($model->getAttributeLabel('work_area')); ?>:</b>
	<?php echo CHtml::encode($model->work_area); ?> |

	<b><?php echo CHtml::encode($model->getAttributeLabel('salary_currency')); ?>:</b>
	<?php echo CHtml::encode($model->salary_currency); ?> |

	<b><?php echo CHtml::encode($model->getAttributeLabel('skill_required')); ?>:</b>
	<?php echo CHtml::encode($model->skill_required); ?>

	<?php if (!Yii::app()->user->isGuest) { ?>
		<b><?php echo CHtml::encode($model->getAttributeLabel('salary_min')); ?>:</b>
		<?php echo CHtml::encode($model->salary_min); ?> |
	
		<b><?php echo CHtml::encode($model->getAttributeLabel('salary_max')); ?>:</b>
		<?php echo CHtml::encode($model->salary_max); ?> |
	
		<b><?php echo CHtml::encode($model->getAttributeLabel('min_work_exp')); ?>:</b>
		<?php echo CHtml::encode($model->min_work_exp); ?> |
	
		<b><?php echo CHtml::encode($model->getAttributeLabel('min_edulvl')); ?>:</b>
		<?php echo (isset($model->edulevel)) ? $model->edulevel->name :""; ?> |
	
		<b><?php echo CHtml::encode($model->getAttributeLabel('min_grade')); ?>:</b>
		<?php echo CHtml::encode($model->min_grade); ?>
		<br/>
	<?php } ?>




</p>
	<?php
	$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'tabs'=>array(
			array('id'=>'tab1','label'=>'Unprocessed  ('.$model->screened(1).')','content'=>$this->renderPartial("_tabUnscreened", array("model"=>$model), true),'active'=>true),
			array('id'=>'tab2','label'=>'Pre Screened ('.$model->screened(2).')','content'=>$this->renderPartial("_tabPrescreened", array("model"=>$model), true)),
			array('id'=>'tab3','label'=>'Keep for Reference ('.$model->screened(3).')','content'=>$this->renderPartial("_tabKeep", array("model"=>$model), true)),
			array('id'=>'tab4','label'=>'INTERVIEW ('.$model->screened(4).')','content'=>$this->renderPartial("_tabInterview", array("model"=>$model), true)),
			array('id'=>'tab10','label'=>'Other', 'items'=>array(
				array('id'=>'tab5','label'=>'Rejected ('.$model->screened(5).')','content'=>$this->renderPartial("_tabRejected", array("model"=>$model), true)),
				array('id'=>'tab6','label'=>'BlackListed ('.$model->screened(6).')','content'=>$this->renderPartial("_tabBlacklisted", array("model"=>$model), true)),
				array('id'=>'tab7','label'=>'Hired ('.$model->screened(7).')','content'=>$this->renderPartial("_tabHired", array("model"=>$model), true)),
				array('id'=>'tab8','label'=>'Other ('.$model->screened(8).')','content'=>$this->renderPartial("_tabOther", array("model"=>$model), true)),
				array('id'=>'tab8','label'=>'Withdraw ('.$model->screened(9).')','content'=>$this->renderPartial("_tabWithdraw", array("model"=>$model), true)),
			)),
			//array('id'=>'tab9','label'=>'Job Info','content'=>$this->renderPartial("_tabDetail", array("model"=>$model), true)),
		),
	));
	?>

<div id="detail">
<?php
	if (isset($modelApplicant)) {
		$this->renderPartial('_detailApplicant', array(
				'modelApplicant' => $modelApplicant,
			));
	}
?>
</div>