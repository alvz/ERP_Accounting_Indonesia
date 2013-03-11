<?php

Yii::import('zii.widgets.CPortlet');

class birthday extends CPortlet
{
	public function getRecentData()
	{
			$criteria = new CDbCriteria;
			$criteria->condition="date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))  
			BETWEEN curdate() AND DATE_ADD(curdate(),INTERVAL 7 DAY)";
			$criteria->order="date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))";
			
			if (Yii::app()->user->name != "admin") {
				$criteria1 = new CDbCriteria;
				$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (1,2,3,4,5,6,15) ORDER BY c.start_date DESC LIMIT 1) = '.sUser::model()->getGroup() ;
				$criteria->mergeWith($criteria1);
			}
			$models=gPerson::model()->findAll($criteria);
			
			return $models;
	}

	protected function renderContent()
	{
		$this->render('birthday');
	}
}