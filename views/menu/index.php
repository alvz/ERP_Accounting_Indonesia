	<ul class="nav nav-list">
		<li class="nav-header"><span class="h-icon-folder_database">Company Documents</span>
		</li>
	</ul>
	<?php
	// ElFinder widget
	$this->widget('ext.elFinder.ElFinderWidget', array(
			'connectorRoute' => 'sFileBrowser/connectorCompanyDocuments',
			)
	);

	?>
	
	<br/>

	<ul class="nav nav-list">
		<li class="nav-header"><span class="h-icon-email">Personal Mailbox</span>
		</li>
	</ul>
	<div class="well">
		<?php echo $this->renderPartial("_tabMailbox", array("dataProvider"=>$dataProviderInbox),true) ?>
	</div>
