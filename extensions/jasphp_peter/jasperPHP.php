<?php
class jasperPHP {
	public static function getInstance()
	{
		$classname=__CLASS__;
		return new $classname;
	}

	public function transform()
	{
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
}


?>

