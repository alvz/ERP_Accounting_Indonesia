<?php

Yii::import('zii.widgets.CPortlet');

class feedback extends CPortlet
{
	//public $title='Feedback Box';

	public function getRecentData1()
	{
		return sFeedback::model()->searchFilter();
	}

	protected function renderContent()
	{
		$this->render('feedback');
	}
}