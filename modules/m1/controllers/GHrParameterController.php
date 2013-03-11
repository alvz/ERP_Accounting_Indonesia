<?php

class GHrParameterController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'rights',
		);
	}

	public function actionIndex()
	{
		$modelParamLevel=$this->newParamLevel();
		$modelParamPermission=$this->newParamPermission();
		$modelParamTimeblock=$this->newParamTimeblock();
		
		$this->render('index',array(
			'modelParamLevel'=>$modelParamLevel,
			'modelParamPermission'=>$modelParamPermission,
			'modelParamTimeblock'=>$modelParamTimeblock,
		));
	}
	
	public function newParamLevel()
	{
		$model=new gParamLevel;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gParamLevel']))
		{
			$model->attributes=$_POST['gParamLevel'];
			$model->parent_id =0; 
			if($model->save())
				$this->refresh();
		}

		return $model;
	}

	public function actionUpdateParamLevelAjax()
	{
		$model->attributes = $_POST;
		$model=$this->loadModelParamLevel($_POST['pk']);
		$model->$_POST['name']=$_POST['value'] ;
		if($model->save()) {
			return true;
		} else
			return false;
		
	}
	
	public function actionDeleteParamLevel($id)
	{
		$this->loadModelParamLevel($id)->delete();
	}

	public function loadModelParamLevel($id)
	{
		$model=gParamLevel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function newParamPermission()
	{
		$model=new gParamPermission;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gParamPermission']))
		{
			$model->attributes=$_POST['gParamPermission'];
			$model->parent_id =0; 
			if($model->save())
				$this->refresh();
		}

		return $model;
	}

	public function actionUpdateParamPermissionAjax()
	{
		$model->attributes = $_POST;
		$model=$this->loadModelParamPermission($_POST['pk']);
		$model->$_POST['name']=$_POST['value'] ;
		if($model->save()) {
			return true;
		} else
			return false;
		
	}
	
	public function actionDeleteParamPermission($id)
	{
		$this->loadModelParamPermission($id)->delete();
	}

	public function loadModelParamPermission($id)
	{
		$model=gParamPermission::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function newParamTimeblock()
	{
		$model=new gParamTimeblock;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gParamTimeblock']))
		{
			$model->attributes=$_POST['gParamTimeblock'];
			if($model->save())
				$this->refresh();
		}

		return $model;
	}

	public function actionUpdateParamTimeblock($id)
	{
		$model=$this->loadModelParamTimeblock($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gParamTimeblock']))
		{
			$model->attributes=$_POST['gParamTimeblock'];
			echo print_r($_POST['gParamTimeblock']);
			
			if($model->save())
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formParamTimeblock',array('model'=>$model));
	}

	public function actionUpdateParamTimeblockAjax()
	{
		$model->attributes = $_POST;
		$model=$this->loadModelParamTimeblock($_POST['pk']);
		$model->$_POST['name']=$_POST['value'] ;
		if($model->save()) {
			return true;
		} else
			return false;
		
	}
	
	public function actionDeleteParamTimeblock($id)
	{
		$this->loadModelParamTimeblock($id)->delete();
	}

	public function loadModelParamTimeblock($id)
	{
		$model=gParamTimeblock::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
}
