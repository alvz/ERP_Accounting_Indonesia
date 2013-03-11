<table width="100%">
<?php 
	$counter=0;
	foreach ($notifiche as $notifica) : ?>
	<?php if($counter <=10) : ?>
	<tr>
		<td>
			<span class="h-icon-bullet_go" style="float:left">
			<?php
				echo CHtml::link($notifica->content,Yii::app()->createUrl('/sNotification/read', array('id' => $notifica->id))) 
			?>
			<div style="color:grey;font-size:11px; margin-left:24px;float:right;">
				<?php //echo $notifica->content; ?> 
				<?php echo '('.waktu::nicetime($notifica->expire) .')'; ?> 
			</div>
		</td>
	</tr>
	<?php 
	$counter++;
	endif; ?>
<?php endforeach; ?>
</table>

<?php /*
<div class="pull-right">

<?php //if ((int)sNotificationMessage::model()->unreadCount >=10)
	//	$count=sNotificationMessage::model()->unreadCount - 10;
	//	echo CHtml::link("More (".$count. ")",Yii::app()->createUrl('/sNotification'),array());
?>
</div>
*/ ?>