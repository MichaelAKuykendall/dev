<?php

function form_data(){

    global $wpdb;

    $response = "";

    $zips = $wpdb->get_results("SELECT * FROM zips WHERE zip =".$_POST["zip"]);

    if(count($zips)) {
        $response = "true";
    } else {
        $response = "false";
    }

    $sql = 'INSERT INTO form_data (email,zip) VALUES ("'.$_POST["email"].'","'.$_POST["zip"].'")';
    $result = $wpdb->query($sql);
    
    // if ($result > 0) {

    //     echo "It worked!";

    // } else {
    //     echo "It did NOT work!";
    // }

    print $response;
    

    exit;
}

?>