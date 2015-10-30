<?php
/**
 * Searches STORE locations for duplicates
 * Author: Mike Kuykendall
 * Date: 5/19/15
 * Time: 4:16 PM
 */


$GLOBALS['db'] = new PDO("mysql:host=localhost;dbname=babushka", "now-we", "dance");

function getStateName($state)
{
    $replace_sql = "SELECT * FROM us_states WHERE abbreviation = '{$state}' OR name = '{$state}'";
    $statement = $GLOBALS['db']->prepare($replace_sql);
    $statement->execute();

    $replace_results = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($replace_results)) {
        return $replace_results[0]['name'];
    } else {
        return "None";
    }
}

$fp = fopen('inactive_301s.csv', 'w');

$header = array(
    array('DEFINITE REWRITES -- DIRECT ADDRESS MATCHES'),
    array('   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   '),
    array('Company Status', 'Company Name', 'Facility ID', 'Address', 'City', 'State', 'Latitude', 'Longitude', 'Pending', 'Paused', 'Paused GSU', 'Paused Website', 'State Abbrev', 'URL'),
    array('---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---')
);


foreach ($header as $row) {
    fputcsv($fp, $row);
}

//EXACT match for address line 1, city, state
$sql_exact_match = "SELECT id fac_id, address, city, state, COUNT(*) as c
from facility
GROUP BY address, city, state HAVING c > 1;";

$statement = $GLOBALS['db']->prepare($sql_exact_match);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);


foreach ($results as $result) {

//From exact match, print all info to csv for comparison
$sql_exact_match = "
    SELECT company_id, display_name, id, address, city, state, latitude, longitude, pending, paused, paused_gsu, paused_website
    FROM facility
    WHERE state = '{$result['state']}'
    AND city = '{$result['city']}'
    AND address = '{$result['address']}'
    ORDER BY city, state, address;";

$statement = $GLOBALS['db']->prepare($sql_exact_match);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($result) {

foreach ($result as $line) {
if ($line[company_id] == '5') {
    $line[company_id] = 'INACTIVE';
} else {
    $line[company_id] = 'ACTIVE';
}

$line[abbrev] = strtolower($line[state]);
$line[state] = getStateName($line[state]);
$line[state] = strtolower(str_replace(' ', '-', $line[state]));
$line[address] = strtolower(str_replace(' ', '-', $line[address]));
$line[city] = strtolower(str_replace(' ', '-', $line[city]));

$line['url'] = '/self-storage-locations/' . $line[state] . '/' . $line[city] . '-' . $line[abbrev] . '-self-storage/' . $line[address] . '/' . $line[id];

//            ?><!--<pre>--><?php //print_r($line); ?><!--</pre>--><?php
fputcsv($fp, $line);

}

$delim = array(
    '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---'
);
fputcsv($fp, $delim);
}
}

$header = array(
    array('   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   '),
    array('   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   '),
    array('DEFINITE REWRITES -- DIRECT LAT/LONG MATCHES'),
    array('   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   '),
    array('Company Status', 'Company Name', 'Facility ID', 'Address', 'City', 'State', 'Latitude', 'Longitude', 'Pending', 'Paused', 'Paused GSU', 'Paused Website', 'State Abbrev', 'URL'),
    array('---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---')
);

foreach ($header as $row) {
    fputcsv($fp, $row);
}

$sql_coord_match = "SELECT id facility_id, address, latitude, longitude, COUNT(*) c
FROM facility
GROUP BY latitude, longitude HAVING c > 1;";


$statement = $GLOBALS['db']->prepare($sql_coord_match);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $result) {

    $sql_coord_match = "
    SELECT company_id, display_name, id, address, city, state, latitude, longitude, pending, paused, paused_gsu, paused_website
    FROM facility
    WHERE latitude = '{$result['latitude']}'
    AND longitude = '{$result['longitude']}'
    AND address != '{$result['address']}'
    ORDER BY latitude, longitude;";

    $statement = $GLOBALS['db']->prepare($sql_coord_match);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {

        foreach ($result as $line) {
            if ($line[company_id] == '5') {
                $line[company_id] = 'INACTIVE';
            } else {
                $line[company_id] = 'ACTIVE';
            }

            $line[abbrev] = strtolower($line[state]);
            $line[state] = getStateName($line[state]);
            $line[state] = strtolower(str_replace(' ', '-', $line[state]));
            $line[address] = strtolower(str_replace(' ', '-', $line[address]));
            $line[city] = strtolower(str_replace(' ', '-', $line[city]));

            $line['url'] = '/self-storage-locations/' . $line[state] . '/' . $line[city] . '-' . $line[abbrev] . '-self-storage/' . $line[address] . '/' . $line[id];

            fputcsv($fp, $line);

        }

        $delim = array(
            '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---'
        );
        fputcsv($fp, $delim);
    }


}

$header = array(
    array('   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   '),
    array('   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   '),
    array('PROBABLE REWRITES -- CITY, STATE, STREET NUMBER MATCHES'),
    array('   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   ', '   '),
    array('Company Status', 'Company Name', 'Facility ID', 'Address', 'City', 'State', 'Latitude', 'Longitude', 'Pending', 'Paused', 'Paused GSU', 'Paused Website', 'State Abbrev', 'URL'),
    array('---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---')
);

foreach ($header as $row) {
    fputcsv($fp, $row);
}

$sql_street_numbers = "SELECT id, MID(address, 1, LOCATE(' ', address) - 1) street_numbers, address, latitude, longitude, city, state, COUNT(*) c
FROM facility
GROUP BY city, state, street_numbers HAVING c >1
ORDER BY city, state, street_numbers, c;";

$statement = $GLOBALS['db']->prepare($sql_street_numbers);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $result) {

$sql_select = "
    SELECT company_id, display_name, id, address, city, state, latitude, longitude, pending, paused, paused_gsu, paused_website
    FROM facility
    WHERE state = '{$result['state']}'
    AND city = '{$result['city']}'
    AND MID(address, 1, LOCATE(' ', address) - 1) = '{$result['street_numbers']}'
    AND address != '{$result['address']}'
    AND latitude != '{$result['latitude']}'
    AND longitude != '{$result['longitude']}'
    ORDER BY city, state, address;";

echo $sql_select . "<br />";

$statement = $GLOBALS['db']->prepare($sql_select);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($result) {

foreach ($result as $line) {
if ($line[company_id] == '5') {
    $line[company_id] = 'INACTIVE';
} else {
    $line[company_id] = 'ACTIVE';
}

$line[abbrev] = strtolower($line[state]);
$line[state] = getStateName($line[state]);
$line[state] = strtolower(str_replace(' ', '-', $line[state]));
$line[address] = strtolower(str_replace(' ', '-', $line[address]));
$line[city] = strtolower(str_replace(' ', '-', $line[city]));

$line['url'] = '/self-storage-locations/' . $line[state] . '/' . $line[city] . '-' . $line[abbrev] . '-self-storage/' . $line[address] . '/' . $line[id];

//            ?><!--<pre>--><?php //print_r($line); ?><!--</pre>--><?php
fputcsv($fp, $line);

}

$delim = array(
    '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---'
);
fputcsv($fp, $delim);

}
}
