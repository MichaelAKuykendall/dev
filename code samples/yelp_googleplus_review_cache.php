<?php

/*
Name: Google + Yelp Review Cache Import
Author: Mike Kuykendall
*/

$db1 = new PDO( "mysql:host=localhost;dbname=badooosh","okey-dokey","smokey");

function getFacilities() {
    $db2 = new PDO( "mysql:host=localhost;dbname=badooosh","okey-dokey","smokey");
    $sql_select = "SELECT a.id, a.latitude, a.longitude
                  FROM facility a
                  WHERE a.id in ( SELECT id
                  FROM facility f WHERE f.company_id = '999');";
    $statement = $db2->prepare($sql_select);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function checkHash($hash) {
    $db1 = new PDO( "mysql:host=localhost;dbname=badooosh","okey-dokey","smokey");
    $sql_select = "SELECT hash FROM review_cache WHERE hash = '{$hash}';";
    $statement = $db1->prepare($sql_select);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

$query = "Blah blah category";
$type = "stuff";
$key = "key-keykeykeykey-keykey"; //

$facilities = getFacilities(); ?>


<?php
for ($i = 0; $i < count($facilities); $i++) {

    $fac_id = $facilities[$i][id];
    $clat = $facilities[$i][latitude];
    $clng = $facilities[$i][longitude];

    //******************** GOOGLE IMPORT ********************//

    $place_xml = new SimpleXMLElement("https://maps.googleapis.com/maps/api/place/textsearch/xml?query=" . $query . "&type=" . $type . "&sensor=true&location=" . $clat . "," . $clng . "&radius=500&key=" . $key . "", null, true);

    if ($place_xml->status == 'OK') {
        $reference = $place_xml->result[0]->reference;

        //use the reference id to now pull more data from the google place details api
        $place_details = new SimpleXMLElement("https://maps.googleapis.com/maps/api/place/details/xml?reference=" . $reference . "&sensor=true&key=" . $key, null, true);

    }

    if ($place_details->result->review) {

        foreach ($place_details->result->review as $review) {

            if($review->rating >= 3) {

                $hash = md5($review->author_name.$review->time);

                $result = checkHash($hash);

                if(count($result)<1) {
                    $review->text = addslashes($review->text);

                    $sql_insert = 'INSERT INTO review_cache (facility_id, type, author_name, review_date, stars, review_text, hash)
                                  VALUES (
                                    "' . $fac_id . '",
                                    "Google+",
                                    "' . $review->author_name . '",
                                    "' . $review->time . '",
                                    "' . $review->rating . '",
                                    "' . $review->text . '",
                                    "' . $hash . '"
                                    )';

                    $statement = $db1->prepare($sql_insert);
                    $status = $statement->execute();

                    if ($status) {
                        echo $fac_id . " reviews entered.<br/>";
                    } else {
                        echo "ERROR in SQL!";
                    }
                }
            }
        }
    }

//******************** YELP IMPORT ********************//

    $yelp_url = "http://api.yelp.com/blahblah&lat=" . $clat . "&long=" . $clng . "&limit=.1&ywsid=key-keykeykeykey-keykey";

    $yelp_url = "http://api.yelp.com/business_review_search?term=blahblah&lat=" . $clat . "&long=" . $clng . "&radius=.1&limit=1&ywsid=key-keykeykeykey-keykey";
    $yelp_data = json_decode(file_get_contents($yelp_url));

    if (count($yelp_data->businesses)) { ?>

        <?php foreach ($yelp_data->businesses as $business) :?>
            <?php foreach ($business->reviews as $yelp_review) : ?>

                <?php

                $hash = md5($yelp_review->user_name.$yelp_review->date);

                $result2 = checkHash($hash);

                if(count($result2)<1) {

                    $yelp_review->text_excerpt = addslashes($yelp_review->text_excerpt);

                    $sql_insert = 'INSERT INTO review_cache (facility_id, type, author_name, review_date, yelp_stars_url, yelp_url, review_text, hash)
                                    VALUES (
                                    "' . $fac_id . '",
                                    "Yelp",
                                    "' . $yelp_review->user_name . '",
                                    "' . $yelp_review->date . '",
                                    "' . $yelp_review->rating_img_url . '",
                                    "' . $yelp_review->url . '",
                                    "' . $yelp_review->text_excerpt . '",
                                    "' . $hash . '"
                                    )';

                    if ($yelp_review->rating >= 3) {

                        $statement = $db1->prepare($sql_insert);
                        $status = $statement->execute();

                        if ($status) {
                            echo $fac_id . " reviews entered.<br/>";
                        } else {
                            echo "ERROR in SQL!";
                        }
                    }
                }

            endforeach;
        endforeach; ?>

    <?php } ?>
<?php } ?>