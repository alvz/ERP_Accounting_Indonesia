<?php
class SFileBrowserController extends Controller
{
	public $layout='//layouts/mainAuth';

	public function filters()
	{
		return array(
				//'accessControl',
				'rights',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to access 'index' and 'view' actions.
						'actions'=>array('index','connectorPersonalDocuments','publicDocuments','connectorPublicDocuments','companyDocuments','connectorCompanyDocuments'),
						'users'=>array('*'),
				),
				array('allow',  // allow all users to access 'index' and 'view' actions.
						'actions'=>array('connectorCompanyDocumentsAdmin','companyDocumentsAdmin'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	public function actions()
	{
		return array(
				//Admin Share for All Authenticated User
				'connectorCompanyDocumentsAdmin' => array(
						'class' => 'ext.elFinder.ElFinderConnectorAction',
						'settings' => array(
								'root' => Yii::getPathOfAlias('webroot.sharedocs.companydocuments'),
								'URL' => Yii::app()->baseUrl . '/sharedocs/companydocuments/',
								'rootAlias' => 'Home',
								'mimeDetect' => 'none',
						)
				),
				//Admin Share for All Authenticated User
				'connectorCompanyDocuments' => array(
						'class' => 'ext.elFinder.ElFinderConnectorAction',
						'settings' => array(
								'root' => Yii::getPathOfAlias('webroot.sharedocs.companydocuments'),
								'URL' => Yii::app()->baseUrl . '/sharedocs/companydocuments/',
								'rootAlias' => 'Home',
								'mimeDetect' => 'none',
								//'uploadDeny'    => array(Yii::app()->user->name),
								'disabled'     => array('upload','mkdir','mkfile','mv', 'rm','cp'),      // list of not allowed commands
								'defaults'   => array('read' => true, 'write' => false),
									
						)
				),
				'connectorPublicDocuments' => array(
						'class' => 'ext.elFinder.ElFinderConnectorAction',
						'settings' => array(
								'root' => Yii::getPathOfAlias('webroot.sharedocs.publicdocuments'),
								'URL' => Yii::app()->baseUrl . '/sharedocs/publicdocuments/',
								'rootAlias' => 'Home',
								'mimeDetect' => 'none',
						)
				),
				'connectorPersonalDocuments' => array(
						'class' => 'ext.elFinder.ElFinderConnectorAction',
						'settings' => array(
								'root' => Yii::getPathOfAlias('webroot.sharedocs.personaldocuments').'/'.Yii::app()->user->name.'/',
								'URL' => Yii::app()->baseUrl . '/sharedocs/personaldocuments/'.Yii::app()->user->name. '/',
								'rootAlias' => 'Home',
								'mimeDetect' => 'none',
						)
				),
		);
	}

	public function actionCompanyDocumentsAdmin() {

		$this->render('companyDocumentsAdmin');
	}

	public function actionCompanyDocuments() {

		$this->render('companyDocuments');
	}

	public function actionPublicDocuments() {

		$this->render('publicDocuments');
	}

	public function actionIndex() {   //index to Personal Documents
		if (!is_dir(Yii::getPathOfAlias('webroot.sharedocs.personaldocuments') . '/'.Yii::app()->user->name))
			mkdir(Yii::getPathOfAlias('webroot.sharedocs.personaldocuments') . '/'.Yii::app()->user->name);
			
		$this->render('personalDocuments');
	}


}

/*
 //server file input
$this->widget('ext.elFinder.ServerFileInput', array(
		'model' => $model,
		'attribute' => 'serverFile',
		'connectorRoute' => 'admin/elfinder/connector',
)
);

// ElFinder widget
$this->widget('ext.elFinder.ElFinderWidget', array(
		'connectorRoute' => 'admin/elfinder/connector',
)
);

*/
?>