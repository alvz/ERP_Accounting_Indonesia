<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    //'placement'=>'below', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
        array('label'=>'Employee In/Out', 'content'=>$this->renderPartial('_employeeIn',array(),true), 'active'=>true),
    ),
)); ?>

