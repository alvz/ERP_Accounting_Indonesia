<?php /*
<div class="page-header">
	<h1>
		<?php echo Yii::app()->name; ?>
	</h1>
</div>

<div class="alert alert-info">
	<h4 class="alert-heading">Welcome!!</h4>
	<?php //echo Yii::t('flogin',"Welcome to ").Yii::app()->name.Yii::t('flogin'," - HR and ACCOUNTING Application.</b>. This is a brand new ERP Accounting that exclusively designed for this company.... Relax, and enjoying the application") ?>
	<?php echo "Welcome to company portal. This is a brand new ERP and Portal Web Application that provided a lot features to make your office jobs easier..." ?>
</div>
*/ ?>

<div class="row">
	<div class="span8">
		<?php /*
		<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
			'heading'=>'Welcome!!',
		)); ?>
		 
			<p>Welcome to Company Portal. Please make note, this in an internal application. so, don't forget to logout after you finish your job on this portal application. Thank You...</p>
			<p><?php //$this->widget('bootstrap.widgets.TbButton', array(
				//'type'=>'primary',
				//'size'=>'large',
				//'label'=>'Learn more',
			//)); ?></p>
		 
		<?php $this->endWidget(); ?>
		*/ ?>
		<?php
			echo CHtml::image(Yii::app()->baseUrl."/shareimages/company/FA logo APG 2_depan.jpg")
		?>
	</div>
	<div class="span4">
		<?php $this->renderPartial("_tabLogin", array("model"=>$model)) ?>
	</div>
</div>
<?php

$dir = Yii::app()->basePath."/../shareimages/photo";
$_content= array();

if ($handle = opendir($dir)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            if (!is_dir($dir."/".$entry) === true){
				$filename = explode(".", $entry);
				if ($filename[1] === "jpg" || $filename[1] === "JPG" || $filename[1] === "jpeg" || $filename[1] === "JPEG"){
					$_content[$filename[0]]= array(
						'id'=> $filename[0],
						'caption' => 'Image: '.$filename[0],
						'content' => CHtml::link(CHtml::image(Yii::app()->baseUrl."/shareimages/photo/".$entry),
							Yii::app()->createUrl('/sGallery/list',array('dir'=>$filename[0]))),
					);
				}
            }
        }
    }
    closedir($handle);
}
?>


<div class="row" style="min-height:465px">
	<div class="span5">
		<?php $this->renderPartial("_photoSlider", array('content'=>$_content)) ?>
	</div>
	<div class="span7">
		<?php $this->renderPartial("_companyNews", array('dataProvider'=>$dataProvider)) ?>
	</div>
</div>


<?php /*
<p>
	<?php
		//$this->widget('ext.LanguagePicker.ELanguagePicker', array(
		//	'title'=>null
		//));
	?>
</p>
*/ ?>

<?php /*
?>
	<div class="row-fluid">
		<div class="span12">
			<?php $this->widget('bootstrap.widgets.TbTabs', array(
				'type'=>'tabs', // 'tabs' or 'pills'
				'tabs'=>array(
					array('label'=>'Public Documents', 'content'=>$this->renderPartial("_tabPublic",array(),true),'active'=>true),
					//array('label'=>'Features', 'id'=>'features', 'content'=>$this->renderPartial("_tabFeatures",array("model"=>$model),true)),
					//array('label'=>'Birthday', 'content'=>$this->renderPartial("_tabBirthday",array(),true)),
				),
				'htmlOptions'=>array(
					'style'=>'min-height:300px',
				),
			));
			?>

		</div>
	</div>

	<hr/>
<?php

*/?>

<?php /*	
<div class="row">
	<div class="span12">

		<?php 
			//$_slide="slide".Yii::app()->dateFormatter->format("d",time()).".jpg";
			//echo CHtml::image(Yii::app()->request->baseUrl.'/images/photo/'.$_slide,'image',array('style'=>'width: 100%')); 
			if (isset($xml->photos->photo)) {
				echo "<h4>";
				echo "Powered by: <a href=\"http://www.flikr.com\" target=\"_blank\">Flickr</a>";
				echo "</h4>";
				echo "</br>";
				foreach ($xml->photos->photo as $photo) {
					$title = $photo['title'];
					$farmid = $photo['farm'];
					$serverid = $photo['server'];
					$id = $photo['id'];
					$secret = $photo['secret'];
					$owner = $photo['owner'];
					$thumb_url = "http://farm{$farmid}.static.flickr.com/{$serverid}/{$id}_{$secret}_t.jpg";
					//$image = "http://farm{$farmid}.static.flickr.com/{$serverid}/{$id}_{$secret}.jpg";
					$page_url = "http://www.flickr.com/photos/{$owner}/{$id}";
					$image_html= "<a href='{$page_url}' target='_blank'><img alt='{$title}' src='{$thumb_url}' height='160px' width='100%' /></a>";
					print "<div class='span1'>$image_html</div>";
				}
			}
		?>
</div>
</div>
*/ ?>


<?php //Yii::app()->cache->flush() ?>