<?php

class HApplicantController extends Controller
{
	
	//public $layout='//layouts/column2leftW';
	public $layout='//layouts/column3leftW';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
	

	public function actionIndex()
	{
		$model=new fApplicant;
		$model->unsetAttributes();  // clear any default values
		
		$criteria=new CDbCriteria;
				
		$dataProvider=new CActiveDataProvider('hApplicant',array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'created_date DESC',
			)
		));
		
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	public function actionFilter()
	{
		$model=new fApplicant;
		$model->unsetAttributes();  // clear any default values
		
		$criteria=new CDbCriteria;
		$criteria1=new CDbCriteria;
		
		if(isset($_GET['fApplicant'])) {
			$model->attributes=$_GET['fApplicant'];
			$criteria->with=array('many_education');
			$criteria->together=true;

			$criteria->compare('sex_id',$_GET['fApplicant']['sex_id']);
			$criteria->compare('many_education.level_id',$_GET['fApplicant']['education_id']);
			
			$criteria1->addSearchCondition('applicant_name',$_GET['fApplicant']['keyword'],true,'OR');
			$criteria1->addSearchCondition('address1',$_GET['fApplicant']['keyword'],true,'OR');
			$criteria1->addSearchCondition('email',$_GET['fApplicant']['keyword'],true,'OR');
			$criteria1->addSearchCondition('email2',$_GET['fApplicant']['keyword'],true,'OR');
			
			$criteria->mergeWith($criteria1);
			
		}
		
		$dataProvider=new CActiveDataProvider('hApplicant',array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'created_date DESC',
			)
		));
		
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$modelFamily=$this->newFamily($id);
		$modelEducation=$this->newEducation($id);
		$modelEducationNf=$this->newEducationNf($id);
		$modelExperience=$this->newExperience($id);

		$this->render('view',array(
				'model'=>$this->loadModel($id),
				'modelFamily'=>$modelFamily,
				'modelEducation'=>$modelEducation,
				'modelEducationNf'=>$modelEducationNf,
				'modelExperience'=>$modelExperience,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newFamily($id)
	{
		$model=new hApplicantFamily;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicantFamily']))
		{
			$model->attributes=$_POST['hApplicantFamily'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('/m1/hApplicant/view','id'=>$id));
		}

		return $model;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newEducation($id)
	{
		$model=new hApplicantEducation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicantEducation']))
		{
			$model->attributes=$_POST['hApplicantEducation'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('/m1/hApplicant/view','id'=>$id));
		}

		return $model;
	}

	public function newEducationNf($id)
	{
		$model=new hApplicantEducationNf;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicantEducationNf']))
		{
			$model->attributes=$_POST['hApplicantEducationNf'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('/m1/hApplicant/view','id'=>$id));
		}

		return $model;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newExperience($id)
	{
		$model=new hApplicantExperience;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicantExperience']))
		{
			$model->attributes=$_POST['hApplicantExperience'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('/m1/hApplicant/view','id'=>$id));
		}

		return $model;
	}

	public function actionUpdateFamily($id)
	{
		$model=$this->loadModelFamily($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicantFamily']))
		{
			$model->attributes=$_POST['hApplicantFamily'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formFamily',array('model'=>$model));
	}

	public function actionUpdateEducation($id)
	{
		$model=$this->loadModelEducation($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicantEducation']))
		{
			$model->attributes=$_POST['hApplicantEducation'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formEducation',array('model'=>$model));
	}

	public function actionUpdateEducationNf($id)
	{
		$model=$this->loadModelEducationNf($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicantEducationNf']))
		{
			$model->attributes=$_POST['hApplicantEducationNf'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formEducationNf',array('model'=>$model));
	}

	public function actionUpdateExperience($id)
	{
		$model=$this->loadModelExperience($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicantExperience']))
		{
			$model->attributes=$_POST['hApplicantExperience'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formExperience',array('model'=>$model));
	}

	public function actionDeleteFamily($id)
	{
			$this->loadModelFamily($id)->delete();

			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/applicant'));
	}

	public function actionDeleteEducation($id)
	{
			$this->loadModelEducation($id)->delete();

			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/applicant'));
	}

	public function actionDeleteEducationNf($id)
	{
			$this->loadModelEducationNf($id)->delete();

			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/applicant'));
	}

	public function actionDeleteExperience($id)
	{
			$this->loadModelExperience($id)->delete();

			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/applicant'));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['hApplicant']))
		{
			$model->attributes=$_POST['hApplicant'];
			if($model->save())
				$this->redirect(array('/m1/hApplicant/view','id'=>$model->id));
		}

		$this->render('update',array(
				'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=hApplicant::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelFamily($id)
	{
		$model=hApplicantFamily::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelEducation($id)
	{
		$model=hApplicantEducation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelEducationNf($id)
	{
		$model=hApplicantEducationNf::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelExperience($id)
	{
		$model=hApplicantExperience::model()->findByPk($id);
		if($model===null)
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

}
