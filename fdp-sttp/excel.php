<?php
if(isset($_POST["export"])) {	
	$filename = "data_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($query_run)) {
	  foreach($query_run as $row) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($row)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($row)) . "\n";
	  }
	}
	exit;  
} 
?>



