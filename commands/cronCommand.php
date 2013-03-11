<?php
class cronCommand extends CConsoleCommand
{
	public function actionIndex() {
		$connection=Yii::app()->db; 
		$sqlRaw="select * from g_person limit 10";
		$rawData=Yii::app()->db->createCommand($sqlRaw)->queryAll();
		$dataProvider=new CArrayDataProvider($rawData, array());
		
		foreach ($dataProvider->getData() as $data) {
			$sql="insert into z_ar_log 
			(description, action, model, idModel, userid) VALUES 
			('".$data['employee_name']."','INSERT','gLeave',1,1)";
			$command=$connection->createCommand($sql)->execute();
		}
		
	}
}

?>