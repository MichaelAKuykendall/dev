<?php
//Get all csv's in current folder
$files = array();
foreach (glob("*.csv") as $ifile) {
    $files[] = $ifile;
}

$array = array();

//Get array from each csv
foreach($files as $file) {
	ini_set('auto_detect_line_endings',TRUE);
	$handle = fopen($file,'r');
	while (($data = fgetcsv($handle)) !== FALSE) {
	    //Remove csv header
	    //array_shift($data);

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$array[] = $data[0];
	}
	ini_set('auto_detect_line_endings',FALSE);
	fclose($handle);

    //Remove csv header
    unset($array[0]);

	$array =  array_unique($array);

	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

?>
