<?php /*
<?php
$sheet_array = Yii::app()->yexcel->readActiveSheet($file_path);
 
echo "<table>";
 
foreach( $sheet_array as $row ) {
    echo "<tr>";
    foreach( $row as $column )
        echo "<td>$column</td>";
    echo "</tr>";
}
 
echo "</table>";
 
//or
 
//echo first cell of excel file
echo $sheet_array[1]['A'];

?>
*/ ?>


<?php

Yii::import('ext.phpexcelreader.JPhpExcelReader');
$reader=new JPhpExcelReader(Yii::app()->basePath.'/extensions/phpexcelreader/example2.xls');
//echo $data->dump(true,true);

 foreach($reader->sheets as $k=>$data)
 {
    //echo "\n\n ".$reader->boundsheets[$k]."\n\n";

    foreach($data['cells'] as $row)
    {
        foreach($row as $cell)
        {
			$model=gParamTimeblock::model()->findByPk($cell);
			if ($model == null) {
				echo "$cell\t";
			} else
				echo $model->code;
        }
		echo "<br/>";
    }
 }
?>