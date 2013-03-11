<?php

class GEssController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2left';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'rights',
		);
	}
	
	private function loadId()
	{
		$model=gPerson::model()->find('userid = '.Yii::app()->user->id);
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		return true;
	}

	public function actionIndex()
	{
		$this->loadId();
		$id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;

		$this->render('index',array(
				'model'=>$this->loadModel($id),
		));
		//$this->forward('person');
	}

	public function actionLeave($id=1)
	{
		$this->loadId();
		$id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;
			
		$this->render('leave',array(
				'model'=>$this->loadModel($id),
		));
	}

	public function actionPermission($id=1)
	{
		$this->loadId();
		$id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;
			
		$this->render('permission',array(
				'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionPerson($id=1)
	{
		$this->loadId();
		$id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;
		$modelOther=$this->newOther($id);

		$this->render('person',array(
				'model'=>$this->loadModel($id),
				'modelOther'=>$modelOther,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newOther($id)
	{
		$model=new gPersonOther;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonOther']))
		{
			$model->attributes=$_POST['gPersonOther'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		return $model;
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateLeave()
	{
		$model=new gLeave;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gLeave']))
		{
			$model->attributes=$_POST['gLeave'];
			$model->parent_id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;  //default PETER
			$model->approved_id =1; ///request
			if($model->save())
				$this->redirect(array('leave'));
		}

		$this->render('createLeave',array(
				'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateCancellationLeave()
	{
		$model=new gLeave;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gLeave']))
		{
			$model->attributes=$_POST['gLeave'];
			$model->parent_id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;  //default PETER
			$model->approved_id =8; ///Cancellation Leave
			if($model->save())
				$this->redirect(array('leave'));
		}

		$this->render('createCancellationLeave',array(
				'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateExtendedLeave()
	{
		$model=new gLeave;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gLeave']))
		{
			$model->attributes=$_POST['gLeave'];
			$model->parent_id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;  //default PETER
			$model->approved_id =7; ///Extended Leave
			if($model->save())
				$this->redirect(array('leave'));
		}
		
		$model->input_date=date('d-m-Y');
		$modG=$this->loadModel();
		$_md=date('d-m',strtotime($modG->companyfirst->start_date))."-".date('Y') ;
		$model->start_date=$_md;
		$_mn=date("d-m-Y",strtotime(date('d-m',strtotime($modG->companyfirst->start_date))."-".date('Y')."+6 month")) ;
		$model->end_date=$_mn;
		$model->number_of_day=$modG->leaveBalance->balance;
		$this->render('createExtendedLeave',array(
				'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreatePermission()
	{
		$model=new gPermission;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPermission']))
		{
			$model->attributes=$_POST['gPermission'];
			$model->parent_id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;  //default PETER
			$model->approved_id =1; ///request
			if($model->save())
				$this->redirect(array('permission'));
		}

		$this->render('createPermission',array(
				'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatePerson()
	{
		//$this->layout='//layouts/column2';
		
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPerson']))
		{
			$model->attributes=$_POST['gPerson'];
			if($model->save())
				$this->redirect(array('/m1/gEss/person'));
		}

		$this->render('updatePerson',array(
				'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatePermission($id)
	{
		$this->layout='//layouts/column2';

		$model=$this->loadModelPermission($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPermission']))
		{
			$model->attributes=$_POST['gPermission'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('updatePermission',array(
				'model'=>$model,
		));
	}

	public function actionUpdateLeave($id)
	{
		$this->layout='//layouts/column2';

		$model=$this->loadModelLeave($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gLeave']))
		{
			$model->attributes=$_POST['gLeave'];
			if($model->save())
				$this->redirect(array('/m1/gEss/leave'));
		}

		$this->render('updateLeave',array(
				'model'=>$model,
		));
	}

	public function actionDeleteLeave($id)
	{
		//$this->layout='//layouts/column2';

		$model=$this->loadModelLeave($id)->delete();

		$this->redirect(array('/m1/gEss/leave'));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel()
	{
		$model=gPerson::model()->find('userid = '.Yii::app()->user->id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModelPermission($id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$id);
		$criteria->compare('parent_id',gPerson::model()->find('userid ='.Yii::app()->user->id)->id);
		$criteria->compare('approved_id',1);
		
		$model=gPermission::model()->find($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelLeave($id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',(int)$id);
		$criteria->compare('parent_id',gPerson::model()->find('userid ='.Yii::app()->user->id)->id);
		//$criteria->addInCondition('approved_id',array(1,7,8)); //yang bisa di-delete/update hanya request, extended dan cancel
		$criteria->condition='balance is null'; //approved_id 1,7,8 when balance is null
 		
		$model=gLeave::model()->find($criteria);
		if($model==null)
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='g-person-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/////////////////////////////////////////////////////
	public function actionPrintLeave($id)
	{
		$pdf=new leaveForm('P','mm','A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);

		$criteria=new CDbCriteria;
		$criteria->compare('id',$id);
		$criteria->compare('parent_id',gPerson::model()->find('userid ='.Yii::app()->user->id)->id);
		$criteria->compare('approved_id',1);
		
		$model=gLeave::model()->find($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$pdf->report($model);
			
		$pdf->Output();

	}

	public function actionPrintCancellationLeave($id)
	{
		$pdf=new leaveCancellationForm('P','mm','A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);

		$criteria=new CDbCriteria;
		$criteria->compare('id',$id);
		$criteria->compare('parent_id',gPerson::model()->find('userid ='.Yii::app()->user->id)->id);
		$criteria->compare('approved_id',8);
		
		$model=gLeave::model()->find($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$pdf->report($model);
			
		$pdf->Output();

	}

	public function actionSummaryLeave($pid)
	{
		$pdf=new leaveFormSum('P','mm','A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);

		$criteria=new CDbCriteria;
		$criteria->with=array('leave');
		$criteria->condition='leave.approved_id = 2 or leave.approved_id = 9';
		$criteria->compare('t.id',(int)$pid);
		$models=gPerson::model()->find($criteria);
		if($models===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$pdf->report($models);
			
		$pdf->Output();

	}

	public function actionPrintPermission($id)
	{
		$pdf=new permissionForm('P','mm','A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);

		$criteria=new CDbCriteria;
		$criteria->compare('id',$id);
		$criteria->compare('parent_id',gPerson::model()->find('userid ='.Yii::app()->user->id)->id);
		$criteria->compare('approved_id',1);
		
		$model=gPermission::model()->find($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
			
		$pdf->report($model);
			
		$pdf->Output();

	}


}
