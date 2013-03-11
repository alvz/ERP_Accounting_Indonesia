<?php  
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/peter_custom.css');
?>

<?php
$this->breadcrumbs=array(
		$this->module->id,
);
?>

<div class="page-header">
	<h3>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/company.png') ?>
		<?php
			if (Yii::app()->user->name !="admin") {
				echo sUser::model()->GroupName; 
			} else
				echo "Corporate DashBoard"; 
			
		?>
	</h3>
</div>

<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'pills',
    //'placement'=>'below', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
        array('label'=>'Comparison', 'content'=>$this->renderPartial('_tabComparison',array(),true), 'active'=>true),
        array('label'=>'Progress', 'content'=>$this->renderPartial('_tabProgress',array(),true)),
    ),
)); ?>


<h3>Employee Birthday</h3>
<?
$this->widget('ext.EFullCalendar.EFullCalendar', array(
    // polish version available, uncomment to use it
    // 'lang'=>'pl',
    // you can create your own translation by copying locale/pl.php
    // and customizing it
 
    // remove to use without theme
    // this is relative path to:
    // themes/<path>
    'themeCssFile'=>'2jui-bootstrap/jquery-ui.css',
 
    // raw html tags
    'htmlOptions'=>array(
        // you can scale it down as well, try 80%
        'style'=>'width:100%'
    ),
    // FullCalendar's options.
    // Documentation available at
    // http://arshaw.com/fullcalendar/docs/
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next',
            'center'=>'title',
            'right'=>'today'
        ),
        //'lazyFetching'=>true,
        'events'=>Yii::app()->createUrl('/m1/default/calendarEvents'), // action URL for dynamic events, or
        //'events'=>array() // pass array of events directly
 
        // event handling
        // mouseover for example
        //'eventMouseover'=>new CJavaScriptExpression("js:function(event, element) {
		//			element.qtip({
		//				content: event.title
		//			}); 
		//	 } "),
    )
));

?>