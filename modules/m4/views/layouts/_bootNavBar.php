<?php if (!Yii::app()->user->isGuest) {

	$dependency = new CDbCacheDependency('SELECT Count(um.id) AS t  FROM s_user_module um WHERE um.s_user_id ='.Yii::app()->user->id);
	
	if (Yii::app()->user->name == 'admin') {
		$Hierarchy=menu::model()->cache(3600,$dependency)->findAll(array('condition'=>'parent_id = \'0\' AND (name = \'m4\' OR name = \'m0\') ','order'=>'sort'));
	} else {
	
		$criteria=new CDbCriteria;
		$criteria->with=array('user');
		$criteria->compare('parent_id',0);
		$criteria->compare('user.s_user_id',Yii::app()->user->id);
		$criteria->order='t.sort';
		$criteria1=new CDbCriteria;
		$criteria1->compare('name','m1',true,'OR');
		$criteria1->compare('name','m0',true,'OR');
		$criteria->mergeWith($criteria1);
		
		//$Hierarchy=menu::model()->findAllBySql('SELECT a.id FROM s_module a
		//		LEFT JOIN s_user_module b ON a.id = b.s_module_id
		//		WHERE a.parent_id = "0"
		//		AND b.s_user_id = '.Yii::app()->user->id .' order by sort');
		$Hierarchy=menu::model()->cache(3600,$dependency)->findAll($criteria);
	}

	//if($this->beginCache('rHirarki', array('duration'=>60*60*2))) { 
		foreach ($Hierarchy as $Hierarchy){
			$models = menu::model()->findByPk($Hierarchy->id);
			$items[] = $models->getListed();
		}
	//$this->endCache(); }
		
	$this->widget('bootstrap.widgets.TbNavbar', array(
			//'fixed'=>true,
			'brand'=>Yii::app()->name,
			'brandUrl'=>Yii::app()->createUrl("menu"),
			'collapse'=>true, // requires bootstrap-responsive.css
			'items'=>array(
					array(
							'class'=>'bootstrap.widgets.TbMenu',
							'items'=>$items,
					),
					array(
							'class'=>'bootstrap.widgets.TbMenu',
							'htmlOptions'=>array('class'=>'pull-right'),
							'items'=>array(
									array('label'=>Yii::app()->user->name, 'icon'=>'icon-th', 'url'=>'#', 'items'=>array(
											array('label'=>'Notification', 'icon'=>'bookmark','url'=>Yii::app()->createUrl("sNotification")),
											array('label'=>'Feedback', 'icon'=>'comment','url'=>Yii::app()->createUrl("sFeedback")),
											array('label'=>'Help', 'icon'=>'question-sign','url'=>Yii::app()->createUrl("sAdmin/help")),
											'---',
											array('label'=>sUser::model()->getGroupName(), 'icon'=>'list','url'=>Yii::app()->createUrl('/aOrganization/viewSelf',array('id'=>sUser::model()->getGroup()))),
											array('label'=>'My Profile', 'icon'=>'user','url'=>Yii::app()->createUrl('/sUser/viewSelf',array('id'=>Yii::app()->user->id))),
											array('label'=>'Change Password', 'icon'=>'user','url'=>Yii::app()->createUrl('/sUser/updatePasswordAuthenticated',array('id'=>Yii::app()->user->id))),
											'---',
											//array('label'=>'Theme', 'icon'=>'road','url'=>'#'),
											//array('label'=>'Bookmark', 'icon'=>'list','url'=>'#'),
											//array('label'=>'Version', 'icon'=>'info-sign','url'=>Yii::app()->createUrl("menu/version")),
											//array('label'=>'About', 'icon'=>'qrcode', 'url'=>Yii::app()->createUrl("menu/about")),
											//'---',
											array('label'=>'Log Out', 'icon'=>'off', 'url'=>Yii::app()->createUrl("site/logout")),
									)),
							),
					),
			),
	));
} else {
	$this->widget('bootstrap.widgets.TbNavbar', array(
			//'fixed'=>true,
			'brand'=>Yii::app()->name,
			'brandUrl'=>'#',
			'collapse'=>true, // requires bootstrap-responsive.css
			'items'=>array(
			),
	));
}

?>
