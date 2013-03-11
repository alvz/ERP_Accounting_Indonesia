<h4>FILTER</h4>
<p>Reduce the result by input the field parameter. Tips: You can use %word_to_filter% in the value ...</p>
<?php $this->widget('ext.appendoBi.JAppendo',array(
		'id' => 'repeateEnum2',
		'model' => $model,
		'viewName' => '_filter',
		'labelDel' => 'Remove Row'
		//'cssFile' => 'css/jquery.appendo2.css'
)); ?>

