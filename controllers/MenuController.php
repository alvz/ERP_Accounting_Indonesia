<?php

class MenuController extends Controller
{
	public $layout='//layouts/main';

	public function init()
	{
		//Yii::app()->language='id';
		//return parent::init();

		//Yii::import('ext.LanguagePicker.ELanguagePicker');
		//ELanguagePicker::setLanguage();
		//return parent::init();
	}

	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'CCaptchaAction',
						'backColor'=>0xFFFFFF,
				),
		);
	}

	public function filters()
	{
		return array(
				'rights',
		);
	}

	public function actionIndex()
	{
		//$modeltask=$this->newTask();

		$dataProviderInbox=$this->listInbox();

		if(!Yii::app()->user->isGuest) {


			$this->render('index',array(
					//'modeltask'=>$modeltask,
					'dataProviderInbox'=>$dataProviderInbox,
			));

		} else {
			$this->redirect(array('site/login'));
		}

	}

	public function listInbox($ajax=null)
	{
		Yii::app()->getModule('mailbox')->registerConfig($this->getAction()->getId());
		//$cs =& Yii::app()->getModule('mailbox')->getClientScript();
		//$cs->registerScriptFile(Yii::app()->getModule('mailbox')->getAssetsUrl().'/js/mailbox.js',CClientScript::POS_END);
		//$js = '$("#mailbox-list").yiiMailboxList('.Yii::app()->getModule('mailbox')->getOptions().');console.log(1)';

		//$cs->registerScript('mailbox-js',$js,CClientScript::POS_READY);

		//if(isset($_POST['convs']))
		//{
		//	$this->buttonAction('inbox');
		//}

		$dataProvider = new CActiveDataProvider( Mailbox::model()->inbox(Yii::app()->user->id) );
		return $dataProvider;
/*		if(isset($ajax))
			$this->renderPartial('_mailbox',array('dataProvider'=>$dataProvider));
		else{
			if(!isset($_GET['Mailbox_sort']))
				$_GET['Mailbox_sort'] = 'modified.desc';

			$this->render('mailbox',array('dataProvider'=>$dataProvider));
		}
*/
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newTask()
	{
		$model=new sTask;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['sTask']))
		{
			$model->attributes=$_POST['sTask'];
			$model->created_by=Yii::app()->user->id;
			$model->mark_id=1;
			if($model->save()) {
				Yii::app()->user->setFlash('success','data has been saved successfully');
				$this->refresh();
			}
		}

		return $model;
	}


	public function actionVersion()
	{
		$this->render('version');
	}

	public function actionAbout()
	{
		$this->render('about');
	}

	public function actionNamodule()
	{
		$this->render('namodule');
	}

}
