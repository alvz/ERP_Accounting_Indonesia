<?php

class SAdminController extends Controller
{
	public $layout='//layouts/column1';

	public function actions()
	{
		return array(
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

	public function actionResize() {
		Yii::import('ext.iwi.Iwi');
		$picture = new Iwi(Yii::app()->basePath . "/../images/nophoto.jpg");
		$picture->resize(100,100, Iwi::AUTO);
		$picture->save(Yii::app()->basePath . "/../images/non.jpg", TRUE);
		//echo $picture->cache();
	}
	
	public function actionTest()
	{
		$bh = Yii::createComponent(array(
                'class'=>'ext.phpexcel.EExcelBehavior',
            ));
        $this->attachBehavior('excelExport',$bh);
			// Load data
		$model = sUser::model()->findAll();
	 
		// Export it
		//$this->toExcel($model);
		$this->toExcel($model,
			array(
				'id',
				'username',
				'password', // Note the custom header
			),
			'Test File',
			array(
				'creator' => 'Peter',
			),
			'Excel2007' // This is the default value, so you can omit it. You can export to CSV, PDF or HTML too
		);
	}

        public function actionExcelPetra(){
                //Pertama-tama download phpexcel terus ditaruh di /protected/extension/

                //Load data ke dalam array sebelum dimasukkan ke file Excel
                //ActiveRecord dan kelas-kelas bawaan Yii kemungkinan tidak akan jalan setelah kita nyalakan PHPExcel

                $users = sUser::model()->findAll();

                $arrayUsers = array();
                foreach($users as $user){
                        $arrayUsers[] = array(
                                'nama' => $user->username,
                                'email' => $user->password,
                        );
                }

                //Matikan autoloader bawaannya Yii
                $phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes');
                spl_autoload_unregister(array('YiiBase', 'autoload'));
                //Include PHPExcel
                include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
                //Setelah ini kelas-kelas bawaan Yii kemungkinan besar tidak akan jalan

                //Buat object PHPExcel Baru
                $objPHPExcel = new PHPExcel();
                $objPHPExcel->getProperties()->setCreator("Petra Barus");
                $objPHPExcel->getProperties()->setLastModifiedBy("Petra Barus");
                $objPHPExcel->getProperties()->setTitle("Dokumen Saya");
                $objPHPExcel->getProperties()->setSubject("Dokumen Saya");
                $objPHPExcel->getProperties()->setDescription("Dokumen Saya");

                //Selecting sheets
                $objPHPExcel->setActiveSheetIndex(0);

                //Mengisi Excel
                foreach($arrayUsers as $k => $u){
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $k, $u['nama']);
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $k, $u['email']);
                }

                //HTTP Header untuk download
                header('Content-type: application/ms-excel');
                header('Content-Disposition:  inline; attachment; filename=dokumen.xls');
                flush();

                //Dumping data to HTTP
                $writer = new PHPExcel_Writer($objPHPExcel);
                $writer->save('php://output');

		exit();

        }

	public function actionCustomExcel() {
	
		spl_autoload_unregister(array('YiiBase','autoload'));
		 Yii::import('ext.PHPExcel.Classes.PHPExcel', true);
		 spl_autoload_register(array('YiiBase','autoload')); 

 		
		$phpExcel = new PHPExcel();
		 
		$styleArray = array(
			'font' => array(
				'bold' => true,
			)
		);
		 
		//Get the active sheet and assign to a variable
		$foo = $phpExcel->getActiveSheet();
		 
		//add column headers, set the title and make the text bold
		$foo->setCellValue("A1", "Foo1")
			->setCellValue("B1", "Foo2")
			->setCellValue("C1", "Foo3")
			->setCellValue("D1", "Foo3")
			->setTitle("Foo")
			->getStyle("A1:D1")->applyFromArray($styleArray);
		 
		//Create a new sheet
		$bar = $phpExcel->createSheet();
		$bar->setCellValue("A1", "Bar1")
			->setCellValue("B1", "Bar2")
			->setCellValue("C1", "Bar3")
			->setCellValue("D1", "Bar3")
			->setTitle("Bar")
			->getStyle("A1:D1")->applyFromArray($styleArray);
		 
		//When in loops you always need to use a counter to ensure data goes into the next row.
		for ($rowCounter = 2; $rowCounter < 20; $rowCounter++) {
		 
			$foo->setCellValue("A$rowCounter", "Row" . ($rowCounter - 2))
				->setCellValue("B$rowCounter", $rowCounter * 2)
				->setCellValue("C$rowCounter", $rowCounter / 2)
				->setCellValue("D$rowCounter", "=B$rowCounter+C$rowCounter");
		 
			$bar->setCellValue("A$rowCounter", "Row" . ($rowCounter - 2))
				->setCellValue("B$rowCounter", ($rowCounter % 2) ? "Type 1" : "Type2")
				->setCellValue("C$rowCounter", str_repeat("foo ", rand(5, 10)))
				->setCellValue("D$rowCounter", str_repeat("% ", rand(20, 50)));
		}
		 
		//Merge the first two columns of the next row and sum columns C & D.
		$foo->mergeCells("A$rowCounter:B$rowCounter");
		$foo->setCellValue("A$rowCounter", "Total")
			->setCellValue("C$rowCounter", "=SUM(C2:C" . ($rowCounter -1) . ")")
			->setCellValue("D$rowCounter", "=SUM(D2:D" . ($rowCounter -1) . ")");
		 
		//Set the text alignment to right for the total cell.
		$foo->getStyle("A$rowCounter")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		 
		//Set the column widths
		$foo->getColumnDimension("A")->setWidth(40);
		$foo->getColumnDimension("B")->setWidth(20);
		$foo->getColumnDimension("C")->setWidth(20);
		$foo->getColumnDimension("D")->setWidth(20);
		 
		$bar->getColumnDimension("A")->setAutoSize(true);
		$bar->getColumnDimension("B")->setAutoSize(true);
		$bar->getColumnDimension("C")->setAutoSize(true);
		$bar->getColumnDimension("D")->setWidth(40);
		 
		//Wrap long fields
		$bar->getStyle("D1:D20")->getAlignment()->setWrapText(true);
		 
		//Set the active sheet to the first sheet before outputting. This is only needed if you want to ensure the file is opened on the first sheet.
		$phpExcel->setActiveSheetIndex(0);
		 
		//Output the generated excel file so that the user can save or open the file.
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"example-excel-file.xls\"");
		header("Cache-Control: max-age=0");
		 
		$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
		$objWriter->save("php://output");
		exit;
			
	}
	
	
	public function actionExcel()
	{

		$model=new sUser('search');
		$model->unsetAttributes();
		if(isset($_GET['sUser']))
			$model->attributes=$_GET['sUser'];

		if (isset($_GET['export'])) {
			$production = 'export';
		} else {
			$production = 'grid';
		}

		$this->render('excel',array(
				'model'=>$model,
				'production'=>$production,
		));
	}

	public function actionReadExcel() {
		$this->render('readExcel',array(
		));
		
	}
	public function actionSqlStatement()
	{
		$model=new fSqlStatement;

		if(isset($_POST['fSqlStatement']))
		{
			$model->attributes=$_POST['fSqlStatement'];
			if($model->validate())
			{
				$commandD=Yii::app()->db->createCommand($model->sql);
				$commandD->execute();

				Yii::app()->user->setFlash('success','SQL statement has been executed');
				$this->refresh();
			}
		}
		$this->render('sqlstatement',array('model'=>$model));
	}

	public function actionBackup()
	{

		Yii::import('SDatabaseDumper');
		$dumper = new SDatabaseDumper;
			
		// Get path to new backup file
		$file = Yii::getPathOfAlias('webroot.protected.backups').'/dump.'.Yii::app()->dateFormatter->format("yyyyMMdd",time()).'.sql';
			
		// Gzip dump
		if(function_exists('gzencode'))
			file_put_contents($file.'.gz', gzencode($dumper->getDump()));
		else
			file_put_contents($file, $dumper->getDump());
			
		Yii::app()->user->setFlash('success','<strong>Great!</strong> backup process finished..');
		$this->redirect(array('/menu'));

	}

	/////BLOCK TESTING


	public function actionSendEmail($id)
	{
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		$mailer->IsSMTP();
		$mailer->IsHTML(true);
		$mailer->SMTPAuth = true;
		/*
		 $mailer->SMTPSecure = "ssl";
		$mailer->Host = "smtp.gmail.com";
		$mailer->Port = 465;
		$mailer->Username = "thony@folindonesia2013.com";
		$mailer->Password = 'thony2013';
		$mailer->From = "thony@folindonesia2013.com";
		*/
		/**/
		$mailer->Host = "smtp.mail.yahoo.co.id";
		$mailer->Port = 25;
		$mailer->Username = "festivaloflive2013";
		$mailer->Password = 'jmmindonesia';
		$mailer->From = "festivaloflive2013@yahoo.co.id";
		/**/
		$mailer->CharSet = 'UTF-8';
		$mailer->addAttachment(Yii::app()->basePath."/reports/BuktiTerima.php");
		//$mailer->addAttachment(Yii::app()->basePath."/reports/bukti_".$id.".pdf");
		$mailer->FromName = "Festival of Live 2013";
		$mailer->AddAddress("thonyronaldo.fol2013@gmail.com","peterjkambey@gmail.com");
		$mailer->Subject = "FOL Bukti Registrasi";
		$mailer->Body = "FOL Bukti Registrasi";
		$mailer->Send();

		$this->redirect(array('/peserta'));
	}


	public function actionCall1()
	{

		try {
			$api = new PhpSIP('202.153.128.34'); // IP we will bind to
			$api->setMethod('MESSAGE');
			$api->setFrom('sip:peterjkambey@voiprakyat.or.id');
			$api->setUri('sip:sicc1@voiprakyat.or.id');
			$api->setBody('Hi, ....');
			$res = $api->send();
			echo "res1: $res\n";

		} catch (Exception $e) {

			echo $e->getMessage()."\n";
		}

	}

	public function actionCall2()
	{
		try
		{
			$api = new PhpSIP(); // IP we will bind to
			$api->setUsername('118338'); // authentication username
			$api->setPassword('55XI8N'); // authentication password
			$api->setProxy('202.153.128.34');
			$api->addHeader('Event: resync');
			$api->setMethod('NOTIFY');
			$api->setFrom('sip:118338@voiprakyat.or.id');
			$api->setUri('sip:118339@voiprakyat.or.id');
			$res = $api->send();
			echo "res1: $res\n";

		} catch (Exception $e) {

			echo $e->getMessage()."\n";
		}
	}

	public function actionChatFB()
	{

		$obj = new FacebookChat("peterjkambey@yahoo.co.id", ".....");
		$obj->login();
		print_r($obj->buddylist());
		$obj->sendmsg("Hey jhonny, how are u?", "my_friend_id");
	}

	public function actionGraph1() {
		/*$bars = array(41,52,53,12,85,61,53,8,79,10,92,36);
		 $graph = new Chart();
		$graph->addBars($bars, 'ff0000');
		$graph->output();
		$graph->output('filename.png');*/

		$bars = array(5,5,5,1,8,6,5,8,7,1,2,3);
		$dates = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$graph = new Chart();
		$graph->addBars($bars, 'ff0000');
		$graph->addXLabels($dates, '000000');
		$graph->addYScale('000000');
		$graph->output();
	}

	public function actionGraph2() {
		/* Create and populate the pData object */
		$MyData = new pData();
		$MyData->addPoints(array(13251,4118,3087,1460,1248,156,26,9,8),"Hits");
		$MyData->setAxisName(0,"Hits");
		$MyData->addPoints(array("Firefox","Chrome","Internet Explorer","Opera","Safari","Mozilla","SeaMonkey","Camino","Lunascape"),"Browsers");
		$MyData->setSerieDescription("Browsers","Browsers");
		$MyData->setAbscissa("Browsers");

		/* Create the pChart object */
		$myPicture = new pImage(500,500,$MyData);
		$myPicture->drawGradientArea(0,0,500,500,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
		$myPicture->drawGradientArea(0,0,500,500,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
		$myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));

		/* Draw the chart scale */
		$myPicture->setGraphArea(100,30,480,480);
		$myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Pos"=>SCALE_POS_TOPBOTTOM)); //

		/* Turn on shadow computing */
		$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

		/* Draw the chart */
		$myPicture->drawBarChart(array("DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"Rounded"=>TRUE,"Surrounding"=>30));

		/* Write the legend */
		$myPicture->drawLegend(570,215,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

		/* Render the picture (choose the best way) */
		$myPicture->autoOutput("pictures/example.drawBarChart.vertical.png");

	}

	public function actionImage()
	{
		$model=new FImage;
		if(isset($_POST['FImage']))
		{
			$model->attributes=$_POST['FImage'];
			$model->image=CUploadedFile::getInstance($model,'image');
			//if($model->save())
			//{
			$model->image->saveAs('c:/wamp/www/myfile.jpg');

			$this->redirect(array('menu/'));
			//}
		}
		$this->render('image', array('model'=>$model));
	}

	public function actionBarcode()
	{
		$this->render('barcode');
	}

	public function actionHelp()   //OK BANGET tapi sayangnya masih Port 25
	{
		$model=new fEmail('help');

		if(isset($_POST['fEmail']))
		{
			$model->attributes=$_POST['fEmail'];
			if($model->validate())
			{

				EmailComponent::sendEmail('peterjkambey@gmail.com',$model->subject,$model->body,'ssl');

				Yii::app()->user->setFlash('success','<strong>Great!</strong> Your Message has been sent...');
				$this->redirect(array('/menu'));
			}
		}
		$this->render('help',array('model'=>$model));
	}

	public function actionTableFpdf()
	{
		$pdf=new mc_table();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',14);
		//Table with 20 rows and 4 columns
		$pdf->SetWidths(array(30,50,30,40));
		srand(microtime()*1000000);
		for($i=0;$i<20;$i++)
			$pdf->Row(array($this->GenerateSentence(),$this->GenerateSentence(),$this->GenerateSentence(),$this->GenerateSentence()));
		$pdf->Output();

	}

	private function GenerateWord()
	{
		//Get a random word
		$nb=rand(3,10);
		$w='';
		for($i=1;$i<=$nb;$i++)
			$w.=chr(rand(ord('a'),ord('z')));
		return $w;
	}

	private function GenerateSentence()
	{
		//Get a random sentence
		$nb=rand(1,10);
		$s='';
		for($i=1;$i<=$nb;$i++)
			$s.=$this->GenerateWord().' ';
		return substr($s,0,-1);
	}

	public function actionCode39()
	{
		$pdf=new PDF_Code39();
		$pdf->AddPage();
		$pdf->Code39(80,40,'PETERKAMBEY',1,10);
		$pdf->Output();
	}

	public function actionContact()
	{
		//$model=new ContactForm;
		//if(isset($_POST['ContactForm']))
		//{
		//	$model->attributes=$_POST['ContactForm'];
		//	if($model->validate())
		//	{
				$headers="From: Peter J. Kambey\r\nReply-To: peterjkambey@gmail.com";
				mail(Yii::app()->params['adminEmail'],'Testing Subject','Testing Body',$headers);
				Yii::app()->user->setFlash('success','<strong>Great!</strong> Your Message has been sent...');
				$this->redirect(array('/menu'));
		//	}
		//}
		//$this->render('contact',array('model'=>$model));
	}	
}
