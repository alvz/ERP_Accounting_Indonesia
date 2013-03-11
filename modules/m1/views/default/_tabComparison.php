<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    //'placement'=>'below', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
        array('label'=>'Age', 'content'=>$this->renderPartial('_age',array(),true), 'active'=>true),
        array('label'=>'Gender', 'content'=>$this->renderPartial('_sex',array(),true)),
        array('label'=>'Level', 'content'=>$this->renderPartial('_level',array(),true)),
        array('label'=>'Service year', 'content'=>$this->renderPartial('_workingYear',array(),true)),
        array('label'=>'Education', 'content'=>$this->renderPartial('_education',array(),true)),
        array('label'=>'Religion', 'content'=>$this->renderPartial('_religion',array(),true)),
        array('label'=>'Department', 'content'=>$this->renderPartial('_department',array(),true)),
        array('label'=>'Status', 'content'=>$this->renderPartial('_status',array(),true)),
    ),
)); ?>

