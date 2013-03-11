<?php
$this->breadcrumbs = array(
		$this->module->id,
);
?>

<div id='loading' style='display: none'>loading...</div>

<div id="EventCal"></div>
<?php $this->widget('CalWidget'); ?>
