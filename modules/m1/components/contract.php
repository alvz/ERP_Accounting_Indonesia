<?php

Yii::import('zii.widgets.CPortlet');

class contract extends CPortlet
{
	public function getRecentData()
	{
			$criteria = new CDbCriteria;
			
			if (Yii::app()->user->name != "admin") {
				$criteria1 = new CDbCriteria;
				$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (1,2,3,4,5,6,15) ORDER BY c.start_date DESC LIMIT 1) IN ('.implode(",",sUser::model()->getGroupArray()). ')' ;
				$criteria->mergeWith($criteria1);
			}
			
			$criteria->order='(select start_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1)';
			
			$criteria1 = new CDbCriteria;
			$criteria1->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) IN(1,2,3)';

			$criteria2 = new CDbCriteria;
			$criteria2->condition = '(select end_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) < DATE_ADD(CURDATE(),INTERVAL 31 DAY)';

			$criteria->mergeWith($criteria1);
			$criteria->mergeWith($criteria2);
					
			$models=gPerson::model()->findAll($criteria);
			
			return $models;
	}

	protected function renderContent()
	{
		$this->render('contract');
	}
}