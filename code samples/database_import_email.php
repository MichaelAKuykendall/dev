<?php
/**
 * Created by: Mike Kuykendall
 * Date: 10/30/15
 * Time: 11:01 AM
 * Name: Database import script to notify of new store, deletions, updates
 */


/* new connection */
function ConnectDB() {
    $mysqli = new mysqli("localhost","holycrap","password","table_name");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    return $mysqli;
}

$mysqli = ConnectDB();

$files = array();
foreach (glob("*.csv") as $ifile) {
    $files[] = $ifile;
}

if(empty($files)) {
    echo "No files uploaded";
    die;

}

//Holds all matching store IDs
$id_store_types = "";

foreach ($files as $file)  {
    //Print filename
    echo "<strong>";
    print_r($file);
    echo "</strong><br />";

    $created = "";
    $updated = "";


    $array = array_map('str_getcsv', file($file));


    //How many files?
    $count = count($array);
    echo "Number rows in csv+header: ".$count."<br /><br />";

    //Remove csv header
    unset($array[0]);

    //Load up CSV store ids for queries
    for ($i = 0; $i < $count; $i++) {

        if ($id_store_types) {
            $id_store_types .= ", ";
        }

        if($array[$i][0] != "" && $array[$i][2] != "") {
            $a = "'".$array[$i][0]."-".$array[$i][2]."'";
        }

        $id_store_types .= $a;

        if (isset($array[$i])) {
            $raw = explode("|", trim($array[$i][14]));
            $hours = $raw[0];
            $hours = nl2br($hours);
            $maintains_inventory = $raw[1];
            $store_manager = $raw[2];
            $is_ropis_enabled = $raw[3];
            $is_ship_from_store_enabled = $raw[4];
            $is_ship_to_store_enabled = $raw[5];

            $sqlcreate = "SELECT * FROM stores WHERE stloc_id = ".$array[$i][0]." AND store_type = '".$array[$i][2]."'";

            $result = $mysqli->query($sqlcreate);


            /********************************CREATE RECORD********************************/
            if($result->num_rows === 0) {
                $location_id = $array[$i][0]."-".$array[$i][2];
                $identifier = $array[$i][1];
                $store_type = trim($array[$i][2]);

                $phone = trim($array[$i][3]);
                $address1 = trim($array[$i][4]);
                $city = trim($array[$i][6]);
                $state = trim($array[$i][7]);
                $country = trim($array[$i][8]);
                $zipcode = trim($array[$i][9]);
                $latitude = trim($array[$i][10]);
                $longitude = trim($array[$i][11]);
                $open_date = trim($array[$i][12]);

                $open_date = date_parse($open_date);
                $open_date = $open_date['year']."-".$open_date['month']."-".$open_date['day'];

                $sql_insert = 'insert into stores (id_store_type, stloc_id, identifier, store_type, phone, address1, city, state, country, zipcode, latitude,
                                longitude, open_date, hours, maintains_inventory, store_manager, is_ropis_enabled, is_ship_from_store_enabled, is_ship_to_store_enabled)
                                values ("'.$location_id.'", "'.$array[$i][0].'", "'.$identifier.'", "'.$store_type.'", "'.$phone.'", "'.$address1.'", "'.$city.'", "'.$state.'", "'.$country.'",
                                "'.$zipcode.'", "'.$latitude.'", "'.$longitude.'", "'.$open_date.'", "'.$hours.'", "'.$maintains_inventory.'", "'.$store_manager.'",
                                "'.$is_ropis_enabled.'", "'.$is_ship_from_store_enabled.'", "'.$is_ship_to_store_enabled.'")';

                echo $sql_insert."<br /><br />";

                if ($mysqli->query($sql_insert) === TRUE) {

                    $created .= "<strong>CREATED</strong> Store <strong>{$identifier}</strong> at {$address1}, {$city} {$state} {$zipcode}<br/>\n";
                }
            }

            /********************************UPDATE********************************/
            if($result->num_rows > 0) {

                while ($obj = $result->fetch_object()) {
                    $identifier = $obj->identifier;
                    $store_type = $obj->store_type;
                    $phone = $obj->phone;
                    $address1 = $obj->address1;
                    $city = $obj->city;
                    $state = $obj->state;
                    $country = $obj->country;
                    $zipcode = $obj->zipcode;
                    $latitude = $obj->latitude;
                    $longitude = $obj->longitude;

                    $open_date = trim($obj->open_date);
                    $open_date = date_parse($open_date);
                    $open_date = $open_date['year']."-".$open_date['month']."-".$open_date['day'];

                    //If empty, set to 0000-00-00 for easy comparison
                    if($array[$i][12] === "") {$array[$i][12] = "0000-00-00";}

                    $new_open_date = trim($array[$i][12]);
                    $new_open_date = date_parse($new_open_date);
                    $new_open_date = $new_open_date['year']."-".$new_open_date['month']."-".$new_open_date['day'];

                    $old_hours = $obj->hours;
                    $old_maintains_inventory = $obj->maintains_inventory;
                    $old_store_manager = $obj->store_manager;
                    $old_is_ropis_enabled = $obj->is_ropis_enabled;
                    $old_is_ship_from_store_enabled = $obj->is_ship_from_store_enabled;
                    $old_is_ship_to_store_enabled = $obj->is_ship_to_store_enabled;


                    //********************UPDATE PHONE********************//

                    if($phone != $array[$i][3]) {
                        $sqlupdate = 'UPDATE stores SET phone = "'.$array[$i][3].'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> phone from {$phone} to ".$array[$i][3]." <br/>";}
                    }

                    //********************UPDATE ADDRESS1********************//
                    if($address1!= $array[$i][4]) {
                        $sqlupdate = 'UPDATE stores SET address1 = "'.$array[$i][4].'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> address1 from {$address1} to ".$array[$i][4]." <br/>";}
                    }

                    //********************UPDATE CITY********************//
                    if($city!= $array[$i][6]) {
                        $sqlupdate = 'UPDATE stores SET city = "'.$array[$i][6].'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> city from {$city} to ".$array[$i][6]." <br/>";}
                    }

                    //********************UPDATE STATE********************//
                    if($state!= $array[$i][7]) {
                        $sqlupdate = 'UPDATE stores SET state = "'.$array[$i][7].'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> state from {$state} to ".$array[$i][7]." <br/>";}
                    }

                    //********************UPDATE COUNTRY********************//
                    if($country!= $array[$i][8]) {
                        $sqlupdate = 'UPDATE stores SET country = "'.$array[$i][8].'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> country from {$country} to ".$array[$i][8]." <br/>";}
                    }

                    //********************UPDATE ZIPCODE********************//
                    if($zipcode!= $array[$i][9]) {
                        $sqlupdate = 'UPDATE stores SET zipcode = "'.$array[$i][9].'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> zipcode from {$zipcode} to ".$array[$i][9]." <br/>";}
                    }

                    //********************UPDATE LATITUDE********************//
                    if($latitude!= $array[$i][10]) {
                        $sqlupdate = 'UPDATE stores SET latitude = "'.$array[$i][10].'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> latitude from {$latitude} to ".$array[$i][10]." <br/>";}
                    }

                    //********************UPDATE LONGITUDE********************//
                    if($longitude!= $array[$i][11]) {
                        $sqlupdate = 'UPDATE stores SET longitude = "'.$array[$i][11].'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> longitude from {$longitude} to ".$array[$i][11]." <br/>";}
                    }

                    //********************UPDATE OPEN_DATE********************//
                    if($open_date != $new_open_date) {
                        $sqlupdate = 'UPDATE stores SET open_date = "'.$new_open_date.'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> open_date from {$open_date} to {$new_open_date} <br/>";}
                    }

                    //********************UPDATE HOURS********************//
                    if($old_hours != $hours) {
                        $sqlupdate = 'UPDATE stores SET hours = "'.$hours.'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> hours from {$old_hours} to {$hours} <br/>";}
                    }

                    //********************UPDATE MAINTAINS_INVENTORY********************//
                    if($old_maintains_inventory != $maintains_inventory) {
                        $sqlupdate = 'UPDATE stores SET maintains_inventory = "'.$maintains_inventory.'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> maintains_inventory from {$old_maintains_inventory} to {$maintains_inventory} <br/>";}
                    }

                    //********************UPDATE STORE_MANAGER********************//
                    if($old_store_manager != $store_manager) {
                        $sqlupdate = 'UPDATE stores SET store_manager = "'.$store_manager.'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> store_manager from {$old_store_manager} to {$store_manager} <br/>";}
                    }

                    //********************UPDATE IS_ROPIS_ENABLED********************//
                    if($old_is_ropis_enabled != $is_ropis_enabled) {
                        $sqlupdate = 'UPDATE stores SET is_ropis_enabled = "'.$is_ropis_enabled.'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> is_ropis_enabled from {$old_is_ropis_enabled} to {$is_ropis_enabled} <br/>";}
                    }

                    //********************UPDATE IS_SHIP_FROM_STORE_ENABLED********************//
                    if($old_is_ship_from_store_enabled != $is_ship_from_store_enabled) {
                        $sqlupdate = 'UPDATE stores SET is_ship_from_store_enabled = "'.$is_ship_from_store_enabled.'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> is_ship_from_store_enabled from {$old_is_ship_from_store_enabled} to {$is_ship_from_store_enabled} <br/>";}
                    }

                    //********************UPDATE IS_SHIP_TO_STORE_ENABLED********************//
                    if($old_is_ship_to_store_enabled != $is_ship_to_store_enabled) {
                        $sqlupdate = 'UPDATE stores SET is_ship_to_store_enabled = "'.$is_ship_to_store_enabled.'" WHERE stloc_id = '.$array[$i][0]." AND store_type = '".$array[$i][2]."'";

                        //if ($mysqli->query($sqlupdate) === TRUE) {$updated .= "Store {$identifier} <strong>UPDATED</strong> is_ship_to_store_enabled from {$old_is_ship_to_store_enabled} to {$is_ship_to_store_enabled} <br/>";}
                    }

                }

            }

        }

    }

    $deleted = "";

}   //<--end file loop


$sql_select = "SELECT * FROM stores WHERE id_store_type NOT IN (".$id_store_types.")";

$result = $mysqli->query($sql_select);

if($result->num_rows < 1) {
    //If no matching records
    echo "NO Store IDs need deletion";

}

/********************************DELETE********************************/
else {
    //If db has records the csv does not DELETE


    $deleted .=  "Number to delete:  ".$result->num_rows."<br /><br />";

    foreach($result as $line) {
        $sqldelete = "DELETE FROM stores WHERE id_store_type = '".$line['id_store_type']."'";

        if ($mysqli->query($sqldelete) === TRUE) {
            $deleted .= "<strong>DELETED</strong> Store <strong>".$line['identifier']."</strong> at ".$line['address1'].", ".$line['city'].", ".$line['state']." ".$line['zipcode']."<br/>\n";
        }
    }

}

$mysqli->close();

$recipient = "name@email.com";

$form_mail = "A new STORE location csv file has been uploaded to the server.<br/><br/>\n\n";

$form_mail .= $created;
$form_mail .= $updated;
$form_mail .= $deleted;

echo $deleted;

$mailHeaders = "From: Mail <info@email.com>\r\n";
$mailHeaders .= "MIME-Version: 1.0\r\n";
$mailHeaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if(!empty($files)) {
    mail( $recipient, "STORE location database has been updated", $form_mail,  $mailHeaders );
}

?>