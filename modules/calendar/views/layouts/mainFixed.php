<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="description" content="Description" />
<meta name="keywords" content="Keywords" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
	

<?php
//Yii::app()->sprite->registerSpriteCss();
?>


</head>
<style>
	body {
		padding-top: 50px; /* 60px to make the container go all the way to the bottom of the topbar */
	}

	@media (max-width: 980px) {
		body{
			padding-top: 0px;
		}
	}
</style>

<body>

	<div class="container">
		<div class="row">
			<?php $this->beginContent('/layouts/_bootNavBar'); $this->endContent(); ?>
		</div>

		<?php echo $content; ?>
		
		<?php $this->beginContent('/layouts/_footer'); $this->endContent(); ?>
	</div>
	
	<?php //Yii::app()->translate->renderMissingTranslationsEditor(); ?>

</body>
</html>


