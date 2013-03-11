<br/>

<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-pills nav-stacked">
		<li class="active"><a href="#mtab1" data-toggle="tab">Probation</a></li>
		<li><a href="#mtab2" data-toggle="tab">Contract</a></li>
<!-- 	<li><a href="#mtab3" data-toggle="tab">Birthday</a></li> -->
		<li><a href="#mtab4" data-toggle="tab">Employee Out</a></li>
		<li><a href="#mtab5" data-toggle="tab">Employee In</a></li>
		<li><a href="#mtab6" data-toggle="tab">Black List</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="mtab1">
			<?php //if($this->beginCache('rProbation', array('duration'=>3600))) { ?>
				<p> <?php $this->widget('probation'); ?> </p>
			<?php //$this->endCache(); } ?>
		</div>
		<div class="tab-pane" id="mtab2">
			<?php //if($this->beginCache('rContract', array('duration'=>3600))) { ?>
				<p> <?php $this->widget('contract'); ?> </p>
			<?php //$this->endCache(); } ?>
		</div>
<?php /*		
		<div class="tab-pane" id="mtab3">
			<?php //if($this->beginCache('rBirthday', array('duration'=>3600))) { ?>
				<p> <?php $this->widget('birthday'); ?> </p>
			<?php //$this->endCache(); } ?>
		</div>
*/ ?>
		<div class="tab-pane" id="mtab4">
			<?php //if($this->beginCache('rEmployeeOut', array('duration'=>3600))) { ?>
				<p> <?php $this->widget('employeeOut'); ?> </p>
			<?php //$this->endCache(); } ?>
		</div>
		<div class="tab-pane" id="mtab5">
			<?php //if($this->beginCache('rEmployeeIn', array('duration'=>3600))) { ?>
				<p> <?php $this->widget('employeeIn'); ?> </p>
			<?php //$this->endCache(); } ?>
		</div>
		<div class="tab-pane" id="mtab6">
			<?php //if($this->beginCache('rEmployeeIn', array('duration'=>3600))) { ?>
				<p> <?php $this->widget('blacklist'); ?> </p>
			<?php //$this->endCache(); } ?>
		</div>
	</div>
</div>

