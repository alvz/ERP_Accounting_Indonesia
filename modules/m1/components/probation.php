<?php

Yii::import('zii.widgets.CPortlet');

class probation extends CPortlet
{

	protected function renderContent()
	{
			$criteria = new CDbCriteria;
			
			if (Yii::app()->user->name != "admin") {
				$criteria1 = new CDbCriteria;
				$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN ('.implode(",",Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY).')  ORDER BY c.start_date DESC LIMIT 1) IN (' .implode(",",sUser::model()->getGroupArray()).')';
				$criteria->mergeWith($criteria1);
			}

			$criteria->order='(select start_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1)';

			$criteria1 = new CDbCriteria;
			$criteria1->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) IN(4,5)';

			//$criteria2 = new CDbCriteria;
			//$criteria2->condition = '(select end_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) < //DATE_ADD(CURDATE(),INTERVAL 30 DAY)';

			$criteria->mergeWith($criteria1);
			//$criteria->mergeWith($criteria2);
			
			$total = gPerson::model()->count($criteria);
			$pages = new CPagination($total);
			$pages->pageSize = 20;
			$pages->applyLimit($criteria);
			$models= gPerson::model()->findAll($criteria);
	
			$this->render('probation',array(
				'models'=>$models,
				'pages' => $pages,
			));
	}
}