<?php

/* company List brackets for AI */
$companyTitle = htmlspecialchars("<ParaStyle:company>");
$companyInfo  = htmlspecialchars("<ParaStyle:coinfo>");
$companyAlpha = htmlspecialchars("<ParaStyle:alpha>");

$advCompanyTitle = htmlspecialchars("<ParaStyle:advcompany>");
$advCompanyInfo = htmlspecialchars("<ParaStyle:advcoinfo>");
$foreignCompanyTitle = htmlspecialchars("<ParaStyle:forcompany>");
$foreignCompanyInfo = htmlspecialchars("<ParaStyle:forcoinfo>");

$output = "";

/* output filename */
$filename = "Company List.txt";

/* new connection */
function ConnectDB() {
 $mysqli = new mysqli("localhost","***USER***,***PASSWORD***","db_import");

 /* check connection */
 if (mysqli_connect_errno()) {
 printf("Connect failed: %s\n", mysqli_connect_error());
 exit();
 }

 return $mysqli;
}

/* formats AI listing for Buyer's Guide with newline separated labels */
function CompanyList($mysqli,$query) {

 global $companyTitle,$companyInfo,$advCompanyTitle,$advCompanyInfo,$foreignCompanyTitle,$foreignCompanyInfo,$output;

 if ($result = $mysqli->query($query)) {
         while ($obj = $result->fetch_object()) {

             if($obj->Advertiser) {
                 $title = $advCompanyTitle;
                 $info = $advCompanyInfo;
             }
             elseif($obj->Address_Country == 'Canada' || $obj->Address_Country == 'United States'){
                 $title = $companyTitle;
                 $info = $companyInfo;
             }
             else {
                 $title = $foreignCompanyTitle;
                 $info = $foreignCompanyInfo;
             }

             $country = $obj->Address_Country;

             if ($obj->Company_Name) $output .= $title.$obj->Company_Name."\r\n";
             if ($obj->Address_1) $output .= $info.$obj->Address_1."\r\n";
             if ($obj->Address_2) $output .= $info.$obj->Address_2."\r\n";
             if ($obj->Address_City) $output .= $info.$obj->Address_City.", ".$obj->Address_State." ".$obj->Address_Zip."\r\n";
             if (!($obj->Address_Country == 'Canada' || $obj->Address_Country == 'United States')) $output .= $info.$obj->Address_Country."\r\n";
             if ($obj->Toll_Free_Phone) : {
             //  $output .=$info.$obj->Toll_Free_Phone."\r\n";
                 $formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $obj->Toll_Free_Phone);
                 $output .=$info.$formatted_number."\r\n";
             }
             elseif ($obj->Phone) : {
             //  $output .=$info.$obj->Phone."\r\n";
                 $formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $obj->Phone);
                 $output .=$info.$formatted_number."\r\n";
             }
             endif;
             if ($obj->Website) $output .= $info.$obj->Website."\r\n";
               }
             $result->close();
     }
     else { $output .= "CONNECTION ERROR";}
}

/* fetch alphabetic list of Company names, A to Z, from db and display with CompanyList */
function CompanyListAlpha() {

 global $companyAlpha, $output;

 /* new connection */
 $mysqli = ConnectDB();

 foreach (range('A','Z') as $char) {
     $query  = "SELECT * FROM db_import WHERE Company_Name LIKE \"".$char."%\" ORDER BY Company_Name ASC";
     $output .= "\r\n\n".$companyAlpha.$char."\r\n\n";
     CompanyList($mysqli, $query);

 }
 /* close connection */
 $mysqli->close();
 return $output;
}

/* fetch numeric list of Company names from db and display with <break> separated labels */
function CompanyListNum () {

 global $companyAlpha, $output;

 /* new connection */
 $mysqli = ConnectDB();

 $numquery  = "SELECT * FROM db_import WHERE Company_Name REGEXP '^[0-9]' ORDER BY Company_Name ASC";

 $output .= "\r\n\n".$companyAlpha."NUMBER\r\n\n";

 CompanyList($mysqli, $numquery);

 /* close connection */
 $mysqli->close();

} 

/* add numeric first then alpha to array */
$data = CompanyListNum();
$data .= CompanyListAlpha();

//echo "<pre>{$data}</pre>";

echo "Coolio!";

/* output to filename at top, uncomment echo above for html output */
file_put_contents($filename, html_entity_decode($data));
?>