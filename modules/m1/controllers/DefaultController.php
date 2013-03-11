<?php

class DefaultController extends Controller
{
	//public $layout='//layouts/column2';
	public $layout='//layouts/main2';

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
		$this->render('index');
	}
	
	public function actionIndex2()
	{
		$this->render('index2');
	}

	public function actionCalendarEvents()
	{
		$criteria = new CDbCriteria;
		$criteria->condition="date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))  
		BETWEEN date(CONCAT(year(curdate()),'-',month(curdate()),'-01')) AND DATE_ADD(date(CONCAT(year(curdate()),'-',month(curdate()),'-01')),INTERVAL 1 MONTH)-1";
		$criteria->order="date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))";
		
		//if (Yii::app()->user->name != "admin") {
			$criteria1 = new CDbCriteria;
			$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (1,2,3,4,5,6,15) ORDER BY c.start_date DESC LIMIT 1) = '.sUser::model()->getGroup() ;
			$criteria->mergeWith($criteria1);
			
			$criteria3 = new CDbCriteria;  //8=RESIGN, 9=TERMINATION, 10=End Of Contract
			$criteria3->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY).')';
			$criteria->mergeWith($criteria3);
			
		//}
		
		$models=gPerson::model()->findAll($criteria);
		
		$items=array();
		$detail=array();
		foreach ($models as $model) {
			$detail['title']=$model->employee_name;
			$detail['start']= strtotime(date('Y').'-'.date('m',strtotime($model->birth_date)).'-'.date('d',strtotime($model->birth_date)));
			$detail['color']='#CC0000';
			$detail['allDay']=true;
			$detail['url']=Yii::app()->createUrl('/m1/gPerson/view',array("id"=>$model->id));
			$items[]=$detail;
		}
	
/*	
		$items[]=array(
			'title'=>'Meeting',
			'start'=>'2013-01-23',
			'color'=>'#CC0000',
			'allDay'=>true,
			'url'=>'http://anyurl.com'
		);
		$items[]=array(
			'title'=>'Meeting reminder',
			'start'=>'2013-01-19',
			'end'=>'2012-11-22',
 
        // can pass unix timestamp too
        // 'start'=>time()
 
        'color'=>'blue',
		
		);
 */
    echo CJSON::encode($items);
    Yii::app()->end();
}	
	
	public function actionReport4() {
		Yii::import('ext.jasphp_peter.libs.*');
		Yii::import('ext.jasphp_peter.libs.tcpdf.*');

		$xml =  simplexml_load_file(Yii::app()->getModule('m1')->basePath . '/reports/'.'report4.jrxml');

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		//$PHPJasperXML->arrayParameter=array("parameter1"=>1);
		$PHPJasperXML->xml_dismantle($xml);

		$_username=Yii::app()->db->username;
		$_password=Yii::app()->db->password;
		
		$PHPJasperXML->transferDBtoArray('localhost',$_username,$_password,'erp_apl');
		$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		
	}

	public function actionReport3() {
//		Yii::app()->jasPHP->create(Yii::app()->getModule('m1')->basePath . '/reports/', 'report4.jrxml',array(),array());
		
/**/
		Yii::import('ext.jasphp_peter.libs.*');
		Yii::import('ext.jasphp_peter.libs.tcpdf.*');

		$xml =  simplexml_load_file(Yii::app()->getModule('m1')->basePath . '/reports/'.'report3.jrxml');

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		//$PHPJasperXML->arrayParameter=array("parameter1"=>1);
		$PHPJasperXML->xml_dismantle($xml);

		$_username=Yii::app()->db->username;
		$_password=Yii::app()->db->password;
		
		$PHPJasperXML->transferDBtoArray('localhost',$_username,$_password,'erp_apl');
		$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

/**/
//		Yii::import('ext.jasphp_peter.jasperPHP');

//		$report= new jasperPHP;
//		$report->transform();
		
		
	}
	
}