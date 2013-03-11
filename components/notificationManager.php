<?php

Yii::import('zii.widgets.CPortlet');

class notificationManager extends CPortlet
{

	protected function renderContent()
	{
        $notifiche = sNotificationMessage::getUnreadNotifications();
        $number = 0;
        //foreach ($notifiche as $notifica) {
        //    if($notifica->isNotReaded()) {
        //        $number = $number + 1;
        //        Yii::app()->user->setFlash('success' . ($number), $notifica->content);
        //    }
    	//}
		$this->render('notificationManager',array(
            'notifiche' => $notifiche,
		));
	}
}


