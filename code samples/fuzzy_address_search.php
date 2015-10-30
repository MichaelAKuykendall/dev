<?php
/**
 * Fuzzy logic redirect creator
 * Author: Mike Kuykendall
 * Date: 5/19/15
 * Time: 4:16 PM
 */


$GLOBALS['db'] = new PDO("mysql:host=localhost;dbname=yahooie", "uh-huh", "sure");

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

$sql_soundex = "SELECT id, MID(address, 1, LOCATE(' ', address) - 1) street_numbers, address, city, state, COUNT(*) c
FROM facility
GROUP BY city, state, street_numbers HAVING c >1
ORDER BY city, state, street_numbers, c;";

$statement = $GLOBALS['db']->prepare($sql_soundex);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

echo count($results);

$fp = fopen('inactive_301s.csv', 'w');

$header = array(
    'Company Status', 'Facility ID', 'Address', 'City', 'State', 'Pending', 'Paused', 'Paused GSU', 'Paused Website', 'State Abbrev', 'URL'
);

fputcsv($fp, $header);

foreach ($results as $result) {

    $sql_select = "
    SELECT company_id, id, address, city, state, pending, paused, paused_gsu, paused_website
    FROM facility
    WHERE state = '{$result[state]}'
    AND city = '{$result[city]}'
    AND MID(address, 1, LOCATE(' ', address) - 1) = '{$result[street_numbers]}'
    ORDER BY city, state, address;";

    $delim = array(
        '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---', '---'
    );

    $statement = $GLOBALS['db']->prepare($sql_select);
    $statement->execute();
    $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($result2) {

        foreach ($result2 as $line) {
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

            ?>
            <pre><?php print_r($line); ?></pre><?php
            fputcsv($fp, $line);

        }

        fputcsv($fp, $delim);

    }

}

fclose($fp);

