<?php

/**
 * PDO Store API
 * User: Mike Kuykendall
 * Date: 9/8/15
 * Time: 1:09 PM
 */

$db = new PDO("mysql:host=localhost;dbname=blahblah", "user", "password");

$files = array();
foreach (glob("*.csv") as $ifile) {
    $files[] = $ifile;
}

if (empty($files)) {
    echo "No files uploaded";
    die;
}

foreach ($files as $file) {

    //Print filename
    echo "<strong>";
    print_r($file);
    echo "</strong><br />";

    $array = array_map('str_getcsv', file($file));

    //Remove csv header
    unset($array[0]);

    $store_ids = "";

    //How many files?
    $count = count($array);
    echo "Number rows in csv: " . $count . "<br /><br />";


    //Load up CSV store ids for queries
    for ($i = 1; $i <= $count; $i++) {

        if ($store_ids) {
            $store_ids .= ", ";
        }

        $store_ids .= $array[$i][1];


        // See if record exists, if not create it
        $sqlcreate = 'SELECT * FROM store WHERE store_id = ' . $array[$i][1];


        $statement = $db->prepare($sqlcreate);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        //***********************************CREATE
        if (!($results)) {

            $sql_insert = 'INSERT INTO store (name, store_id, address, city, county, state,
                  zip, latitude, longitude, store_hours, office_phone, pizza_phone,
                  regional_manager, district_manager, supervisor, store_manager,
                  state_and_name, sells_diesel, sells_subs, has_car_wash, sells_pizza,
                  pizza_delivery, no_gas_pumps, no_pump_toppers, bakery) VALUES (
                  "' . addslashes($array[$i][0]) . '",
                  "' . addslashes($array[$i][1]) . '",
                  "' . addslashes($array[$i][2]) . '",
                  "' . addslashes($array[$i][3]) . '",
                  "' . addslashes($array[$i][4]) . '",
                  "' . addslashes($array[$i][5]) . '",
                  "' . addslashes($array[$i][6]) . '",
                  "' . addslashes($array[$i][7]) . '",
                  "' . addslashes($array[$i][8]) . '",
                  "' . addslashes($array[$i][9]) . '",
                  "' . addslashes($array[$i][10]) . '",
                  "' . addslashes($array[$i][11]) . '",
                  "' . addslashes($array[$i][12]) . '",
                  "' . addslashes($array[$i][13]) . '",
                  "' . addslashes($array[$i][14]) . '",
                  "' . addslashes($array[$i][15]) . '",
                  "' . addslashes($array[$i][16]) . '",
                  "' . addslashes($array[$i][17]) . '",
                  "' . addslashes($array[$i][18]) . '",
                  "' . addslashes($array[$i][19]) . '",
                  "' . addslashes($array[$i][20]) . '",
                  "' . addslashes($array[$i][21]) . '",
                  "' . addslashes($array[$i][22]) . '",
                  "' . addslashes($array[$i][23]) . '",
                  "' . addslashes($array[$i][24]) . '"
                  )';


            $statement = $db->prepare($sql_insert);
            $status = $statement->execute();

            if ($status) {
                echo "<strong>NEW</strong> ".$array[$i][0] . " store location entered.<br/>";
            } else {
                echo "ERROR in SQL!";
            }

        } else {
//           //***********************************Check NAME

            if ($results[0]['name'] != $array[$i][0]) {

                $sql_update = 'UPDATE store SET name ="'.$array[$i][0].'" WHERE store_id = '.$array[$i][1];

                $statement = $db->prepare($sql_update);
                $status = $statement->execute();

                if ($status) {
                    echo "Store location #{$array[$i][1]} updated <strong>name</strong> from {$results[0][name]} to {$array[$i][0]}.<br/>";
                } else {
                    echo "ERROR in SQL!";
                }

            }

            //***********************************Check ADDRESS

            if ($results[0]['address'] != $array[$i][2]) {

                $sql_update = 'UPDATE store SET address ="'.$array[$i][2].'" WHERE store_id = '.$array[$i][1];

                $statement = $db->prepare($sql_update);
                $status = $statement->execute();

                if ($status) {
                    echo "Store location #{$array[$i][1]} updated <strong>address</strong> from {$results[0]['address']} to {$array[$i][2]}.<br/>";
                } else {
                    echo "ERROR in SQL!";
                }

            }

            //***********************************Check CITY

            if ($results[0]['city'] != $array[$i][3]) {

                $sql_update = 'UPDATE store SET city ="'.$array[$i][3].'" WHERE store_id = '.$array[$i][1];

                $statement = $db->prepare($sql_update);
                $status = $statement->execute();

                if ($status) {
                    echo "Store location #{$array[$i][1]} updated <strong>city</strong> from {$results[0]['city']} to {$array[$i][3]}.<br/>";
                } else {
                    echo "ERROR in SQL!";
                }

            }

            //***********************************Check STATE

            if ($results[0]['state'] != $array[$i][5]) {

                $sql_update = 'UPDATE store SET state ="'.$array[$i][5].'" WHERE store_id = '.$array[$i][1];

                $statement = $db->prepare($sql_update);
                $status = $statement->execute();

                if ($status) {
                    echo "Store location #{$array[$i][1]} updated <strong>state</strong> from {$results[0]['state']} to {$array[$i][5]}.<br/>";
                } else {
                    echo "ERROR in SQL!";
                }

            }

            //***********************************Check ZIP

            if ($results[0]['zip'] != $array[$i][6]) {

                $sql_update = 'UPDATE store SET zip ="'.$array[$i][6].'" WHERE store_id = '.$array[$i][1];

                $statement = $db->prepare($sql_update);
                $status = $statement->execute();

                if ($status) {
                    echo "Store location #{$array[$i][1]} updated <strong>zip</strong> from {$results[0]['zip']} to {$array[$i][6]}.<br/>";
                } else {
                    echo "ERROR in SQL!";
                }

            }

            //***********************************Check STORE HOURS

            if ($results[0]['store_hours'] != $array[$i][9]) {

                $sql_update = 'UPDATE store SET store_hours ="'.$array[$i][9].'" WHERE store_id = '.$array[$i][1];

                $statement = $db->prepare($sql_update);
                $status = $statement->execute();

                if ($status) {
                    echo "Store location #{$array[$i][1]} updated <strong>store hours</strong> from {$results[0]['store_hours']} to {$array[$i][9]}.<br/>";
                } else {
                    echo "ERROR in SQL!";
                }

            }

            //***********************************Check OFFICE PHONE

            if ($results[0]['office_phone'] != $array[$i][10]) {

                $sql_update = 'UPDATE store SET office_phone ="'.$array[$i][10].'" WHERE store_id = '.$array[$i][1];

                $statement = $db->prepare($sql_update);
                $status = $statement->execute();

                if ($status) {
                    echo "Store location #{$array[$i][1]} updated <strong>office phone</strong> from {$results[0]['office_phone']} to {$array[$i][10]}.<br/>";
                } else {
                    echo "ERROR in SQL!";
                }

            }

            //***********************************Check PIZZA PHONE

            if ($results[0]['pizza_phone'] != $array[$i][11]) {

                $sql_update = 'UPDATE store SET pizza_phone ="'.$array[$i][11].'" WHERE store_id = '.$array[$i][1];

                $statement = $db->prepare($sql_update);
                $status = $statement->execute();

                if ($status) {
                    echo "Store location #{$array[$i][1]} updated <strong>pizza phone</strong> from {$results[0]['pizza_phone']} to {$array[$i][11]}.<br/>";
                } else {
                    echo "ERROR in SQL!";
                }

            }

        } //end update loop

    } // end array loop

    rename($file, 'archives/'.$file);

} // end files loop

//***********************************DELETE

$sql_select = "SELECT * FROM store WHERE store_id NOT IN ({$store_ids})";

$statement = $db->prepare($sql_select);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

if($results) {

//    echo "<pre>";
//    print_r($results);
//    echo "</pre>";

    foreach ($results as $result) {
        $sql_delete = "DELETE FROM store WHERE store_id = {$result['store_id']}";

//        echo $sql_delete;

        $statement = $db->prepare($sql_delete);
        $status = $statement->execute();

        if ($status) {
            echo "<strong>DELETED</strong> store # {$result['store_id']}";
        }

    }
}