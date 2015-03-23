<?php
//This or That ping/post********************

//Sub IDs for sources
if($our['SRC']== '1min') $our['Sub ID']= '9000';
if($our['SRC']== 'adaroo') $our['Sub ID']= '9008';
if($our['SRC']== 'adlauto-ex') $our['Sub ID']= '9016';
if($our['SRC']== 'adlauto-shr') $our['Sub ID']= '9001';
if($our['SRC']== 'autocricket') $our['Sub ID']= '9009';
if($our['SRC']== 'awl-auto') $our['Sub ID']= '9017';
if($our['SRC']== 'BrokersWeb') $our['Sub ID']= '9010';
if($our['SRC']== 'bw') $our['Sub ID']= '9010';
if($our['SRC']== 'bwpre') $our['Sub ID']= '9018';
if($our['SRC']== 'datalot') $our['Sub ID']= '9011';
if($our['SRC']== 'ilinc') $our['Sub ID']= '9019';
if($our['SRC']== 'jm-auto') $our['Sub ID']= '9002';
if($our['SRC']== 'jmadvertising') $our['Sub ID']= '9002';
if($our['SRC']== 'LeadCo') $our['Sub ID']= '9012';
if($our['SRC']== 'leadkarma') $our['Sub ID']= '9020';
if($our['SRC']== 'moss') $our['Sub ID']= '9003';
if($our['SRC']== 'mossam') $our['Sub ID']= '9013';
if($our['SRC']== 'netinsurancegroup') $our['Sub ID']= '9021';
if($our['SRC']== 'Nexus') $our['Sub ID']= '9004';
if($our['SRC']== 'organic') $our['Sub ID']= '9022';
if($our['SRC']== 'precise') $our['Sub ID']= '9005';
if($our['SRC']== 'ratefetcher') $our['Sub ID']= '9014';
if($our['SRC']== 'Revi') $our['Sub ID']= '9023';
if($our['SRC']== 'rpmarketing') $our['Sub ID']= '9006';
if($our['SRC']== 'SalesPortal') $our['Sub ID']= '9015';
if($our['SRC']== 'sh') $our['Sub ID']= '9024';
if($our['SRC']== 'valuquote') $our['Sub ID']= '9025';
if($our['SRC']== 'vquote') $our['Sub ID']= '9007';

//Reconcile residence
if($our['Driver 1 Current Residence']== 'Other') $our['Driver 1 Current Residence']='Choice Not Listed';
if($our['Driver 2 Current Residence']== 'Other') $our['Driver 2 Current Residence']='Choice Not Listed';
if($our['Driver 3 Current Residence']== 'Other') $our['Driver 3 Current Residence']='Choice Not Listed';
if($our['Driver 4 Current Residence']== 'Other') $our['Driver 4 Current Residence']='Choice Not Listed';

//If months exceed 12 increment year
$a = (int)$our['Driver 1 Years At Current Residence'];
$b = (int)$our['Driver 1 Months At Current Residence'];

if ($b >= '12') {
$a++;
$our['Driver 1 Months At Current Residence'] = '0';
$our['Driver 1 Years At Current Residence']=$a;
}

//Now for previous policy years, months Driver 1
$a = (int)$our['Driver 1 Continuously Insured Years'];
$b = (int)$our['Driver 1 Continuously Insured Months'];

if ($b >= '12') {
$a++;
$our['Driver 1 Continuously Insured Months'] = '0';
$our['Driver 1 Continuously Insured Years']=$a;
}

//Now for previous policy years, months Driver 2
$a = (int)$our['Driver 2 Continuously Insured Years'];
$b = (int)$our['Driver 2 Continuously Insured Months'];

if ($b >= '12') {
$a++;
$our['Driver 2 Continuously Insured Months'] = '0';
$our['Driver 2 Continuously Insured Years']=$a;
}

//Now for previous policy years, months Driver 3
$a = (int)$our['Driver 3 Continuously Insured Years'];
$b = (int)$our['Driver 3 Continuously Insured Months'];

if ($b >= '12') {
$a++;
$our['Driver 3 Continuously Insured Months'] = '0';
$our['Driver 3 Continuously Insured Years']=$a;
}

//Now for previous policy years, months Driver 4
$a = (int)$our['Driver 4 Continuously Insured Years'];
$b = (int)$our['Driver 4 Continuously Insured Months'];

if ($b >= '12') {
$a++;
$our['Driver 4 Continuously Insured Months'] = '0';
$our['Driver 4 Continuously Insured Years']=$a;
}

//Correct 10+*******************************************************************************
if($our['Driver 1 Continuously Insured Years']== '10+') $our['Driver 1 Continuously Insured Years']= '10';
if($our['Driver 2 Continuously Insured Years']== '10+') $our['Driver 2 Continuously Insured Years']= '10';
if($our['Driver 3 Continuously Insured Years']== '10+') $our['Driver 3 Continuously Insured Years']= '10';
if($our['Driver 4 Continuously Insured Years']== '10+') $our['Driver 4 Continuously Insured Years']= '10';

//Correct if greater than 10 years for years at current year*******************************************************************************
if ((int)$our['Driver 1 Years At Current Residence'] >= '11') $our['Driver 1 Years At Current Residence'] = '10';
if ((int)$our['Driver 2 Years At Current Residence'] >= '11') $our['Driver 2 Years At Current Residence'] = '10';
if ((int)$our['Driver 3 Years At Current Residence'] >= '11') $our['Driver 3 Years At Current Residence'] = '10';
if ((int)$our['Driver 4 Years At Current Residence'] >= '11') $our['Driver 4 Years At Current Residence'] = '10';

//Create whitespace after 10 to pass validation*******************************************************************************
if ((int)$our['Driver 1 Years At Current Residence'] == '10') $our['Driver 1 Years At Current Residence'] = '10 ';
if ((int)$our['Driver 2 Years At Current Residence'] == '10') $our['Driver 2 Years At Current Residence'] = '10 ';
if ((int)$our['Driver 3 Years At Current Residence'] == '10') $our['Driver 3 Years At Current Residence'] = '10 ';
if ((int)$our['Driver 4 Years At Current Residence'] == '10') $our['Driver 4 Years At Current Residence'] = '10 ';

//If insured years or months empty, send 0 per This or That's specs*******************************************************************************
if(empty($our['Driver 1 Current Insurance Company Months'])) $our['Driver 1 Current Insurance Company Months']='0';
if (empty($our['Driver 1 Current Insurance Company Years'])) $our['Driver 1 Current Insurance Company Years']='0';

//Validate years, months with insurance co*******************************************************************************
if($our['Driver 1 Current Insurance Company Years']== '10+') $our['Driver 1 Current Insurance Company Years']= '10';
if($our['Driver 1 Current Insurance Company Months']== '10+') $our['Driver 1 Current Insurance Company Months']= '10';

if($our['Driver 2 Current Insurance Company Years']== '10+') $our['Driver 2 Current Insurance Company Years']= '10';
if($our['Driver 2 Current Insurance Company Months']== '10+') $our['Driver 2 Current Insurance Company Months']= '10';

if($our['Driver 3 Current Insurance Company Years']== '10+') $our['Driver 3 Current Insurance Company Years']= '10';
if($our['Driver 3 Current Insurance Company Months']== '10+') $our['Driver 3 Current Insurance Company Months']= '10';

if($our['Driver 4 Current Insurance Company Years']== '10+') $our['Driver 4 Current Insurance Company Years']= '10';
if($our['Driver 4 Current Insurance Company Months']== '10+') $our['Driver 4 Current Insurance Company Months']= '10';

//If not provided, correct policy expire to today's date for drivers 1-4*******************************************************************************
$our['Driver 1 Policy Expiration Date']= date('Y-m-d', strtotime($our['Driver 1 Policy Expiration Date']));

if (empty($our['Driver 1 Policy Expiration Date'])) $our['Driver 1 Policy Expiration Date'] = date('Y-m-d');

//DOB format*******************************************************************************
$our['Driver 1 Birthdate']= date('Y-m-d', strtotime($our['Driver 1 Birthdate']));
if(!empty($our['Driver 2 Birthdate'])) $our['Driver 2 Birthdate']= date('Y-m-d', strtotime($our['Driver 2 Birthdate']));
if(!empty($our['Driver 3 Birthdate'])) $our['Driver 2 Birthdate']= date('Y-m-d', strtotime($our['Driver 3 Birthdate']));
if(!empty($our['Driver 4 Birthdate'])) $our['Driver 2 Birthdate']= date('Y-m-d', strtotime($our['Driver 4 Birthdate']));

//If empty, send 0 for years continuously covered*******************************************************************************
if(empty($our['Driver 1 Continuously Insured Years'])) $our['Driver 1 Continuously Insured Years']='0';
if(empty($our['Driver 1 Continuously Insured Months'])) $our['Driver 1 Continuously Insured Months']='0';

//Default to "self" if not provided*******************************************************************************
if (empty($our['Driver 1 Relationship To Applicant'])) $our['Driver 1 Relationship To Applicant'] = 'Self';

//Default to "other for drivers 2-4 if not provided*******************************************************************************
if (empty($our['Driver 2 Relationship To Applicant'])) $our['Driver 2 Relationship To Applicant'] = 'Other';
if (empty($our['Driver 3 Relationship To Applicant'])) $our['Driver 3 Relationship To Applicant'] = 'Other';
if (empty($our['Driver 4 Relationship To Applicant'])) $our['Driver 4 Relationship To Applicant'] = 'Other';

//If empty send basic coverage*******************************************************************************
if (empty($our['Driver 1 Coverage Type'])) $our['Driver 1 Coverage Type']= 'Basic Protection';
if (empty($our['Driver 2 Coverage Type'])) $our['Driver 2 Coverage Type']= 'Basic Protection';
if (empty($our['Driver 3 Coverage Type'])) $our['Driver 3 Coverage Type']= 'Basic Protection';
if (empty($our['Driver 4 Coverage Type'])) $our['Driver 4 Coverage Type']= 'Basic Protection';

//Reconcile coverage Driver 1*******************************************************************************
if($our['Driver 1 Coverage Type']== 'Superior') $our['Driver 1 Coverage Type']= 'Superior Protection';
if($our['Driver 1 Coverage Type']== 'Standard') $our['Driver 1 Coverage Type']= 'Standard Protection';
if($our['Driver 1 Coverage Type']== 'Basic') $our['Driver 1 Coverage Type']= 'Basic Protection';
if($our['Driver 1 Coverage Type']== 'State') $our['Driver 1 Coverage Type']= 'State Minimum';

//Reconcile coverage Driver 2
if($our['Driver 2 Coverage Type']== 'Superior') $our['Driver 2 Coverage Type']= 'Superior Protection';
if($our['Driver 2 Coverage Type']== 'Standard') $our['Driver 2 Coverage Type']= 'Standard Protection';
if($our['Driver 2 Coverage Type']== 'Basic') $our['Driver 2 Coverage Type']= 'Basic Protection';
if($our['Driver 2 Coverage Type']== 'State') $our['Driver 2 Coverage Type']= 'State Minimum';

//Reconcile coverage Driver 3
if($our['Driver 3 Coverage Type']== 'Superior') $our['Driver 3 Coverage Type']= 'Superior Protection';
if($our['Driver 3 Coverage Type']== 'Standard') $our['Driver 3 Coverage Type']= 'Standard Protection';
if($our['Driver 3 Coverage Type']== 'Basic') $our['Driver 3 Coverage Type']= 'Basic Protection';
if($our['Driver 3 Coverage Type']== 'State') $our['Driver 3 Coverage Type']= 'State Minimum';

//Reconcile coverage Driver 4
if($our['Driver 4 Coverage Type']== 'Superior') $our['Driver 4 Coverage Type']= 'Superior Protection';
if($our['Driver 4 Coverage Type']== 'Standard') $our['Driver 4 Coverage Type']= 'Standard Protection';
if($our['Driver 4 Coverage Type']== 'Basic') $our['Driver 4 Coverage Type']= 'Basic Protection';
if($our['Driver 4 Coverage Type']== 'State') $our['Driver 4 Coverage Type']= 'State Minimum';

//Break out d,m,y for DUI
if(!empty($our['Driver 1 Date Of DUI DWI'])) $our['Driver 1 Date Of DUI DWI']= date('Y-m-d', strtotime($our['Driver 1 Date Of DUI DWI']));
if(!empty($our['Driver 2 Date Of DUI DWI'])) $our['Driver 2 Date Of DUI DWI']= date('Y-m-d', strtotime($our['Driver 2 Date Of DUI DWI']));
if(!empty($our['Driver 3 Date Of DUI DWI'])) $our['Driver 3 Date Of DUI DWI']= date('Y-m-d', strtotime($our['Driver 3 Date Of DUI DWI']));
if(!empty($our['Driver 4 Date Of DUI DWI'])) $our['Driver 4 Date Of DUI DWI']= date('Y-m-d', strtotime($our['Driver 4 Date Of DUI DWI']));

list($our['dui_year'], $our['dui_month'], $our['dui_day']) = explode("-",$our['Driver 1 Date Of DUI DWI']);
list($our['2dui_year'], $our['2dui_month'], $our['2dui_day']) = explode("-",$our['Driver 2 Date Of DUI DWI']);
list($our['3dui_year'], $our['3dui_month'], $our['3dui_day']) = explode("-",$our['Driver 3 Date Of DUI DWI']);
list($our['4dui_year'], $our['4dui_month'], $our['4dui_day']) = explode("-",$our['Driver 4 Date Of DUI DWI']);

//Break out d,m,y for Driver 1, accident 1-4
if(!empty($our['Driver 1 Approximate Date 1'])) $our['Driver 1 Approximate Date 1']= date('Y-m-d', strtotime($our['Driver 1 Approximate Date 1']));
if(!empty($our['Driver 1 Approximate Date 2'])) $our['Driver 1 Approximate Date 2']= date('Y-m-d', strtotime($our['Driver 1 Approximate Date 2']));
if(!empty($our['Driver 1 Approximate Date 3'])) $our['Driver 1 Approximate Date 3']= date('Y-m-d', strtotime($our['Driver 1 Approximate Date 3']));
if(!empty($our['Driver 1 Approximate Date 4'])) $our['Driver 1 Approximate Date 4']= date('Y-m-d', strtotime($our['Driver 1 Approximate Date 4']));

list($our['1acc1_year'], $our['1acc1_month'], $our['1acc1_day']) = explode("-",$our['Driver 1 Approximate Date 1']);
list($our['1acc2_year'], $our['1acc2_month'], $our['1acc2_day']) = explode("-",$our['Driver 1 Approximate Date 2']);
list($our['1acc3_year'], $our['1acc3_month'], $our['1acc3_day']) = explode("-",$our['Driver 1 Approximate Date 3']);
list($our['1acc4_year'], $our['1acc4_month'], $our['1acc4_day']) = explode("-",$our['Driver 1 Approximate Date 4']);

//Break out d,m,y for Driver 2, accident 1-4
if(!empty($our['Driver 2 Approximate Date 1'])) $our['Driver 2 Approximate Date 1']= date('Y-m-d', strtotime($our['Driver 2 Approximate Date 1']));
if(!empty($our['Driver 2 Approximate Date 2'])) $our['Driver 2 Approximate Date 2']= date('Y-m-d', strtotime($our['Driver 2 Approximate Date 2']));
if(!empty($our['Driver 2 Approximate Date 3'])) $our['Driver 2 Approximate Date 3']= date('Y-m-d', strtotime($our['Driver 2 Approximate Date 3']));
if(!empty($our['Driver 2 Approximate Date 4'])) $our['Driver 2 Approximate Date 4']= date('Y-m-d', strtotime($our['Driver 2 Approximate Date 4']));

list($our['2acc1_year'], $our['2acc1_month'], $our['2acc1_day']) = explode("-",$our['Driver 2 Approximate Date 1']);
list($our['2acc2_year'], $our['2acc2_month'], $our['2acc2_day']) = explode("-",$our['Driver 2 Approximate Date 2']);
list($our['2acc3_year'], $our['2acc3_month'], $our['2acc3_day']) = explode("-",$our['Driver 2 Approximate Date 3']);
list($our['2acc4_year'], $our['2acc4_month'], $our['2acc4_day']) = explode("-",$our['Driver 2 Approximate Date 4']);

//Break out d,m,y for Driver 3, accident 1-4
if(!empty($our['Driver 3 Approximate Date 1'])) $our['Driver 3 Approximate Date 1']= date('Y-m-d', strtotime($our['Driver 3 Approximate Date 1']));
if(!empty($our['Driver 3 Approximate Date 2'])) $our['Driver 3 Approximate Date 2']= date('Y-m-d', strtotime($our['Driver 3 Approximate Date 2']));
if(!empty($our['Driver 3 Approximate Date 3'])) $our['Driver 3 Approximate Date 3']= date('Y-m-d', strtotime($our['Driver 3 Approximate Date 3']));
if(!empty($our['Driver 3 Approximate Date 4'])) $our['Driver 3 Approximate Date 4']= date('Y-m-d', strtotime($our['Driver 3 Approximate Date 4']));

list($our['3acc1_year'], $our['3acc1_month'], $our['3acc1_day']) = explode("-",$our['Driver 3 Approximate Date 1']);
list($our['3acc2_year'], $our['3acc2_month'], $our['3acc2_day']) = explode("-",$our['Driver 3 Approximate Date 2']);
list($our['3acc3_year'], $our['3acc3_month'], $our['3acc3_day']) = explode("-",$our['Driver 3 Approximate Date 3']);
list($our['3acc4_year'], $our['3acc4_month'], $our['3acc4_day']) = explode("-",$our['Driver 3 Approximate Date 4']);

//Break out d,m,y for Driver 4, accident 1-4
if(!empty($our['Driver 4 Approximate Date 1'])) $our['Driver 4 Approximate Date 1']= date('Y-m-d', strtotime($our['Driver 4 Approximate Date 1']));
if(!empty($our['Driver 4 Approximate Date 2'])) $our['Driver 4 Approximate Date 2']= date('Y-m-d', strtotime($our['Driver 4 Approximate Date 2']));
if(!empty($our['Driver 4 Approximate Date 3'])) $our['Driver 4 Approximate Date 3']= date('Y-m-d', strtotime($our['Driver 4 Approximate Date 3']));
if(!empty($our['Driver 4 Approximate Date 4'])) $our['Driver 4 Approximate Date 4']= date('Y-m-d', strtotime($our['Driver 4 Approximate Date 4']));

list($our['4acc1_year'], $our['4acc1_month'], $our['4acc1_day']) = explode("-",$our['Driver 4 Approximate Date 1']);
list($our['4acc2_year'], $our['4acc2_month'], $our['4acc2_day']) = explode("-",$our['Driver 4 Approximate Date 2']);
list($our['4acc3_year'], $our['4acc3_month'], $our['4acc3_day']) = explode("-",$our['Driver 4 Approximate Date 3']);
list($our['4acc4_year'], $our['4acc4_month'], $our['4acc4_day']) = explode("-",$our['Driver 4 Approximate Date 4']);

//If military is chosen, make military experience = active commisssioned
if($our['Driver 1 Occupation'] == 'Military/Defense') $our['military'] = 'Active Commissioned';
 else $our['military'] = 'No Military Experience';

if($our['Driver 2 Occupation'] == 'Military/Defense') $our['military2'] = 'Active Commissioned';
 else $our['military2'] = 'No Military Experience';

if($our['Driver 3 Occupation'] == 'Military/Defense') $our['military3'] = 'Active Commissioned';
 else $our['military3'] = 'No Military Experience';

if($our['Driver 4 Occupation'] == 'Military/Defense') $our['military4'] = 'Active Commissioned';
 else $our['military4'] = 'No Military Experience';
 
 //Adjust credit rating driver 1-4
if(empty($our['Driver 1 Credit Rating'])) $our['Driver 1 Credit Rating']= 'Unsure';
if(empty($our['Driver 2 Credit Rating'])) $our['Driver 2 Credit Rating']= 'Unsure';
if(empty($our['Driver 3 Credit Rating'])) $our['Driver 3 Credit Rating']= 'Unsure';
if(empty($our['Driver 4 Credit Rating'])) $our['Driver 4 Credit Rating']= 'Unsure';
 
if($our['Driver 1 Credit Rating'] =='Good') $our['Driver 1 Credit Rating'] = 'Excellent';
if($our['Driver 2 Credit Rating'] =='Good') $our['Driver 2 Credit Rating'] = 'Excellent';
if($our['Driver 3 Credit Rating'] =='Good') $our['Driver 3 Credit Rating'] = 'Excellent';
if($our['Driver 4 Credit Rating'] =='Good') $our['Driver 4 Credit Rating'] = 'Excellent';

//Set bankruptcy if not answered
if(empty($our['Driver 1 Bankruptcy In Past 5 Years'])) $our['Driver 1 Bankruptcy In Past 5 Years']= 'No';
if(empty($our['Driver 2 Bankruptcy In Past 5 Years'])) $our['Driver 2 Bankruptcy In Past 5 Years']= 'No';
if(empty($our['Driver 3 Bankruptcy In Past 5 Years'])) $our['Driver 3 Bankruptcy In Past 5 Years']= 'No';
if(empty($our['Driver 4 Bankruptcy In Past 5 Years'])) $our['Driver 4 Bankruptcy In Past 5 Years']= 'No';

//Reconcile ticket
if($our['Driver 1 Incident Type 1']== 'Non Fault Accident Not Listed') $our['Driver 1 Incident Type 1']= 'Not At Fault Accident Not Listed';
if($our['Driver 1 Incident Type 2']== 'Non Fault Accident Not Listed') $our['Driver 1 Incident Type 2']= 'Not At Fault Accident Not Listed';
if($our['Driver 1 Incident Type 3']== 'Non Fault Accident Not Listed') $our['Driver 1 Incident Type 3']= 'Not At Fault Accident Not Listed';
if($our['Driver 1 Incident Type 4']== 'Non Fault Accident Not Listed') $our['Driver 1 Incident Type 4']= 'Not At Fault Accident Not Listed';
//Driver 2
if($our['Driver 2 Incident Type 1']== 'Non Fault Accident Not Listed') $our['Driver 2 Incident Type 1']= 'Not At Fault Accident Not Listed';
if($our['Driver 2 Incident Type 2']== 'Non Fault Accident Not Listed') $our['Driver 2 Incident Type 2']= 'Not At Fault Accident Not Listed';
if($our['Driver 2 Incident Type 3']== 'Non Fault Accident Not Listed') $our['Driver 2 Incident Type 3']= 'Not At Fault Accident Not Listed';
if($our['Driver 2 Incident Type 4']== 'Non Fault Accident Not Listed') $our['Driver 2 Incident Type 4']= 'Not At Fault Accident Not Listed';
//Driver 3
if($our['Driver 3 Incident Type 1']== 'Non Fault Accident Not Listed') $our['Driver 3 Incident Type 1']= 'Not At Fault Accident Not Listed';
if($our['Driver 3 Incident Type 2']== 'Non Fault Accident Not Listed') $our['Driver 3 Incident Type 2']= 'Not At Fault Accident Not Listed';
if($our['Driver 3 Incident Type 3']== 'Non Fault Accident Not Listed') $our['Driver 3 Incident Type 3']= 'Not At Fault Accident Not Listed';
if($our['Driver 3 Incident Type 4']== 'Non Fault Accident Not Listed') $our['Driver 3 Incident Type 4']= 'Not At Fault Accident Not Listed';
//Driver 4
if($our['Driver 4 Incident Type 1']== 'Non Fault Accident Not Listed') $our['Driver 4 Incident Type 1']= 'Not At Fault Accident Not Listed';
if($our['Driver 4 Incident Type 2']== 'Non Fault Accident Not Listed') $our['Driver 4 Incident Type 2']= 'Not At Fault Accident Not Listed';
if($our['Driver 4 Incident Type 3']== 'Non Fault Accident Not Listed') $our['Driver 4 Incident Type 3']= 'Not At Fault Accident Not Listed';
if($our['Driver 4 Incident Type 4']== 'Non Fault Accident Not Listed') $our['Driver 4 Incident Type 4']= 'Not At Fault Accident Not Listed';

//Make ins paid amount an integer Driver 1
$our['Driver 1 Insurance Paid Amount 1'] = floor($our['Driver 1 Insurance Paid Amount 1']);
$our['Driver 1 Insurance Paid Amount 2'] = floor($our['Driver 1 Insurance Paid Amount 2']);
$our['Driver 1 Insurance Paid Amount 3'] = floor($our['Driver 1 Insurance Paid Amount 3']);
$our['Driver 1 Insurance Paid Amount 4'] = floor($our['Driver 1 Insurance Paid Amount 4']);

//Make ins paid amount an integer Driver 2
$our['Driver 2 Insurance Paid Amount 1'] = floor($our['Driver 2 Insurance Paid Amount 1']);
$our['Driver 2 Insurance Paid Amount 2'] = floor($our['Driver 2 Insurance Paid Amount 2']);
$our['Driver 2 Insurance Paid Amount 3'] = floor($our['Driver 2 Insurance Paid Amount 3']);
$our['Driver 2 Insurance Paid Amount 4'] = floor($our['Driver 2 Insurance Paid Amount 4']);

//Make ins paid amount an integer Driver 3
$our['Driver 3 Insurance Paid Amount 1'] = floor($our['Driver 3 Insurance Paid Amount 1']);
$our['Driver 3 Insurance Paid Amount 2'] = floor($our['Driver 3 Insurance Paid Amount 2']);
$our['Driver 3 Insurance Paid Amount 3'] = floor($our['Driver 3 Insurance Paid Amount 3']);
$our['Driver 3 Insurance Paid Amount 4'] = floor($our['Driver 3 Insurance Paid Amount 4']);

//Make ins paid amount an integer Driver 4
$our['Driver 4 Insurance Paid Amount 1'] = floor($our['Driver 4 Insurance Paid Amount 1']);
$our['Driver 4 Insurance Paid Amount 2'] = floor($our['Driver 4 Insurance Paid Amount 2']);
$our['Driver 4 Insurance Paid Amount 3'] = floor($our['Driver 4 Insurance Paid Amount 3']);
$our['Driver 4 Insurance Paid Amount 4'] = floor($our['Driver 4 Insurance Paid Amount 4']);

//Correct at fault if sent boolean
if($our['Driver 1 At Fault 1']== 'true') $our['Driver 1 At Fault 1']= 'Yes';
if($our['Driver 1 At Fault 1']== 'false') $our['Driver 1 At Fault 1']= 'No';

if($our['Driver 1 At Fault 2']== 'true') $our['Driver 1 At Fault 1']= 'Yes';
if($our['Driver 1 At Fault 2']== 'false') $our['Driver 1 At Fault 1']= 'No';

if($our['Driver 1 At Fault 3']== 'true') $our['Driver 1 At Fault 1']= 'Yes';
if($our['Driver 1 At Fault 3']== 'false') $our['Driver 1 At Fault 1']= 'No';

if($our['Driver 1 At Fault 4']== 'true') $our['Driver 1 At Fault 1']= 'Yes';
if($our['Driver 1 At Fault 4']== 'false') $our['Driver 1 At Fault 1']= 'No';

//Driver 2
if($our['Driver 2 At Fault 1']== 'true') $our['Driver 2 At Fault 1']= 'Yes';
if($our['Driver 2 At Fault 1']== 'false') $our['Driver 2 At Fault 1']= 'No';

if($our['Driver 2 At Fault 2']== 'true') $our['Driver 2 At Fault 1']= 'Yes';
if($our['Driver 2 At Fault 2']== 'false') $our['Driver 2 At Fault 1']= 'No';

if($our['Driver 2 At Fault 3']== 'true') $our['Driver 2 At Fault 1']= 'Yes';
if($our['Driver 2 At Fault 3']== 'false') $our['Driver 2 At Fault 1']= 'No';

if($our['Driver 2 At Fault 4']== 'true') $our['Driver 2 At Fault 1']= 'Yes';
if($our['Driver 2 At Fault 4']== 'false') $our['Driver 2 At Fault 1']= 'No';

//Driver 3
if($our['Driver 3 At Fault 1']== 'true') $our['Driver 3 At Fault 1']= 'Yes';
if($our['Driver 3 At Fault 1']== 'false') $our['Driver 3 At Fault 1']= 'No';

if($our['Driver 3 At Fault 2']== 'true') $our['Driver 3 At Fault 1']= 'Yes';
if($our['Driver 3 At Fault 2']== 'false') $our['Driver 3 At Fault 1']= 'No';

if($our['Driver 3 At Fault 3']== 'true') $our['Driver 3 At Fault 1']= 'Yes';
if($our['Driver 3 At Fault 3']== 'false') $our['Driver 3 At Fault 1']= 'No';

if($our['Driver 3 At Fault 4']== 'true') $our['Driver 3 At Fault 1']= 'Yes';
if($our['Driver 3 At Fault 4']== 'false') $our['Driver 3 At Fault 1']= 'No';

//Driver 4
if($our['Driver 4 At Fault 1']== 'true') $our['Driver 4 At Fault 1']= 'Yes';
if($our['Driver 4 At Fault 1']== 'false') $our['Driver 4 At Fault 1']= 'No';

if($our['Driver 4 At Fault 2']== 'true') $our['Driver 4 At Fault 1']= 'Yes';
if($our['Driver 4 At Fault 2']== 'false') $our['Driver 4 At Fault 1']= 'No';

if($our['Driver 4 At Fault 3']== 'true') $our['Driver 4 At Fault 1']= 'Yes';
if($our['Driver 4 At Fault 3']== 'false') $our['Driver 4 At Fault 1']= 'No';

if($our['Driver 4 At Fault 4']== 'true') $our['Driver 4 At Fault 1']= 'Yes';
if($our['Driver 4 At Fault 4']== 'false') $our['Driver 4 At Fault 1']= 'No';

//Driver1, Accident 1 ACCIDENT***************************************************
if(in_array($our['Driver 1 Incident Type 1'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 1 Damages 1'])) $our['Driver 1 Damages 1']= 'Not Applicable';
if(empty($our['Driver 1 Insurance Paid Amount 1'])) $our['Driver 1 Insurance Paid Amount 1']= '0';

$our['1accident1'] ='<Accident Year="'.$our['1acc1_year'].'" Month="'.$our['1acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 1']).'</Description><AtFault>'.htmlspecialchars($our['Driver 1 At Fault 1']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 1 Damages 1']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 1 Insurance Paid Amount 1']).'</InsurancePaidAmount></Accident>';	
}

//Driver1, Accident 2 ACCIDENT***************************************************
if(in_array($our['Driver 1 Incident Type 2'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 1 Damages 2'])) $our['Driver 1 Damages 2']= 'Not Applicable';
if(empty($our['Driver 1 Insurance Paid Amount 2'])) $our['Driver 1 Insurance Paid Amount 2']= '0';

$our['1accident2'] ='<Accident Year="'.$our['1acc2_year'].'" Month="'.$our['1acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 2']).'</Description><AtFault>'.htmlspecialchars($our['Driver 1 At Fault 2']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 1 Damages 2']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 1 Insurance Paid Amount 2']).'</InsurancePaidAmount></Accident>';	
}

//Driver1, Accident 3 ACCIDENT***************************************************
if(in_array($our['Driver 1 Incident Type 3'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 1 Damages 3'])) $our['Driver 1 Damages 3']= 'Not Applicable';
if(empty($our['Driver 1 Insurance Paid Amount 3'])) $our['Driver 1 Insurance Paid Amount 3']= '0';

$our['1accident3'] ='<Accident Year="'.$our['1acc3_year'].'" Month="'.$our['1acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 3']).'</Description><AtFault>'.htmlspecialchars($our['Driver 1 At Fault 3']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 1 Damages 3']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 1 Insurance Paid Amount 3']).'</InsurancePaidAmount></Accident>';	
}

//Driver1, Accident 4 ACCIDENT***************************************************
if(in_array($our['Driver 1 Incident Type 4'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 1 Damages 4'])) $our['Driver 1 Damages 4']= 'Not Applicable';
if(empty($our['Driver 1 Insurance Paid Amount 4'])) $our['Driver 1 Insurance Paid Amount 4']= '0';

$our['1accident4'] ='<Accident Year="'.$our['1acc4_year'].'" Month="'.$our['1acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 4']).'</Description><AtFault>'.htmlspecialchars($our['Driver 1 At Fault 4']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 1 Damages 4']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 1 Insurance Paid Amount 4']).'</InsurancePaidAmount></Accident>';	
}

//Driver2, Accident 1 ACCIDENT***************************************************
if(in_array($our['Driver 2 Incident Type 1'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 2 Damages 1'])) $our['Driver 2 Damages 1']= 'Not Applicable';
if(empty($our['Driver 2 Insurance Paid Amount 1'])) $our['Driver 2 Insurance Paid Amount 1']= '0';

$our['2accident1'] ='<Accident Year="'.$our['2acc1_year'].'" Month="'.$our['2acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 1']).'</Description><AtFault>'.htmlspecialchars($our['Driver 2 At Fault 1']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 2 Damages 1']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 2 Insurance Paid Amount 1']).'</InsurancePaidAmount></Accident>';	
}

//Driver2, Accident 2 ACCIDENT***************************************************
if(in_array($our['Driver 2 Incident Type 2'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 2 Damages 2'])) $our['Driver 2 Damages 2']= 'Not Applicable';
if(empty($our['Driver 2 Insurance Paid Amount 2'])) $our['Driver 2 Insurance Paid Amount 2']= '0';

$our['2accident2'] ='<Accident Year="'.$our['2acc2_year'].'" Month="'.$our['2acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 2']).'</Description><AtFault>'.htmlspecialchars($our['Driver 2 At Fault 2']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 2 Damages 2']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 2 Insurance Paid Amount 2']).'</InsurancePaidAmount></Accident>';	
}

//Driver2, Accident 3 ACCIDENT***************************************************
if(in_array($our['Driver 2 Incident Type 3'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 2 Damages 3'])) $our['Driver 2 Damages 3']= 'Not Applicable';
if(empty($our['Driver 2 Insurance Paid Amount 3'])) $our['Driver 2 Insurance Paid Amount 3']= '0';

$our['2accident3'] ='<Accident Year="'.$our['2acc3_year'].'" Month="'.$our['2acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 3']).'</Description><AtFault>'.htmlspecialchars($our['Driver 2 At Fault 3']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 2 Damages 3']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 2 Insurance Paid Amount 3']).'</InsurancePaidAmount></Accident>';	
}

//Driver2, Accident 4 ACCIDENT***************************************************
if(in_array($our['Driver 2 Incident Type 4'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 2 Damages 4'])) $our['Driver 2 Damages 4']= 'Not Applicable';
if(empty($our['Driver 2 Insurance Paid Amount 4'])) $our['Driver 2 Insurance Paid Amount 4']= '0';

$our['2accident4'] ='<Accident Year="'.$our['2acc4_year'].'" Month="'.htmlspecialchars($our['2acc4_month']).'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 4']).'</Description><AtFault>'.htmlspecialchars($our['Driver 2 At Fault 4']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 2 Damages 4']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($$our['Driver 2 Insurance Paid Amount 4']).'</InsurancePaidAmount></Accident>';	
}

//Driver3, Accident 1 ACCIDENT***************************************************
if(in_array($our['Driver 3 Incident Type 1'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 3 Damages 1'])) $our['Driver 3 Damages 1']= 'Not Applicable';
if(empty($our['Driver 3 Insurance Paid Amount 1'])) $our['Driver 3 Insurance Paid Amount 1']= '0';

$our['3accident1'] ='<Accident Year="'.$our['3acc1_year'].'" Month="'.htmlspecialchars($our['3acc1_month']).'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 1']).'</Description><AtFault>'.htmlspecialchars($our['Driver 3 At Fault 1']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 3 Damages 1']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 3 Insurance Paid Amount 1']).'</InsurancePaidAmount></Accident>';	
}

//Driver3, Accident 2 ACCIDENT***************************************************
if(in_array($our['Driver 3 Incident Type 2'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 3 Damages 2'])) $our['Driver 3 Damages 2']= 'Not Applicable';
if(empty($our['Driver 3 Insurance Paid Amount 2'])) $our['Driver 3 Insurance Paid Amount 2']= '0';

$our['3accident2'] ='<Accident Year="'.$our['3acc2_year'].'" Month="'.htmlspecialchars($our['3acc2_month']).'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 2']).'</Description><AtFault>'.htmlspecialchars($our['Driver 3 At Fault 2']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 3 Damages 2']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 3 Insurance Paid Amount 2']).'</InsurancePaidAmount></Accident>';	
}

//Driver3, Accident 3 ACCIDENT***************************************************
if(in_array($our['Driver 3 Incident Type 3'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 3 Damages 3'])) $our['Driver 3 Damages 3']= 'Not Applicable';
if(empty($our['Driver 3 Insurance Paid Amount 3'])) $our['Driver 3 Insurance Paid Amount 3']= '0';

$our['3accident3'] ='<Accident Year="'.$our['3acc3_year'].'" Month="'.htmlspecialchars($our['3acc3_month']).'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 3']).'</Description><AtFault>'.htmlspecialchars($our['Driver 3 At Fault 3']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 3 Damages 3']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 3 Insurance Paid Amount 3']).'</InsurancePaidAmount></Accident>';	
}

//Driver3, Accident 4 ACCIDENT***************************************************
if(in_array($our['Driver 3 Incident Type 4'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 3 Damages 4'])) $our['Driver 3 Damages 4']= 'Not Applicable';
if(empty($our['Driver 3 Insurance Paid Amount 4'])) $our['Driver 3 Insurance Paid Amount 4']= '0';

$our['3accident4'] ='<Accident Year="'.$our['3acc4_year'].'" Month="'.$our['3acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 4']).'</Description><AtFault>'.htmlspecialchars($our['Driver 3 At Fault 4']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 3 Damages 4']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 3 Insurance Paid Amount 4']).'</InsurancePaidAmount></Accident>';	
}

//Driver4, Accident 1 ACCIDENT***************************************************
if(in_array($our['Driver 4 Incident Type 1'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 4 Damages 1'])) $our['Driver 4 Damages 1']= 'Not Applicable';
if(empty($our['Driver 4 Insurance Paid Amount 1'])) $our['Driver 4 Insurance Paid Amount 1']= '0';

$our['4accident1'] ='<Accident Year="'.$our['4acc1_year'].'" Month="'.$our['4acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 1']).'</Description><AtFault>'.htmlspecialchars($our['Driver 4 At Fault 1']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 4 Damages 1']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 4 Insurance Paid Amount 1']).'</InsurancePaidAmount></Accident>';	
}

//Driver4, Accident 2 ACCIDENT***************************************************
if(in_array($our['Driver 4 Incident Type 2'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 4 Damages 2'])) $our['Driver 4 Damages 2']= 'Not Applicable';
if(empty($our['Driver 4 Insurance Paid Amount 2'])) $our['Driver 4 Insurance Paid Amount 2']= '0';

$our['4accident2'] ='<Accident Year="'.$our['4acc2_year'].'" Month="'.htmlspecialchars($our['4acc2_month']).'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 2']).'</Description><AtFault>'.htmlspecialchars($our['Driver 4 At Fault 2']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 4 Damages 2']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 4 Insurance Paid Amount 2']).'</InsurancePaidAmount></Accident>';	
}

//Driver4, Accident 3 ACCIDENT***************************************************
if(in_array($our['Driver 4 Incident Type 3'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 4 Damages 3'])) $our['Driver 4 Damages 3']= 'Not Applicable';
if(empty($our['Driver 4 Insurance Paid Amount 3'])) $our['Driver 4 Insurance Paid Amount 3']= '0';

$our['4accident3'] ='<Accident Year="'.$our['4acc3_year'].'" Month="'.htmlspecialchars($our['4acc3_month']).'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 3']).'</Description><AtFault>'.htmlspecialchars($our['Driver 4 At Fault 3']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 4 Damages 3']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 4 Insurance Paid Amount 3']).'</InsurancePaidAmount></Accident>';	
}

//Driver4, Accident 4 ACCIDENT***************************************************
if(in_array($our['Driver 4 Incident Type 4'],array("Vehicle Hit Vehicle","Vehicle Hit Pedestrian","Vehicle Hit Property","Other Vehicle Hit Yours","At Fault Accident Not Listed","Not At Fault Accident Not Listed","Vehicle Hit Animal"))) {

if(empty($our['Driver 4 Damages 4'])) $our['Driver 4 Damages 4']= 'Not Applicable';
if(empty($our['Driver 4 Insurance Paid Amount 4'])) $our['Driver 4 Insurance Paid Amount 4']= '0';

$our['4accident4'] ='<Accident Year="'.$our['4acc4_year'].'" Month="'.$our['4acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 4']).'</Description><AtFault>'.htmlspecialchars($our['Driver 4 At Fault 4']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 4 Damages 4']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 4 Insurance Paid Amount 4']).'</InsurancePaidAmount></Accident>';	
}

//Driver1, Claim 1***************************************************
if(in_array($our['Driver 1 Incident Type 1'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 1 Damages 1'])) $our['Driver 1 Damages 1']= 'Not Applicable';
if(empty($our['Driver 1 Insurance Paid Amount 1'])) $our['Driver 1 Insurance Paid Amount 1']= '0';

$our['1claim1'] ='<Claim Year="'.$our['1acc1_year'].'" Month="'.$our['1acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 1']).'</Description><AtFault>'.htmlspecialchars($our['Driver 1 At Fault 1']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 1 Damages 1']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 1 Insurance Paid Amount 1']).'</InsurancePaidAmount></Claim>';	
}

//Driver1, Claim 2***************************************************
if(in_array($our['Driver 1 Incident Type 2'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 1 Damages 2'])) $our['Driver 1 Damages 2']= 'Not Applicable';
if(empty($our['Driver 1 Insurance Paid Amount 2'])) $our['Driver 1 Insurance Paid Amount 2']= '0';

$our['1claim2'] ='<Claim Year="'.htmlspecialchars($our['1acc2_year']).'" Month="'.htmlspecialchars($our['1acc2_month']).'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 2']).'</Description><AtFault>'.htmlspecialchars($our['Driver 1 At Fault 2']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 1 Damages 2']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 1 Insurance Paid Amount 2']).'</InsurancePaidAmount></Claim>';	
}

//Driver1, Claim 3***************************************************
if(in_array($our['Driver 1 Incident Type 3'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 1 Damages 3'])) $our['Driver 1 Damages 3']= 'Not Applicable';
if(empty($our['Driver 1 Insurance Paid Amount 3'])) $our['Driver 1 Insurance Paid Amount 3']= '0';

$our['1claim3'] ='<Claim Year="'.$our['1acc3_year'].'" Month="'.htmlspecialchars($our['1acc3_month']).'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 3']).'</Description><AtFault>'.htmlspecialchars($our['Driver 1 At Fault 3']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 1 Damages 3']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 1 Insurance Paid Amount 3']).'</InsurancePaidAmount></Claim>';	
}

//Driver1, Claim 4***************************************************
if(in_array($our['Driver 1 Incident Type 4'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 1 Damages 4'])) $our['Driver 1 Damages 4']= 'Not Applicable';
if(empty($our['Driver 1 Insurance Paid Amount 4'])) $our['Driver 1 Insurance Paid Amount 4']= '0';

$our['1claim4'] ='<Claim Year="'.$our['1acc4_year'].'" Month="'.$our['1acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 4']).'</Description><AtFault>'.htmlspecialchars($our['Driver 1 At Fault 4']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 1 Damages 4']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 1 Insurance Paid Amount 4']).'</InsurancePaidAmount></Claim>';	
}

//Driver2, Claim 1***************************************************
if(in_array($our['Driver 2 Incident Type 1'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 2 Damages 1'])) $our['Driver 2 Damages 1']= 'Not Applicable';
if(empty($our['Driver 2 Insurance Paid Amount 1'])) $our['Driver 2 Insurance Paid Amount 1']= '0';

$our['2claim1'] ='<Claim Year="'.$our['2acc1_year'].'" Month="'.$our['2acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 1']).'</Description><AtFault>'.htmlspecialchars($our['Driver 2 At Fault 1']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 2 Damages 1']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 2 Insurance Paid Amount 1']).'</InsurancePaidAmount></Claim>';	
}

//Driver2, Claim 2***************************************************
if(in_array($our['Driver 2 Incident Type 2'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 2 Damages 2'])) $our['Driver 2 Damages 2']= 'Not Applicable';
if(empty($our['Driver 2 Insurance Paid Amount 2'])) $our['Driver 2 Insurance Paid Amount 2']= '0';

$our['2claim2'] ='<Claim Year="'.$our['2acc2_year'].'" Month="'.$our['2acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 2']).'</Description><AtFault>'.htmlspecialchars($our['Driver 2 At Fault 2']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 2 Damages 2']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 2 Insurance Paid Amount 2']).'</InsurancePaidAmount></Claim>';	
}

//Driver2, Claim 3***************************************************
if(in_array($our['Driver 2 Incident Type 3'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 2 Damages 3'])) $our['Driver 2 Damages 3']= 'Not Applicable';
if(empty($our['Driver 2 Insurance Paid Amount 3'])) $our['Driver 2 Insurance Paid Amount 3']= '0';

$our['2claim3'] ='<Claim Year="'.$our['2acc3_year'].'" Month="'.$our['2acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 3']).'</Description><AtFault>'.htmlspecialchars($our['Driver 2 At Fault 3']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 2 Damages 3']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 2 Insurance Paid Amount 3']).'</InsurancePaidAmount></Claim>';	
}

//Driver2, Claim 4***************************************************
if(in_array($our['Driver 2 Incident Type 4'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 2 Damages 4'])) $our['Driver 2 Damages 4']= 'Not Applicable';
if(empty($our['Driver 2 Insurance Paid Amount 4'])) $our['Driver 2 Insurance Paid Amount 4']= '0';

$our['2claim4'] ='<Claim Year="'.$our['2acc4_year'].'" Month="'.$our['2acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 4']).'</Description><AtFault>'.htmlspecialchars($our['Driver 2 At Fault 4']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 2 Damages 4']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 2 Insurance Paid Amount 4']).'</InsurancePaidAmount></Claim>';	
}

//Driver3, Claim 1***************************************************
if(in_array($our['Driver 3 Incident Type 1'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 3 Damages 1'])) $our['Driver 3 Damages 1']= 'Not Applicable';
if(empty($our['Driver 3 Insurance Paid Amount 1'])) $our['Driver 3 Insurance Paid Amount 1']= '0';

$our['3claim1'] ='<Claim Year="'.$our['3acc1_year'].'" Month="'.$our['3acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 1']).'</Description><AtFault>'.htmlspecialchars($our['Driver 3 At Fault 1']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 3 Damages 1']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars( $our['Driver 3 Insurance Paid Amount 1']).'</InsurancePaidAmount></Claim>';	
}

//Driver3, Claim 2***************************************************
if(in_array($our['Driver 3 Incident Type 2'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 3 Damages 2'])) $our['Driver 3 Damages 2']= 'Not Applicable';
if(empty($our['Driver 3 Insurance Paid Amount 2'])) $our['Driver 3 Insurance Paid Amount 2']= '0';

$our['3claim2'] ='<Claim Year="'.$our['3acc2_year'].'" Month="'.$our['3acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 2']).'</Description><AtFault>'.htmlspecialchars($our['Driver 3 At Fault 2']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 3 Damages 2']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 3 Insurance Paid Amount 2']).'</InsurancePaidAmount></Claim>';	
}

//Driver3, Claim 3***************************************************
if(in_array($our['Driver 3 Incident Type 3'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 3 Damages 3'])) $our['Driver 3 Damages 3']= 'Not Applicable';
if(empty($our['Driver 3 Insurance Paid Amount 3'])) $our['Driver 3 Insurance Paid Amount 3']= '0';

$our['3claim3'] ='<Claim Year="'.$our['3acc3_year'].'" Month="'.$our['3acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 3']).'</Description><AtFault>'.htmlspecialchars($our['Driver 3 At Fault 3']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 3 Damages 3']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 3 Insurance Paid Amount 3']).'</InsurancePaidAmount></Claim>';	
}

//Driver3, Claim 4***************************************************
if(in_array($our['Driver 3 Incident Type 4'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 3 Damages 4'])) $our['Driver 3 Damages 4']= 'Not Applicable';
if(empty($our['Driver 3 Insurance Paid Amount 4'])) $our['Driver 3 Insurance Paid Amount 4']= '0';

$our['3claim4'] ='<Claim Year="'.$our['3acc4_year'].'" Month="'.$our['3acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 4']).'</Description><AtFault>'.htmlspecialchars($our['Driver 3 At Fault 4']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 3 Damages 4']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 3 Insurance Paid Amount 4']).'</InsurancePaidAmount></Claim>';	
}

//Driver4, Claim 1***************************************************
if(in_array($our['Driver 4 Incident Type 1'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 4 Damages 1'])) $our['Driver 4 Damages 1']= 'Not Applicable';
if(empty($our['Driver 4 Insurance Paid Amount 1'])) $our['Driver 4 Insurance Paid Amount 1']= '0';

$our['4claim1'] ='<Claim Year="'.$our['4acc1_year'].'" Month="'.$our['4acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 1']).'</Description><AtFault>'.htmlspecialchars($our['Driver 4 At Fault 1']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 4 Damages 1']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 4 Insurance Paid Amount 1']).'</InsurancePaidAmount></Claim>';	
}

//Driver4, Claim 2***************************************************
if(in_array($our['Driver 4 Incident Type 2'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 4 Damages 2'])) $our['Driver 4 Damages 2']= 'Not Applicable';
if(empty($our['Driver 4 Insurance Paid Amount 2'])) $our['Driver 4 Insurance Paid Amount 2']= '0';

$our['4claim2'] ='<Claim Year="'.$our['4acc2_year'].'" Month="'.$our['4acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 2']).'</Description><AtFault>'.htmlspecialchars($our['Driver 4 At Fault 2']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 4 Damages 2']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 4 Insurance Paid Amount 2']).'</InsurancePaidAmount></Claim>';	
}

//Driver4, Claim 3***************************************************
if(in_array($our['Driver 4 Incident Type 3'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 4 Damages 3'])) $our['Driver 4 Damages 3']= 'Not Applicable';
if(empty($our['Driver 4 Insurance Paid Amount 3'])) $our['Driver 4 Insurance Paid Amount 3']= '0';

$our['4claim3'] ='<Claim Year="'.$our['4acc3_year'].'" Month="'.$our['4acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 3']).'</Description><AtFault>'.htmlspecialchars($our['Driver 4 At Fault 3']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 4 Damages 3']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 4 Insurance Paid Amount 3']).'</InsurancePaidAmount></Claim>';	
}

//Driver4, Claim 4***************************************************
if(in_array($our['Driver 4 Incident Type 4'],array("Vehicle Damaged Avoiding Accident","Fire Hail Water Damage","Vandalism Damage","Vehicle Stolen","Windshield Damage","Loss Claim Not Listed"))) {

if(empty($our['Driver 4 Damages 4'])) $our['Driver 4 Damages 4']= 'Not Applicable';
if(empty($our['Driver 4 Insurance Paid Amount 4'])) $our['Driver 4 Insurance Paid Amount 4']= '0';

$our['4claim4'] ='<Claim Year="'.$our['4acc4_year'].'" Month="'.$our['4acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 4']).'</Description><AtFault>'.htmlspecialchars($our['Driver 4 At Fault 4']).'</AtFault><WhatDamaged>'.htmlspecialchars($our['Driver 4 Damages 4']).'</WhatDamaged><InsurancePaidAmount>'.htmlspecialchars($our['Driver 4 Insurance Paid Amount 4']).'</InsurancePaidAmount></Claim>';	
}

//Driver 1 Ticket 1***************************************************
if(in_array($our['Driver 1 Incident Type 1'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['1ticket1']='<Ticket Year="'.$our['1acc1_year'].'" Month="'.$our['1acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 1']).'</Description></Ticket>';
}

//Driver 1 Ticket 2***************************************************
if(in_array($our['Driver 1 Incident Type 2'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['1ticket2']='<Ticket Year="'.$our['1acc2_year'].'" Month="'.$our['1acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 2']).'</Description></Ticket>';
}

//Driver 1 Ticket 3***************************************************
if(in_array($our['Driver 1 Incident Type 3'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['1ticket3']='<Ticket Year="'.$our['1acc3_year'].'" Month="'.$our['1acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 3']).'</Description></Ticket>';
}

//Driver 1 Ticket 4***************************************************
if(in_array($our['Driver 1 Incident Type 4'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['1ticket4']='<Ticket Year="'.$our['1acc4_year'].'" Month="'.$our['1acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 1 Incident Type 4']).'</Description></Ticket>';
}

//Driver 2 Ticket 1***************************************************
if(in_array($our['Driver 2 Incident Type 1'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['2ticket1']='<Ticket Year="'.$our['2acc1_year'].'" Month="'.$our['2acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 1']).'</Description></Ticket>';
}

//Driver 2 Ticket 2***************************************************
if(in_array($our['Driver 2 Incident Type 2'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['2ticket2']='<Ticket Year="'.$our['2acc2_year'].'" Month="'.$our['2acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 2']).'</Description></Ticket>';
}

//Driver 2 Ticket 3***************************************************
if(in_array($our['Driver 2 Incident Type 3'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['2ticket3']='<Ticket Year="'.$our['2acc3_year'].'" Month="'.$our['2acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 3']).'</Description></Ticket>';
}

//Driver 2 Ticket 4***************************************************
if(in_array($our['Driver 2 Incident Type 4'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['2ticket4']='<Ticket Year="'.$our['2acc4_year'].'" Month="'.$our['2acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 2 Incident Type 4']).'</Description></Ticket>';
}

//Driver 3 Ticket 1***************************************************
if(in_array($our['Driver 3 Incident Type 1'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['3ticket1']='<Ticket Year="'.$our['3acc1_year'].'" Month="'.$our['3acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 1']).'</Description></Ticket>';
}

//Driver 3 Ticket 2***************************************************
if(in_array($our['Driver 3 Incident Type 2'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['3ticket2']='<Ticket Year="'.$our['3acc2_year'].'" Month="'.$our['3acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 2']).'</Description></Ticket>';
}

//Driver 3 Ticket 3***************************************************
if(in_array($our['Driver 3 Incident Type 3'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['3ticket3']='<Ticket Year="'.$our['3acc3_year'].'" Month="'.$our['3acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 3']).'</Description></Ticket>';
}

//Driver 3 Ticket 4***************************************************
if(in_array($our['Driver 3 Incident Type 4'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['3ticket4']='<Ticket Year="'.$our['3acc4_year'].'" Month="'.$our['3acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 3 Incident Type 4']).'</Description></Ticket>';
}

//Driver 4 Ticket 1***************************************************
if(in_array($our['Driver 4 Incident Type 1'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['4ticket1']='<Ticket Year="'.$our['4acc1_year'].'" Month="'.$our['4acc1_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 1']).'</Description></Ticket>';
}

//Driver 4 Ticket 2***************************************************
if(in_array($our['Driver 4 Incident Type 2'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['4ticket2']='<Ticket Year="'.$our['4acc2_year'].'" Month="'.$our['4acc2_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 2']).'</Description></Ticket>';
}

//Driver 4 Ticket 3***************************************************
if(in_array($our['Driver 4 Incident Type 3'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['4ticket3']='<Ticket Year="'.$our['4acc3_year'].'" Month="'.$our['4acc3_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 3']).'</Description></Ticket>';
}

//Driver 4 Ticket 4***************************************************
if(in_array($our['Driver 4 Incident Type 4'],array("Careless Driving","Defective Equipment","Failure To Obey Signal","Speeding Violation","Ticket Violation Not Listed"))) {
$our['4ticket4']='<Ticket Year="'.$our['4acc4_year'].'" Month="'.$our['4acc4_month'].'"><Description>'.htmlspecialchars($our['Driver 4 Incident Type 4']).'</Description></Ticket>';
}

//Change source insurance co to This or That code*************************
if($our['Driver 1 Insurance Company'] == 'Company Not Listed') $our['inscompany'] = '0';
 else if($our['Driver 1 Insurance Company'] == '21st Century Insurance') $our['inscompany'] = '1';
 else if($our['Driver 1 Insurance Company'] == 'AAA Insurance Co.') $our['inscompany'] = '2';
 else if($our['Driver 1 Insurance Company'] == 'AARP') $our['inscompany'] = '4';
 else if($our['Driver 1 Insurance Company'] == 'AETNA') $our['inscompany'] = '8';
 else if($our['Driver 1 Insurance Company'] == 'AFLAC') $our['inscompany'] = '10';
 else if($our['Driver 1 Insurance Company'] == 'AIG') $our['inscompany'] = '12';
 else if($our['Driver 1 Insurance Company'] == 'AIU Insurance') $our['inscompany'] = '13';
 else if($our['Driver 1 Insurance Company'] == 'Allied') $our['inscompany'] = '17';
 else if($our['Driver 1 Insurance Company'] == 'Allstate Insurance') $our['inscompany'] = '18';
 else if($our['Driver 1 Insurance Company'] == 'American Alliance Insurance') $our['inscompany'] = '19';
 else if($our['Driver 1 Insurance Company'] == 'American Automobile Insurance') $our['inscompany'] = '20';
 else if($our['Driver 1 Insurance Company'] == 'American Casualty') $our['inscompany'] = '22';
 else if($our['Driver 1 Insurance Company'] == 'American Deposit Insurance') $our['inscompany'] = '23';
 else if($our['Driver 1 Insurance Company'] == 'American Direct Business Insurance') $our['inscompany'] = '24';
 else if($our['Driver 1 Insurance Company'] == 'American Empire Insurance') $our['inscompany'] = '26';
 else if($our['Driver 1 Insurance Company'] == 'American Family Insurance') $our['inscompany'] = '27';
 else if($our['Driver 1 Insurance Company'] == 'American Family Mutual') $our['inscompany'] = '27';
 else if($our['Driver 1 Insurance Company'] == 'American Financial') $our['inscompany'] = '28';
 else if($our['Driver 1 Insurance Company'] == 'American Health Underwriters') $our['inscompany'] = '29';
 else if($our['Driver 1 Insurance Company'] == 'American Home Assurance') $our['inscompany'] = '30';
 else if($our['Driver 1 Insurance Company'] == 'American Insurance') $our['inscompany'] = '24';
 else if($our['Driver 1 Insurance Company'] == 'American International Ins') $our['inscompany'] = '32';
 else if($our['Driver 1 Insurance Company'] == 'American International Pacific') $our['inscompany'] = '33';
 else if($our['Driver 1 Insurance Company'] == 'American International South') $our['inscompany'] = '34';
 else if($our['Driver 1 Insurance Company'] == 'American Manufacturers') $our['inscompany'] = '35';
 else if($our['Driver 1 Insurance Company'] == 'American Mayflower Insurance') $our['inscompany'] = '36';
 else if($our['Driver 1 Insurance Company'] == 'American Motorists Insurance') $our['inscompany'] = '38';
 else if($our['Driver 1 Insurance Company'] == 'American National Insurance') $our['inscompany'] = '39';
 else if($our['Driver 1 Insurance Company'] == 'American Premier Insurance') $our['inscompany'] = '41';
 else if($our['Driver 1 Insurance Company'] == 'American Protection Insurance') $our['inscompany'] = '42';
 else if($our['Driver 1 Insurance Company'] == 'American Republic') $our['inscompany'] = '44';
 else if($our['Driver 1 Insurance Company'] == 'American Savers Plan') $our['inscompany'] = '45';
 else if($our['Driver 1 Insurance Company'] == 'American Service Insurance') $our['inscompany'] = '46';
 else if($our['Driver 1 Insurance Company'] == 'American Skyline Insurance Company') $our['inscompany'] = '47';
 else if($our['Driver 1 Insurance Company'] == 'American Spirit Insurance') $our['inscompany'] = '48';
 else if($our['Driver 1 Insurance Company'] == 'American Standard Insurance') $our['inscompany'] = '49';
 else if($our['Driver 1 Insurance Company'] == 'AmeriPlan') $our['inscompany'] = '52';
 else if($our['Driver 1 Insurance Company'] == 'Amica Insurance') $our['inscompany'] = '54';
 else if($our['Driver 1 Insurance Company'] == 'Answer Financial') $our['inscompany'] = '55';
 else if($our['Driver 1 Insurance Company'] == 'Arbella') $our['inscompany'] = '58';
 else if($our['Driver 1 Insurance Company'] == 'Associated Indemnity') $our['inscompany'] = '62';
 else if($our['Driver 1 Insurance Company'] == 'Assurant') $our['inscompany'] = '64';
 else if($our['Driver 1 Insurance Company'] == 'Atlanta Casualty') $our['inscompany'] = '65';
 else if($our['Driver 1 Insurance Company'] == 'Atlantic Indemnity') $our['inscompany'] = '66';
 else if($our['Driver 1 Insurance Company'] == 'Auto Club Insurance Company') $our['inscompany'] = '70';
 else if($our['Driver 1 Insurance Company'] == 'AXA Advisors') $our['inscompany'] = '73';
 else if($our['Driver 1 Insurance Company'] == 'Bankers Life and Casualty') $our['inscompany'] = '76'; 
 else if($our['Driver 1 Insurance Company'] == 'Banner Life') $our['inscompany'] = '77';
 else if($our['Driver 1 Insurance Company'] == 'Best Agency USA') $our['inscompany'] = '78';
 else if($our['Driver 1 Insurance Company'] == 'Blue Cross and Blue Shield') $our['inscompany'] = '80';
 else if($our['Driver 1 Insurance Company'] == 'Brooke Insurance') $our['inscompany'] = '84';
 else if($our['Driver 1 Insurance Company'] == 'Cal Farm Insurance') $our['inscompany'] = '86';
 else if($our['Driver 1 Insurance Company'] == 'California State Automobile Association') $our['inscompany'] = '88';
 else if($our['Driver 1 Insurance Company'] == 'Chubb') $our['inscompany'] = '98';
 else if($our['Driver 1 Insurance Company'] == 'Citizens') $our['inscompany'] = '101';
 else if($our['Driver 1 Insurance Company'] == 'Clarendon American Insurance') $our['inscompany'] = '102';
 else if($our['Driver 1 Insurance Company'] == 'Clarendon National Insurance') $our['inscompany'] = '103';
 else if($our['Driver 1 Insurance Company'] == 'CNA') $our['inscompany'] = '105';
 else if($our['Driver 1 Insurance Company'] == 'Colonial Insurance') $our['inscompany'] = '106';
 else if($our['Driver 1 Insurance Company'] == 'Comparison Market') $our['inscompany'] = '111';
 else if($our['Driver 1 Insurance Company'] == 'Continental Casualty') $our['inscompany'] = '113';
 else if($our['Driver 1 Insurance Company'] == 'Continental Divide Insurance') $our['inscompany'] = '114';
 else if($our['Driver 1 Insurance Company'] == 'Continental Insurance') $our['inscompany'] = '112';
 else if($our['Driver 1 Insurance Company'] == 'Cotton States Insurance') $our['inscompany'] = '115';
 else if($our['Driver 1 Insurance Company'] == 'Country Insurance and Financial Services') $our['inscompany'] = '117';
 else if($our['Driver 1 Insurance Company'] == 'Countrywide Insurance') $our['inscompany'] = '118';
 else if($our['Driver 1 Insurance Company'] == 'CSE Insurance Group') $our['inscompany'] = '121';
 else if($our['Driver 1 Insurance Company'] == 'Dairyland Insurance') $our['inscompany'] = '123';
 else if($our['Driver 1 Insurance Company'] == 'eHealth') $our['inscompany'] = '132';
 else if($our['Driver 1 Insurance Company'] == 'Erie') $our['inscompany'] = '139';
 else if($our['Driver 1 Insurance Company'] == 'Esurance') $our['inscompany'] = '140';
 else if($our['Driver 1 Insurance Company'] == 'Farm Bureau') $our['inscompany'] = '144';
 else if($our['Driver 1 Insurance Company'] == 'Farmers Insurance') $our['inscompany'] = '146';
 else if($our['Driver 1 Insurance Company'] == 'Farmers Union') $our['inscompany'] = '147';
 else if($our['Driver 1 Insurance Company'] == 'FinanceBox.com') $our['inscompany'] = '152';
 else if($our['Driver 1 Insurance Company'] == 'Fire and Casualty Insurance Co of CT') $our['inscompany'] = '154';
 else if($our['Driver 1 Insurance Company'] == 'Firemans Fund') $our['inscompany'] = '155';
 else if($our['Driver 1 Insurance Company'] == 'Foremost') $our['inscompany'] = '162';
 else if($our['Driver 1 Insurance Company'] == 'Foresters') $our['inscompany'] = '163';
 else if($our['Driver 1 Insurance Company'] == 'Geico') $our['inscompany'] = '166';
 else if($our['Driver 1 Insurance Company'] == 'GMAC Insurance') $our['inscompany'] = '171';
 else if($our['Driver 1 Insurance Company'] == 'Golden Rule Insurance') $our['inscompany'] = '173';
 else if($our['Driver 1 Insurance Company'] == 'Government Employees Insurance') $our['inscompany'] = '174';
 else if($our['Driver 1 Insurance Company'] == 'Guaranty National Insurance') $our['inscompany'] = '181';
 else if($our['Driver 1 Insurance Company'] == 'Guide One Insurance') $our['inscompany'] = '183';
 else if($our['Driver 1 Insurance Company'] == 'Hanover Lloyds Insurance Company') $our['inscompany'] = '185';
 else if($our['Driver 1 Insurance Company'] == 'Hartford') $our['inscompany'] = '187';
 else if($our['Driver 1 Insurance Company'] == 'Hartford AARP') $our['inscompany'] = '188'; 
 else if($our['Driver 1 Insurance Company'] == 'Health Benefits Direct') $our['inscompany'] = '190';
 else if($our['Driver 1 Insurance Company'] == 'Health Choice One') $our['inscompany'] = '191';
 else if($our['Driver 1 Insurance Company'] == 'Health Plus of America') $our['inscompany'] = '193';
 else if($our['Driver 1 Insurance Company'] == 'HealthShare American') $our['inscompany'] = '194';
 else if($our['Driver 1 Insurance Company'] == 'Humana') $our['inscompany'] = '197';
 else if($our['Driver 1 Insurance Company'] == 'IFA Auto Insurance') $our['inscompany'] = '200';
 else if($our['Driver 1 Insurance Company'] == 'IGF Insurance') $our['inscompany'] = '201';
 else if($our['Driver 1 Insurance Company'] == 'Infinity Insurance') $our['inscompany'] = '203'; 
 else if($our['Driver 1 Insurance Company'] == 'Insurance Insight') $our['inscompany'] = '205'; 
 else if($our['Driver 1 Insurance Company'] == 'Insurance.com') $our['inscompany'] = '206';
 else if($our['Driver 1 Insurance Company'] == 'Integon') $our['inscompany'] = '207';
 else if($our['Driver 1 Insurance Company'] == 'John Hancock') $our['inscompany'] = '210';
 else if($our['Driver 1 Insurance Company'] == 'Kaiser Permanente') $our['inscompany'] = '211';
 else if($our['Driver 1 Insurance Company'] == 'Kemper') $our['inscompany'] = '212';
 else if($our['Driver 1 Insurance Company'] == 'Landmark American Insurance') $our['inscompany'] = '214';
 else if($our['Driver 1 Insurance Company'] == 'Leader Insurance') $our['inscompany'] = '215';
 else if($our['Driver 1 Insurance Company'] == 'Liberty Insurance Corp') $our['inscompany'] = '217';
 else if($our['Driver 1 Insurance Company'] == 'Liberty National ') $our['inscompany'] = '219';
 else if($our['Driver 1 Insurance Company'] == 'Liberty Northwest Insurance') $our['inscompany'] = '220';
 else if($our['Driver 1 Insurance Company'] == 'Lumbermens Mutual') $our['inscompany'] = '223';
 else if($our['Driver 1 Insurance Company'] == 'Maryland Casualty') $our['inscompany'] = '226';
 else if($our['Driver 1 Insurance Company'] == 'Mass Mutual') $our['inscompany'] = '227';
 else if($our['Driver 1 Insurance Company'] == 'Mega/Midwest') $our['inscompany'] = '229';
 else if($our['Driver 1 Insurance Company'] == 'Mercury') $our['inscompany'] = '232';
 else if($our['Driver 1 Insurance Company'] == 'MetLife') $our['inscompany'] = '233';
 else if($our['Driver 1 Insurance Company'] == 'Mid Century Insurance') $our['inscompany'] = '234';
 else if($our['Driver 1 Insurance Company'] == 'Mid-Continent Casualty') $our['inscompany'] = '235';
 else if($our['Driver 1 Insurance Company'] == 'Middlesex Insurance') $our['inscompany'] = '236';
 else if($our['Driver 1 Insurance Company'] == 'Midland National Life') $our['inscompany'] = '237';
 else if($our['Driver 1 Insurance Company'] == 'Mutual of Omaha') $our['inscompany'] = '254';
 else if($our['Driver 1 Insurance Company'] == 'National Ben Franklin Insurance') $our['inscompany'] = '256';
 else if($our['Driver 1 Insurance Company'] == 'National Casualty') $our['inscompany'] = '257';
 else if($our['Driver 1 Insurance Company'] == 'National Continental Insurance') $our['inscompany'] = '259';
 else if($our['Driver 1 Insurance Company'] == 'National Fire Insurance Company of Hartford') $our['inscompany'] = '260';
 else if($our['Driver 1 Insurance Company'] == 'National Indemnity') $our['inscompany'] = '261';
 else if($our['Driver 1 Insurance Company'] == 'National Union Fire Insurance of LA') $our['inscompany'] = '266';
 else if($our['Driver 1 Insurance Company'] == 'National Union Fire Insurance of PA') $our['inscompany'] = '267';
 else if($our['Driver 1 Insurance Company'] == 'Nationwide') $our['inscompany'] = '268';
 else if($our['Driver 1 Insurance Company'] == 'New England Financial') $our['inscompany'] = '270';
 else if($our['Driver 1 Insurance Company'] == 'New York Life Insurance') $our['inscompany'] = '271';
 else if($our['Driver 1 Insurance Company'] == 'Northwestern Mutual Life') $our['inscompany'] = '282';
 else if($our['Driver 1 Insurance Company'] == 'Northwestern Pacific Indemnity') $our['inscompany'] = '283';
 else if($our['Driver 1 Insurance Company'] == 'Omni Insurance') $our['inscompany'] = '288';
 else if($our['Driver 1 Insurance Company'] == 'Orion Insurance') $our['inscompany'] = '291';
 else if($our['Driver 1 Insurance Company'] == 'Pacific Indemnity') $our['inscompany'] = '293';
 else if($our['Driver 1 Insurance Company'] == 'Pacific Insurance') $our['inscompany'] = '294';
 else if($our['Driver 1 Insurance Company'] == 'Pafco General Insurance') $our['inscompany'] = '295';
 else if($our['Driver 1 Insurance Company'] == 'Patriot General Insurance') $our['inscompany'] = '297';
 else if($our['Driver 1 Insurance Company'] == 'Peak Property and Casualty Insurance') $our['inscompany'] = '298';
 else if($our['Driver 1 Insurance Company'] == 'Pemco') $our['inscompany'] = '299';
 else if($our['Driver 1 Insurance Company'] == 'Physicians') $our['inscompany'] = '304';
 else if($our['Driver 1 Insurance Company'] == 'Progressive') $our['inscompany'] = '313';
 else if($our['Driver 1 Insurance Company'] == 'Prudential') $our['inscompany'] = '316';
 else if($our['Driver 1 Insurance Company'] == 'Reliance Insurance') $our['inscompany'] = '323';
 else if($our['Driver 1 Insurance Company'] == 'Republic Indemnity') $our['inscompany'] = '325';
 else if($our['Driver 1 Insurance Company'] == 'Response Insurance') $our['inscompany'] = '326';
 else if($our['Driver 1 Insurance Company'] == 'Safeco') $our['inscompany'] = '330';
 else if($our['Driver 1 Insurance Company'] == 'Safeway Insurance') $our['inscompany'] = '331';
 else if($our['Driver 1 Insurance Company'] == 'Security Insurance') $our['inscompany'] = '334';
 else if($our['Driver 1 Insurance Company'] == 'Security National') $our['inscompany'] = '335';
 else if($our['Driver 1 Insurance Company'] == 'Sentinel Insurance') $our['inscompany'] = '337';
 else if($our['Driver 1 Insurance Company'] == 'Sentry') $our['inscompany'] = '338';
 else if($our['Driver 1 Insurance Company'] == 'Shelter Insurance Co.') $our['inscompany'] = '339';
 else if($our['Driver 1 Insurance Company'] == 'St. Paul') $our['inscompany'] = '342';
 else if($our['Driver 1 Insurance Company'] == 'Standard Fire Insurance Company') $our['inscompany'] = '343';
 else if($our['Driver 1 Insurance Company'] == 'State and County Mutual Fire Insurance') $our['inscompany'] = '345';
 else if($our['Driver 1 Insurance Company'] == 'State Farm') $our['inscompany'] = '347';
 else if($our['Driver 1 Insurance Company'] == 'State National Insurance') $our['inscompany'] = '349';
 else if($our['Driver 1 Insurance Company'] == 'Superior') $our['inscompany'] = '351';
 else if($our['Driver 1 Insurance Company'] == 'Superior Guaranty Insurance') $our['inscompany'] = '352';
 else if($our['Driver 1 Insurance Company'] == 'Sure Health Plans') $our['inscompany'] = '353';
 else if($our['Driver 1 Insurance Company'] == 'The Ahbe Group') $our['inscompany'] = '355';
 else if($our['Driver 1 Insurance Company'] == 'The General') $our['inscompany'] = '357';
 else if($our['Driver 1 Insurance Company'] == 'TICO Insurance') $our['inscompany'] = '358';
 else if($our['Driver 1 Insurance Company'] == 'TIG Countrywide Insurance') $our['inscompany'] = '359';
 else if($our['Driver 1 Insurance Company'] == 'Titan') $our['inscompany'] = '360';
 else if($our['Driver 1 Insurance Company'] == 'TransAmerica') $our['inscompany'] = '363';
 else if($our['Driver 1 Insurance Company'] == 'Travelers') $our['inscompany'] = '364';
 else if($our['Driver 1 Insurance Company'] == 'Tri-State Consumer') $our['inscompany'] = '366';
 else if($our['Driver 1 Insurance Company'] == 'Twin City Fire Insurance') $our['inscompany'] = '369';
 else if($our['Driver 1 Insurance Company'] == 'UniCare') $our['inscompany'] = '370';
 else if($our['Driver 1 Insurance Company'] == 'United American') $our['inscompany'] = '373';
 else if($our['Driver 1 Insurance Company'] == 'United Security') $our['inscompany'] = '378';
 else if($our['Driver 1 Insurance Company'] == 'United Services Auto') $our['inscompany'] = '379';
 else if($our['Driver 1 Insurance Company'] == 'Unitrin') $our['inscompany'] = '381';
 else if($our['Driver 1 Insurance Company'] == 'Universal Underwriters Insurance') $our['inscompany'] = '382';
 else if($our['Driver 1 Insurance Company'] == 'US Financial') $our['inscompany'] = '383';
 else if($our['Driver 1 Insurance Company'] == 'USA Benefits/Continental General') $our['inscompany'] = '385';
 else if($our['Driver 1 Insurance Company'] == 'USAA') $our['inscompany'] = '386';
 else if($our['Driver 1 Insurance Company'] == 'USF and G') $our['inscompany'] = '387';
 else if($our['Driver 1 Insurance Company'] == 'Viking') $our['inscompany'] = '393';
 else if($our['Driver 1 Insurance Company'] == 'Western and Southern Life') $our['inscompany'] = '401';
 else if($our['Driver 1 Insurance Company'] == 'Western Mutual') $our['inscompany'] = '402';
 else if($our['Driver 1 Insurance Company'] == 'Windsor') $our['inscompany'] = '407';
 else if($our['Driver 1 Insurance Company'] == 'Woodlands Financial Group') $our['inscompany'] = '410';
 else if($our['Driver 1 Insurance Company'] == 'Zurich North America') $our['inscompany'] = '416';
 else if($our['Driver 1 Insurance Company'] == 'Armed Forces Insurance ') $our['inscompany'] = '60';
 else $our['inscompany'] = '0';
 
 //Match our occupations to their occupation list driver 1****************************************************************//
if($our['Driver 1 Occupation'] == 'Advertising') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Arts/Entertainment') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Banking/Mortgage') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Clerical/Administrative') $our['Driver 1 Occupation'] = 'Administrative Clerical';
elseif($our['Driver 1 Occupation'] == 'Banking/Mortgage') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Clergy/Religious') $our['Driver 1 Occupation'] = 'Clergy';
elseif($our['Driver 1 Occupation'] == 'Construction/Facilities') $our['Driver 1 Occupation'] = 'Construction Trades';
elseif($our['Driver 1 Occupation'] == 'Customer Service') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Education/Training') $our['Driver 1 Occupation'] = 'Professional Salaried';
elseif($our['Driver 1 Occupation'] == 'Engineer/Architect') $our['Driver 1 Occupation'] = 'Engineer';
elseif($our['Driver 1 Occupation'] == 'Government') $our['Driver 1 Occupation'] = 'Not Listed';
elseif($our['Driver 1 Occupation'] == 'Hospitality/Travel') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Human Resources') $our['Driver 1 Occupation'] = 'Human Relations';
elseif($our['Driver 1 Occupation'] == 'Insurance') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Internet/New Media') $our['Driver 1 Occupation'] = 'Other Technical';
elseif($our['Driver 1 Occupation'] == 'Law Enforcement') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Legal') $our['Driver 1 Occupation'] = 'Lawyer';
elseif($our['Driver 1 Occupation'] == 'Management Consulting') $our['Driver 1 Occupation'] = 'Consultant';
elseif($our['Driver 1 Occupation'] == 'Management') $our['Driver 1 Occupation'] = 'Consultant';
elseif($our['Driver 1 Occupation'] == 'Manufacturing') $our['Driver 1 Occupation'] = 'Skilled Semi Skilled';
elseif($our['Driver 1 Occupation'] == 'Military/Defense') $our['Driver 1 Occupation'] = 'Military Enlisted';
elseif($our['Driver 1 Occupation'] == 'Non-Profit/Volunteer') $our['Driver 1 Occupation'] = 'Not Listed';
elseif($our['Driver 1 Occupation'] == 'Pharmaceutical/Biotech') $our['Driver 1 Occupation'] = 'Other Technical';
elseif($our['Driver 1 Occupation'] == 'Real Estate') $our['Driver 1 Occupation'] = 'Other Non Technical';
elseif($our['Driver 1 Occupation'] == 'Restaurant/Food Service') $our['Driver 1 Occupation'] = 'Skilled Semi Skilled';
elseif($our['Driver 1 Occupation'] == 'Sales') $our['Driver 1 Occupation'] = 'Sales Inside';
elseif($our['Driver 1 Occupation'] == 'Technology') $our['Driver 1 Occupation'] = 'Other Technical';
elseif($our['Driver 1 Occupation'] == 'Telecommunications') $our['Driver 1 Occupation'] = 'Other Technical';
elseif($our['Driver 1 Occupation'] == 'Transportation') $our['Driver 1 Occupation'] = 'Transportation or Logistics';
elseif($our['Driver 1 Occupation'] == 'Other/Not Listed') $our['Driver 1 Occupation'] = 'Not Listed';
elseif($our['Driver 1 Occupation'] == '') $our['Driver 1 Occupation'] = 'Other Non Technical';

 //Match our occupations to their occupation list driver 2
if($our['Driver 2 Occupation'] == 'Advertising') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Arts/Entertainment') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Banking/Mortgage') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Clerical/Administrative') $our['Driver 2 Occupation'] = 'Administrative Clerical';
elseif($our['Driver 2 Occupation'] == 'Banking/Mortgage') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Clergy/Religious') $our['Driver 2 Occupation'] = 'Clergy';
elseif($our['Driver 2 Occupation'] == 'Construction/Facilities') $our['Driver 2 Occupation'] = 'Construction Trades';
elseif($our['Driver 2 Occupation'] == 'Customer Service') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Education/Training') $our['Driver 2 Occupation'] = 'Professional Salaried';
elseif($our['Driver 2 Occupation'] == 'Engineer/Architect') $our['Driver 2 Occupation'] = 'Engineer';
elseif($our['Driver 2 Occupation'] == 'Government') $our['Driver 2 Occupation'] = 'Not Listed';
elseif($our['Driver 2 Occupation'] == 'Hospitality/Travel') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Human Resources') $our['Driver 2 Occupation'] = 'Human Relations';
elseif($our['Driver 2 Occupation'] == 'Insurance') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Internet/New Media') $our['Driver 2 Occupation'] = 'Other Technical';
elseif($our['Driver 2 Occupation'] == 'Law Enforcement') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Legal') $our['Driver 2 Occupation'] = 'Lawyer';
elseif($our['Driver 2 Occupation'] == 'Management Consulting') $our['Driver 2 Occupation'] = 'Consultant';
elseif($our['Driver 2 Occupation'] == 'Management') $our['Driver 2 Occupation'] = 'Consultant';
elseif($our['Driver 2 Occupation'] == 'Manufacturing') $our['Driver 2 Occupation'] = 'Skilled Semi Skilled';
elseif($our['Driver 2 Occupation'] == 'Military/Defense') $our['Driver 2 Occupation'] = 'Military Enlisted';
elseif($our['Driver 2 Occupation'] == 'Non-Profit/Volunteer') $our['Driver 2 Occupation'] = 'Not Listed';
elseif($our['Driver 2 Occupation'] == 'Pharmaceutical/Biotech') $our['Driver 2 Occupation'] = 'Other Technical';
elseif($our['Driver 2 Occupation'] == 'Real Estate') $our['Driver 2 Occupation'] = 'Other Non Technical';
elseif($our['Driver 2 Occupation'] == 'Restaurant/Food Service') $our['Driver 2 Occupation'] = 'Skilled Semi Skilled';
elseif($our['Driver 2 Occupation'] == 'Sales') $our['Driver 2 Occupation'] = 'Sales Inside';
elseif($our['Driver 2 Occupation'] == 'Technology') $our['Driver 2 Occupation'] = 'Other Technical';
elseif($our['Driver 2 Occupation'] == 'Telecommunications') $our['Driver 2 Occupation'] = 'Other Technical';
elseif($our['Driver 2 Occupation'] == 'Transportation') $our['Driver 2 Occupation'] = 'Transportation or Logistics';
elseif($our['Driver 2 Occupation'] == 'Other/Not Listed') $our['Driver 2 Occupation'] = 'Not Listed';
elseif($our['Driver 2 Occupation'] == '') $our['Driver 2 Occupation'] = 'Other Non Technical';

 //Match our occupations to their occupation list driver 3
if($our['Driver 3 Occupation'] == 'Advertising') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Arts/Entertainment') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Banking/Mortgage') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Clerical/Administrative') $our['Driver 3 Occupation'] = 'Administrative Clerical';
elseif($our['Driver 3 Occupation'] == 'Banking/Mortgage') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Clergy/Religious') $our['Driver 3 Occupation'] = 'Clergy';
elseif($our['Driver 3 Occupation'] == 'Construction/Facilities') $our['Driver 3 Occupation'] = 'Construction Trades';
elseif($our['Driver 3 Occupation'] == 'Customer Service') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Education/Training') $our['Driver 3 Occupation'] = 'Professional Salaried';
elseif($our['Driver 3 Occupation'] == 'Engineer/Architect') $our['Driver 3 Occupation'] = 'Engineer';
elseif($our['Driver 3 Occupation'] == 'Government') $our['Driver 3 Occupation'] = 'Not Listed';
elseif($our['Driver 3 Occupation'] == 'Hospitality/Travel') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Human Resources') $our['Driver 3 Occupation'] = 'Human Relations';
elseif($our['Driver 3 Occupation'] == 'Insurance') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Internet/New Media') $our['Driver 3 Occupation'] = 'Other Technical';
elseif($our['Driver 3 Occupation'] == 'Law Enforcement') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Legal') $our['Driver 3 Occupation'] = 'Lawyer';
elseif($our['Driver 3 Occupation'] == 'Management Consulting') $our['Driver 3 Occupation'] = 'Consultant';
elseif($our['Driver 3 Occupation'] == 'Management') $our['Driver 3 Occupation'] = 'Consultant';
elseif($our['Driver 3 Occupation'] == 'Manufacturing') $our['Driver 3 Occupation'] = 'Skilled Semi Skilled';
elseif($our['Driver 3 Occupation'] == 'Military/Defense') $our['Driver 3 Occupation'] = 'Military Enlisted';
elseif($our['Driver 3 Occupation'] == 'Non-Profit/Volunteer') $our['Driver 3 Occupation'] = 'Not Listed';
elseif($our['Driver 3 Occupation'] == 'Pharmaceutical/Biotech') $our['Driver 3 Occupation'] = 'Other Technical';
elseif($our['Driver 3 Occupation'] == 'Real Estate') $our['Driver 3 Occupation'] = 'Other Non Technical';
elseif($our['Driver 3 Occupation'] == 'Restaurant/Food Service') $our['Driver 3 Occupation'] = 'Skilled Semi Skilled';
elseif($our['Driver 3 Occupation'] == 'Sales') $our['Driver 3 Occupation'] = 'Sales Inside';
elseif($our['Driver 3 Occupation'] == 'Technology') $our['Driver 3 Occupation'] = 'Other Technical';
elseif($our['Driver 3 Occupation'] == 'Telecommunications') $our['Driver 3 Occupation'] = 'Other Technical';
elseif($our['Driver 3 Occupation'] == 'Transportation') $our['Driver 3 Occupation'] = 'Transportation or Logistics';
elseif($our['Driver 3 Occupation'] == 'Other/Not Listed') $our['Driver 3 Occupation'] = 'Not Listed';
elseif($our['Driver 3 Occupation'] == '') $our['Driver 3 Occupation'] = 'Other Non Technical';

 //Match our occupations to their occupation list driver 4
if($our['Driver 4 Occupation'] == 'Advertising') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Arts/Entertainment') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Banking/Mortgage') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Clerical/Administrative') $our['Driver 4 Occupation'] = 'Administrative Clerical';
elseif($our['Driver 4 Occupation'] == 'Banking/Mortgage') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Clergy/Religious') $our['Driver 4 Occupation'] = 'Clergy';
elseif($our['Driver 4 Occupation'] == 'Construction/Facilities') $our['Driver 4 Occupation'] = 'Construction Trades';
elseif($our['Driver 4 Occupation'] == 'Customer Service') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Education/Training') $our['Driver 4 Occupation'] = 'Professional Salaried';
elseif($our['Driver 4 Occupation'] == 'Engineer/Architect') $our['Driver 4 Occupation'] = 'Engineer';
elseif($our['Driver 4 Occupation'] == 'Government') $our['Driver 4 Occupation'] = 'Not Listed';
elseif($our['Driver 4 Occupation'] == 'Hospitality/Travel') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Human Resources') $our['Driver 4 Occupation'] = 'Human Relations';
elseif($our['Driver 4 Occupation'] == 'Insurance') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Internet/New Media') $our['Driver 4 Occupation'] = 'Other Technical';
elseif($our['Driver 4 Occupation'] == 'Law Enforcement') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Legal') $our['Driver 4 Occupation'] = 'Lawyer';
elseif($our['Driver 4 Occupation'] == 'Management Consulting') $our['Driver 4 Occupation'] = 'Consultant';
elseif($our['Driver 4 Occupation'] == 'Management') $our['Driver 4 Occupation'] = 'Consultant';
elseif($our['Driver 4 Occupation'] == 'Manufacturing') $our['Driver 4 Occupation'] = 'Skilled Semi Skilled';
elseif($our['Driver 4 Occupation'] == 'Military/Defense') $our['Driver 4 Occupation'] = 'Military Enlisted';
elseif($our['Driver 4 Occupation'] == 'Non-Profit/Volunteer') $our['Driver 4 Occupation'] = 'Not Listed';
elseif($our['Driver 4 Occupation'] == 'Pharmaceutical/Biotech') $our['Driver 4 Occupation'] = 'Other Technical';
elseif($our['Driver 4 Occupation'] == 'Real Estate') $our['Driver 4 Occupation'] = 'Other Non Technical';
elseif($our['Driver 4 Occupation'] == 'Restaurant/Food Service') $our['Driver 4 Occupation'] = 'Skilled Semi Skilled';
elseif($our['Driver 4 Occupation'] == 'Sales') $our['Driver 4 Occupation'] = 'Sales Inside';
elseif($our['Driver 4 Occupation'] == 'Technology') $our['Driver 4 Occupation'] = 'Other Technical';
elseif($our['Driver 4 Occupation'] == 'Telecommunications') $our['Driver 4 Occupation'] = 'Other Technical';
elseif($our['Driver 4 Occupation'] == 'Transportation') $our['Driver 4 Occupation'] = 'Transportation or Logistics';
elseif($our['Driver 4 Occupation'] == 'Other/Not Listed') $our['Driver 4 Occupation'] = 'Not Listed';
elseif($our['Driver 4 Occupation'] == '') $our['Driver 4 Occupation'] = 'Other Non Technical';

//Match education driver 1***************************************************************************//
if($our['Driver 1 Education'] == 'High School') $our['Driver 1 Education'] = 'HighSchool Diploma';
elseif($our['Driver 1 Education'] == 'Other Degree') $our['Driver 1 Education'] = 'Other Professional Degree';
elseif($our['Driver 1 Education'] == 'Some Or No High School') $our['Driver 1 Education'] = 'Some Or No HighSchool';
elseif($our['Driver 1 Education'] == 'Professional Degree') $our['Driver 1 Education'] = 'Other Professional Degree';
elseif($our['Driver 1 Education'] == 'Other Non Professional Degree') $our['Driver 1 Education'] = 'Other NonProfessional Degree';
elseif($our['Driver 1 Education'] == 'Unknown') $our['Driver 1 Education'] = 'Other';
elseif($our['Driver 1 Education'] == 'Doctoral Degree') $our['Driver 1 Education'] = 'Doctorate Degree';
elseif(empty($our['Driver 1 Education'])) $our['Driver 1 Education'] = 'Other';

//Match education driver 2
if($our['Driver 2 Education'] == 'High School') $our['Driver 2 Education'] = 'HighSchool Diploma';
elseif($our['Driver 2 Education'] == 'Other Degree') $our['Driver 2 Education'] = 'Other Professional Degree';
elseif($our['Driver 2 Education'] == 'Some Or No High School') $our['Driver 2 Education'] = 'Some Or No HighSchool';
elseif($our['Driver 2 Education'] == 'Professional Degree') $our['Driver 2 Education'] = 'Other Professional Degree';
elseif($our['Driver 2 Education'] == 'Other Non Professional Degree') $our['Driver 2 Education'] = 'Other NonProfessional Degree';
elseif($our['Driver 2 Education'] == 'Unknown') $our['Driver 2 Education'] = 'Other';
elseif($our['Driver 2 Education'] == 'Doctoral Degree') $our['Driver 2 Education'] = 'Doctorate Degree';
elseif(empty($our['Driver 2 Education'])) $our['Driver 2 Education'] = 'Other';

//Match education driver 3
if($our['Driver 3 Education'] == 'High School') $our['Driver 3 Education'] = 'HighSchool Diploma';
elseif($our['Driver 3 Education'] == 'Other Degree') $our['Driver 3 Education'] = 'Other Professional Degree';
elseif($our['Driver 3 Education'] == 'Some Or No High School') $our['Driver 3 Education'] = 'Some Or No HighSchool';
elseif($our['Driver 3 Education'] == 'Professional Degree') $our['Driver 3 Education'] = 'Other Professional Degree';
elseif($our['Driver 3 Education'] == 'Other Non Professional Degree') $our['Driver 3 Education'] = 'Other NonProfessional Degree';
elseif($our['Driver 3 Education'] == 'Unknown') $our['Driver 3 Education'] = 'Other';
elseif($our['Driver 3 Education'] == 'Doctoral Degree') $our['Driver 3 Education'] = 'Doctorate Degree';
elseif(empty($our['Driver 3 Education'])) $our['Driver 3 Education'] = 'Other';

//Match education driver 4
if($our['Driver 4 Education'] == 'High School') $our['Driver 4 Education'] = 'HighSchool Diploma';
elseif($our['Driver 4 Education'] == 'Other Degree') $our['Driver 4 Education'] = 'Other Professional Degree';
elseif($our['Driver 4 Education'] == 'Some Or No High School') $our['Driver 4 Education'] = 'Some Or No HighSchool';
elseif($our['Driver 4 Education'] == 'Professional Degree') $our['Driver 4 Education'] = 'Other Professional Degree';
elseif($our['Driver 4 Education'] == 'Other Non Professional Degree') $our['Driver 4 Education'] = 'Other NonProfessional Degree';
elseif($our['Driver 4 Education'] == 'Unknown') $our['Driver 4 Education'] = 'Other';
elseif($our['Driver 4 Education'] == 'Doctoral Degree') $our['Driver 4 Education'] = 'Doctorate Degree';
elseif(empty($our['Driver 4 Education'])) $our['Driver 4 Education'] = 'Other';

//If license suspended empty, answer no***************************************************************************//
if(empty($our['Driver 1 Suspended Or Revoked In The Past 5 Years'])) $our['Driver 1 Suspended Or Revoked In The Past 5 Years'] = 'No';
if(empty($our['Driver 2 Suspended Or Revoked In The Past 5 Years'])) $our['Driver 2 Suspended Or Revoked In The Past 5 Years'] = 'No';
if(empty($our['Driver 3 Suspended Or Revoked In The Past 5 Years'])) $our['Driver 3 Suspended Or Revoked In The Past 5 Years'] = 'No';
if(empty($our['Driver 4 Suspended Or Revoked In The Past 5 Years'])) $our['Driver 4 Suspended Or Revoked In The Past 5 Years'] = 'No';

//Correct revoked, if turue/false to boolean
if($our['Driver 1 Suspended Or Revoked In The Past 5 Years']== 'true') $our['Driver 1 Suspended Or Revoked In The Past 5 Years']= 'Yes';
if($our['Driver 2 Suspended Or Revoked In The Past 5 Years']== 'true') $our['Driver 2 Suspended Or Revoked In The Past 5 Years']= 'Yes';
if($our['Driver 3 Suspended Or Revoked In The Past 5 Years']== 'true') $our['Driver 3 Suspended Or Revoked In The Past 5 Years']= 'Yes';
if($our['Driver 4 Suspended Or Revoked In The Past 5 Years']== 'true') $our['Driver 4 Suspended Or Revoked In The Past 5 Years']= 'Yes';

if($our['Driver 1 Suspended Or Revoked In The Past 5 Years']== 'false') $our['Driver 1 Suspended Or Revoked In The Past 5 Years']= 'No';
if($our['Driver 2 Suspended Or Revoked In The Past 5 Years']== 'false') $our['Driver 2 Suspended Or Revoked In The Past 5 Years']= 'No';
if($our['Driver 3 Suspended Or Revoked In The Past 5 Years']== 'false') $our['Driver 3 Suspended Or Revoked In The Past 5 Years']= 'No';
if($our['Driver 4 Suspended Or Revoked In The Past 5 Years']== 'false') $our['Driver 4 Suspended Or Revoked In The Past 5 Years']= 'No';

//If SR22 empty answer no, reconcile, Driver 1***************************************************************************//
if(empty($our['Driver 1 Filing Required'])) $our['Driver 1 Filing Required'] = 'No';
if(empty($our['Driver 2 Filing Required'])) $our['Driver 2 Filing Required'] = 'No';
if(empty($our['Driver 3 Filing Required'])) $our['Driver 3 Filing Required'] = 'No';
if(empty($our['Driver 4 Filing Required'])) $our['Driver 4 Filing Required'] = 'No';

if($our['Driver 1 Filing Required']== 'SR-1P') $our['Driver 1 Filing Required']= 'Yes';
elseif($our['Driver 1 Filing Required']== 'SR-22') $our['Driver 1 Filing Required']= 'Yes';
else $our['Driver 1 Filing Required']= 'No';

//Driver 2
if($our['Driver 2 Filing Required']== 'SR-1P') $our['Driver 2 Filing Required']= 'Yes';
elseif($our['Driver 2 Filing Required']== 'SR-22') $our['Driver 2 Filing Required']= 'Yes';
else $our['Driver 2 Filing Required']= 'No';

//Driver 3
if($our['Driver 3 Filing Required']== 'SR-1P') $our['Driver 3 Filing Required']= 'Yes';
elseif($our['Driver 3 Filing Required']== 'SR-22') $our['Driver 3 Filing Required']= 'Yes';
else $our['Driver 3 Filing Required']= 'No';

//Driver 4
if($our['Driver 4 Filing Required']== 'SR-1P') $our['Driver 4 Filing Required']= 'Yes';
elseif($our['Driver 4 Filing Required']== 'SR-22') $our['Driver 4 Filing Required']= 'Yes';
else $our['Driver 4 Filing Required']= 'No';

//Matched Owned with yes or no***************************************************************************//
if($our['Driver 1 Ownership'] == 'Owned') $our['Driver 1 Ownership'] = 'Yes';
else $our['Driver 1 Ownership'] = 'No'; 
if($our['Driver 2 Ownership'] == 'Owned') $our['Driver 2 Ownership'] = 'Yes';
else $our['Driver 2 Ownership'] = 'No'; 
if($our['Driver 3 Ownership'] == 'Owned') $our['Driver 3 Ownership'] = 'Yes';
else $our['Driver 3 Ownership'] = 'No'; 
if($our['Driver 4 Ownership'] == 'Owned') $our['Driver 4 Ownership'] = 'Yes';
else $our['Driver 4 Ownership'] = 'No';

//Match vehicle use miles driver 1***************************************************************************//

if ($our['Driver 1 Annual Mileage'] == '0 - 5,000') $our['Driver 1 Annual Mileage'] ='5000';
if ($our['Driver 1 Annual Mileage'] == '5,001 - 7,500') $our['Driver 1 Annual Mileage'] ='7500';
if ($our['Driver 1 Annual Mileage'] == '7,501 - 10,000') $our['Driver 1 Annual Mileage'] ='10000';
if ($our['Driver 1 Annual Mileage'] == '10,001 - 12,500') $our['Driver 1 Annual Mileage'] ='12500';
if ($our['Driver 1 Annual Mileage'] == '12,501 - 15,000') $our['Driver 1 Annual Mileage'] ='12500';
if ($our['Driver 1 Annual Mileage'] == '15,001 - 20,000') $our['Driver 1 Annual Mileage'] ='20000';
if ($our['Driver 1 Annual Mileage'] == '20,001 - 25,000') $our['Driver 1 Annual Mileage'] ='25000';
if ($our['Driver 1 Annual Mileage'] == '25,001 - 30,000') $our['Driver 1 Annual Mileage'] ='30000';

//Match vehicle use miles driver 2
if ($our['Driver 2 Annual Mileage'] == '0 - 5,000') $our['Driver 2 Annual Mileage'] ='5000';
if ($our['Driver 2 Annual Mileage'] == '5,001 - 7,500') $our['Driver 2 Annual Mileage'] ='7500';
if ($our['Driver 2 Annual Mileage'] == '7,501 - 10,000') $our['Driver 2 Annual Mileage'] ='10000';
if ($our['Driver 2 Annual Mileage'] == '10,001 - 12,500') $our['Driver 2 Annual Mileage'] ='12500';
if ($our['Driver 2 Annual Mileage'] == '12,501 - 15,000') $our['Driver 2 Annual Mileage'] ='12500';
if ($our['Driver 2 Annual Mileage'] == '15,001 - 20,000') $our['Driver 2 Annual Mileage'] ='20000';
if ($our['Driver 2 Annual Mileage'] == '20,001 - 25,000') $our['Driver 2 Annual Mileage'] ='25000';
if ($our['Driver 2 Annual Mileage'] == '25,001 - 30,000') $our['Driver 2 Annual Mileage'] ='30000';

//Match vehicle use miles driver 3
if ($our['Driver 3 Annual Mileage'] == '0 - 5,000') $our['Driver 3 Annual Mileage'] ='5000';
if ($our['Driver 3 Annual Mileage'] == '5,001 - 7,500') $our['Driver 3 Annual Mileage'] ='7500';
if ($our['Driver 3 Annual Mileage'] == '7,501 - 10,000') $our['Driver 3 Annual Mileage'] ='10000';
if ($our['Driver 3 Annual Mileage'] == '10,001 - 12,500') $our['Driver 3 Annual Mileage'] ='12500';
if ($our['Driver 3 Annual Mileage'] == '12,501 - 15,000') $our['Driver 3 Annual Mileage'] ='12500';
if ($our['Driver 3 Annual Mileage'] == '15,001 - 20,000') $our['Driver 3 Annual Mileage'] ='20000';
if ($our['Driver 3 Annual Mileage'] == '20,001 - 25,000') $our['Driver 3 Annual Mileage'] ='25000';
if ($our['Driver 3 Annual Mileage'] == '25,001 - 30,000') $our['Driver 3 Annual Mileage'] ='30000';

//Match vehicle use miles driver 4
if ($our['Driver 4 Annual Mileage'] == '0 - 5,000') $our['Driver 4 Annual Mileage'] ='5000';
if ($our['Driver 4 Annual Mileage'] == '5,001 - 7,500') $our['Driver 4 Annual Mileage'] ='7500';
if ($our['Driver 4 Annual Mileage'] == '7,501 - 10,000') $our['Driver 4 Annual Mileage'] ='10000';
if ($our['Driver 4 Annual Mileage'] == '10,001 - 12,500') $our['Driver 4 Annual Mileage'] ='12500';
if ($our['Driver 4 Annual Mileage'] == '12,501 - 15,000') $our['Driver 4 Annual Mileage'] ='12500';
if ($our['Driver 4 Annual Mileage'] == '15,001 - 20,000') $our['Driver 4 Annual Mileage'] ='20000';
if ($our['Driver 4 Annual Mileage'] == '20,001 - 25,000') $our['Driver 4 Annual Mileage'] ='25000';
if ($our['Driver 4 Annual Mileage'] == '25,001 - 30,000') $our['Driver 4 Annual Mileage'] ='30000';

//Match daily mileage, set to 20 if none supplied***************************************************************************//
if(!empty($our['Driver 1 Year Of Vehicle']) && empty($our['Driver 1 Average One Way Mileage'])) $our['Driver 1 Average One Way Mileage'] ='20';
if(!empty($our['Driver 2 Year Of Vehicle']) && empty($our['Driver 2 Average One Way Mileage'])) $our['Driver 2 Average One Way Mileage'] ='20';
if(!empty($our['Driver 3 Year Of Vehicle']) && empty($our['Driver 3 Average One Way Mileage'])) $our['Driver 3 Average One Way Mileage'] ='20';
if(!empty($our['Driver 4 Year Of Vehicle']) && empty($our['Driver 4 Average One Way Mileage'])) $our['Driver 4 Average One Way Mileage'] ='20';

//Match primary use driver 1***************************************************************************//
if ($our['Driver 1 Primary Use'] == 'Commute To/From Work') $our['Driver 1 Primary Use'] = 'CommuteWork';
if ($our['Driver 1 Primary Use'] == 'Commute To/From School')  $our['Driver 1 Primary Use'] = 'CommuteSchool';
if ($our['Driver 1 Primary Use'] == 'Government') $our['Driver 1 Primary Use'] = 'Business';
if ($our['Driver 1 Primary Use'] == 'Farm') $our['Driver 1 Primary Use'] = 'Business';
if ($our['Driver 1 Primary Use'] == 'Commute') $our['Driver 1 Primary Use'] = 'CommuteWork';


//Match primary use driver 2
if ($our['Driver 2 Primary Use'] == 'Commute To/From Work') $our['Driver 2 Primary Use'] = 'CommuteWork';
if ($our['Driver 2 Primary Use'] == 'Commute To/From School')  $our['Driver 2 Primary Use'] = 'CommuteSchool';
if ($our['Driver 2 Primary Use'] == 'Government') $our['Driver 2 Primary Use'] = 'Business';
if ($our['Driver 2 Primary Use'] == 'Farm') $our['Driver 2 Primary Use'] = 'Business';
if ($our['Driver 2 Primary Use'] == 'Commute') $our['Driver 2 Primary Use'] = 'CommuteWork';

//Match primary use driver 3
if ($our['Driver 3 Primary Use'] == 'Commute To/From Work') $our['Driver 3 Primary Use'] = 'CommuteWork';
if ($our['Driver 3 Primary Use'] == 'Commute To/From School')  $our['Driver 3 Primary Use'] = 'CommuteSchool';
if ($our['Driver 3 Primary Use'] == 'Government') $our['Driver 3 Primary Use'] = 'Business';
if ($our['Driver 3 Primary Use'] == 'Farm') $our['Driver 3 Primary Use'] = 'Business';
if ($our['Driver 3 Primary Use'] == 'Commute') $our['Driver 3 Primary Use'] = 'CommuteWork';

//Match primary use driver 4
if ($our['Driver 4 Primary Use'] == 'Commute To/From Work') $our['Driver 4 Primary Use'] = 'CommuteWork';
if ($our['Driver 4 Primary Use'] == 'Commute To/From School')  $our['Driver 4 Primary Use'] = 'CommuteSchool';
if ($our['Driver 4 Primary Use'] == 'Government') $our['Driver 4 Primary Use'] = 'Business';
if ($our['Driver 4 Primary Use'] == 'Farm') $our['Driver 4 Primary Use'] = 'Business';
if ($our['Driver 4 Primary Use'] == 'Commute') $our['Driver 4 Primary Use'] = 'CommuteWork';

//Set comprehensive deductible***************************************************************************//
if (empty($our['Driver 1 Current Comprehensive Deductible'])) $our['Driver 1 Current Comprehensive Deductible'] ='No Coverage';
if (empty($our['Driver 2 Current Comprehensive Deductible'])) $our['Driver 2 Current Comprehensive Deductible'] ='No Coverage';
if (empty($our['Driver 3 Current Comprehensive Deductible'])) $our['Driver 3 Current Comprehensive Deductible'] ='No Coverage';
if (empty($our['Driver 4 Current Comprehensive Deductible'])) $our['Driver 4 Current Comprehensive Deductible'] ='No Coverage';

if ($our['Driver 1 Current Comprehensive Deductible'] == 'No Deductible') $our['Driver 1 Current Comprehensive Deductible']='100';
if ($our['Driver 2 Current Comprehensive Deductible'] == 'No Deductible') $our['Driver 2 Current Comprehensive Deductible']='100';
if ($our['Driver 3 Current Comprehensive Deductible'] == 'No Deductible') $our['Driver 3 Current Comprehensive Deductible']='100';
if ($our['Driver 4 Current Comprehensive Deductible'] == 'No Deductible') $our['Driver 4 Current Comprehensive Deductible']='100';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$50') $our['Driver 1 Current Comprehensive Deductible'] = '100';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$50') $our['Driver 2 Current Comprehensive Deductible'] = '100';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$50') $our['Driver 3 Current Comprehensive Deductible'] = '100';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$50') $our['Driver 4 Current Comprehensive Deductible'] = '100';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$100') $our['Driver 1 Current Comprehensive Deductible'] = '100';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$100') $our['Driver 2 Current Comprehensive Deductible'] = '100';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$100') $our['Driver 3 Current Comprehensive Deductible'] = '100';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$100') $our['Driver 4 Current Comprehensive Deductible'] = '100';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$150') $our['Driver 1 Current Comprehensive Deductible'] = '100';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$150') $our['Driver 2 Current Comprehensive Deductible'] = '100';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$150') $our['Driver 3 Current Comprehensive Deductible'] = '100';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$150') $our['Driver 4 Current Comprehensive Deductible'] = '100';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$200') $our['Driver 1 Current Comprehensive Deductible'] = '200';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$200') $our['Driver 2 Current Comprehensive Deductible'] = '200';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$200') $our['Driver 3 Current Comprehensive Deductible'] = '200';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$200') $our['Driver 4 Current Comprehensive Deductible'] = '200';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$250') $our['Driver 1 Current Comprehensive Deductible'] = '250';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$250') $our['Driver 2 Current Comprehensive Deductible'] = '250';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$250') $our['Driver 3 Current Comprehensive Deductible'] = '250';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$250') $our['Driver 4 Current Comprehensive Deductible'] = '250';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$500') $our['Driver 1 Current Comprehensive Deductible'] = '500';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$500') $our['Driver 2 Current Comprehensive Deductible'] = '500';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$500') $our['Driver 3 Current Comprehensive Deductible'] = '500';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$500') $our['Driver 4 Current Comprehensive Deductible'] = '500';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$750') $our['Driver 1 Current Comprehensive Deductible'] = '500';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$750') $our['Driver 2 Current Comprehensive Deductible'] = '500';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$750') $our['Driver 3 Current Comprehensive Deductible'] = '500';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$750') $our['Driver 4 Current Comprehensive Deductible'] = '500';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$1000') $our['Driver 1 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$1000') $our['Driver 2 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$1000') $our['Driver 3 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$1000') $our['Driver 4 Current Comprehensive Deductible'] = '1000';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$2500') $our['Driver 1 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$2500') $our['Driver 2 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$2500') $our['Driver 3 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$2500') $our['Driver 4 Current Comprehensive Deductible'] = '1000';

if ($our['Driver 1 Current Comprehensive Deductible'] == '$5000') $our['Driver 1 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 2 Current Comprehensive Deductible'] == '$5000') $our['Driver 2 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 3 Current Comprehensive Deductible'] == '$5000') $our['Driver 3 Current Comprehensive Deductible'] = '1000';
if ($our['Driver 4 Current Comprehensive Deductible'] == '$5000') $our['Driver 4 Current Comprehensive Deductible'] = '1000';

//Match collision deductible***************************************************************************//
if (empty($our['Driver 1 Current Collision Deductible'])) $our['Driver 1 Current Collision Deductible'] ='No Coverage';
if (empty($our['Driver 2 Current Collision Deductible'])) $our['Driver 2 Current Collision Deductible'] ='No Coverage';
if (empty($our['Driver 3 Current Collision Deductible'])) $our['Driver 3 Current Collision Deductible'] ='No Coverage';
if (empty($our['Driver 4 Current Collision Deductible'])) $our['Driver 4 Current Collision Deductible'] ='No Coverage';

if ($our['Driver 1 Current Collision Deductible'] == 'No Deductible') $our['Driver 1 Current Collision Deductible']='100';
if ($our['Driver 2 Current Collision Deductible'] == 'No Deductible') $our['Driver 2 Current Collision Deductible']='100';
if ($our['Driver 3 Current Collision Deductible'] == 'No Deductible') $our['Driver 3 Current Collision Deductible']='100';
if ($our['Driver 4 Current Collision Deductible'] == 'No Deductible') $our['Driver 4 Current Collision Deductible']='100';

if ($our['Driver 1 Current Collision Deductible'] == '$50') $our['Driver 1 Current Collision Deductible'] = '100';
if ($our['Driver 2 Current Collision Deductible'] == '$50') $our['Driver 2 Current Collision Deductible'] = '100';
if ($our['Driver 3 Current Collision Deductible'] == '$50') $our['Driver 3 Current Collision Deductible'] = '100';
if ($our['Driver 4 Current Collision Deductible'] == '$50') $our['Driver 4 Current Collision Deductible'] = '100';

if ($our['Driver 1 Current Collision Deductible'] == '$100') $our['Driver 1 Current Collision Deductible'] = '100';
if ($our['Driver 2 Current Collision Deductible'] == '$100') $our['Driver 2 Current Collision Deductible'] = '100';
if ($our['Driver 3 Current Collision Deductible'] == '$100') $our['Driver 3 Current Collision Deductible'] = '100';
if ($our['Driver 4 Current Collision Deductible'] == '$100') $our['Driver 4 Current Collision Deductible'] = '100';

if ($our['Driver 1 Current Collision Deductible'] == '$150') $our['Driver 1 Current Collision Deductible'] = '100';
if ($our['Driver 2 Current Collision Deductible'] == '$150') $our['Driver 2 Current Collision Deductible'] = '100';
if ($our['Driver 3 Current Collision Deductible'] == '$150') $our['Driver 3 Current Collision Deductible'] = '100';
if ($our['Driver 4 Current Collision Deductible'] == '$150') $our['Driver 4 Current Collision Deductible'] = '100';

if ($our['Driver 1 Current Collision Deductible'] == '$200') $our['Driver 1 Current Collision Deductible'] = '200';
if ($our['Driver 2 Current Collision Deductible'] == '$200') $our['Driver 2 Current Collision Deductible'] = '200';
if ($our['Driver 3 Current Collision Deductible'] == '$200') $our['Driver 3 Current Collision Deductible'] = '200';
if ($our['Driver 4 Current Collision Deductible'] == '$200') $our['Driver 4 Current Collision Deductible'] = '200';

if ($our['Driver 1 Current Collision Deductible'] == '$250') $our['Driver 1 Current Collision Deductible'] = '250';
if ($our['Driver 2 Current Collision Deductible'] == '$250') $our['Driver 2 Current Collision Deductible'] = '250';
if ($our['Driver 3 Current Collision Deductible'] == '$250') $our['Driver 3 Current Collision Deductible'] = '250';
if ($our['Driver 4 Current Collision Deductible'] == '$250') $our['Driver 4 Current Collision Deductible'] = '250';

if ($our['Driver 1 Current Collision Deductible'] == '$500') $our['Driver 1 Current Collision Deductible'] = '500';
if ($our['Driver 2 Current Collision Deductible'] == '$500') $our['Driver 2 Current Collision Deductible'] = '500';
if ($our['Driver 3 Current Collision Deductible'] == '$500') $our['Driver 3 Current Collision Deductible'] = '500';
if ($our['Driver 4 Current Collision Deductible'] == '$500') $our['Driver 4 Current Collision Deductible'] = '500';

if ($our['Driver 1 Current Collision Deductible'] == '$750') $our['Driver 1 Current Collision Deductible'] = '500';
if ($our['Driver 2 Current Collision Deductible'] == '$750') $our['Driver 2 Current Collision Deductible'] = '500';
if ($our['Driver 3 Current Collision Deductible'] == '$750') $our['Driver 3 Current Collision Deductible'] = '500';
if ($our['Driver 4 Current Collision Deductible'] == '$750') $our['Driver 4 Current Collision Deductible'] = '500';

if ($our['Driver 1 Current Collision Deductible'] == '$1000') $our['Driver 1 Current Collision Deductible'] = '1000';
if ($our['Driver 2 Current Collision Deductible'] == '$1000') $our['Driver 2 Current Collision Deductible'] = '1000';
if ($our['Driver 3 Current Collision Deductible'] == '$1000') $our['Driver 3 Current Collision Deductible'] = '1000';
if ($our['Driver 4 Current Collision Deductible'] == '$1000') $our['Driver 4 Current Collision Deductible'] = '1000';

if ($our['Driver 1 Current Collision Deductible'] == '$2500') $our['Driver 1 Current Collision Deductible'] = '1000';
if ($our['Driver 2 Current Collision Deductible'] == '$2500') $our['Driver 2 Current Collision Deductible'] = '1000';
if ($our['Driver 3 Current Collision Deductible'] == '$2500') $our['Driver 3 Current Collision Deductible'] = '1000';
if ($our['Driver 4 Current Collision Deductible'] == '$2500') $our['Driver 4 Current Collision Deductible'] = '1000';

if ($our['Driver 1 Current Collision Deductible'] == '$5000') $our['Driver 1 Current Collision Deductible'] = '1000';
if ($our['Driver 2 Current Collision Deductible'] == '$5000') $our['Driver 2 Current Collision Deductible'] = '1000';
if ($our['Driver 3 Current Collision Deductible'] == '$5000') $our['Driver 3 Current Collision Deductible'] = '1000';
if ($our['Driver 4 Current Collision Deductible'] == '$5000') $our['Driver 4 Current Collision Deductible'] = '1000';

//Driveways for pete's sake?**************************************************************************//
if($our['Driver 1 Vehicle Parking'] == 'Driveway') $our['Driver 1 Vehicle Parking'] = 'No Cover';
elseif($our['Driver 1 Vehicle Parking'] == 'Private Garage') $our['Driver 1 Vehicle Parking'] = 'Private';
elseif($our['Driver 1 Vehicle Parking'] == 'Parking Garage') $our['Driver 1 Vehicle Parking'] = 'Carport';
elseif($our['Driver 1 Vehicle Parking'] == 'Parking Lot') $our['Driver 1 Vehicle Parking'] = 'No Cover';
elseif($our['Driver 1 Vehicle Parking'] == 'Street') $our['Driver 1 Vehicle Parking'] = 'No Cover';

if($our['Driver 2 Vehicle Parking'] == 'Driveway') $our['Driver 2 Vehicle Parking'] = 'No Cover';
elseif($our['Driver 2 Vehicle Parking'] == 'Private Garage') $our['Driver 2 Vehicle Parking'] = 'Private';
elseif($our['Driver 2 Vehicle Parking'] == 'Parking Garage') $our['Driver 2 Vehicle Parking'] = 'Carport';
elseif($our['Driver 2 Vehicle Parking'] == 'Parking Lot') $our['Driver 2 Vehicle Parking'] = 'No Cover';
elseif($our['Driver 2 Vehicle Parking'] == 'Street') $our['Driver 2 Vehicle Parking'] = 'No Cover';

if($our['Driver 3 Vehicle Parking'] == 'Driveway') $our['Driver 3 Vehicle Parking'] = 'No Cover';
elseif($our['Driver 3 Vehicle Parking'] == 'Private Garage') $our['Driver 3 Vehicle Parking'] = 'Private';
elseif($our['Driver 3 Vehicle Parking'] == 'Parking Garage') $our['Driver 3 Vehicle Parking'] = 'Carport';
elseif($our['Driver 3 Vehicle Parking'] == 'Parking Lot') $our['Driver 3 Vehicle Parking'] = 'No Cover';
elseif($our['Driver 3 Vehicle Parking'] == 'Street') $our['Driver 3 Vehicle Parking'] = 'No Cover';

if($our['Driver 4 Vehicle Parking'] == 'Driveway') $our['Driver 4 Vehicle Parking'] = 'No Cover';
elseif($our['Driver 4 Vehicle Parking'] == 'Private Garage') $our['Driver 4 Vehicle Parking'] = 'Private';
elseif($our['Driver 4 Vehicle Parking'] == 'Parking Garage') $our['Driver 4 Vehicle Parking'] = 'Carport';
elseif($our['Driver 4 Vehicle Parking'] == 'Parking Lot') $our['Driver 4 Vehicle Parking'] = 'No Cover';
elseif($our['Driver 4 Vehicle Parking'] == 'Street') $our['Driver 4 Vehicle Parking'] = 'No Cover';

//If training empty, answer no
if(empty($our['Driver 1 Completed BehindTheWheel'])) $our['Driver 1 Completed BehindTheWheel'] = 'No';
if(empty($our['Driver 2 Completed BehindTheWheel'])) $our['Driver 2 Completed BehindTheWheel'] = 'No';
if(empty($our['Driver 3 Completed BehindTheWheel'])) $our['Driver 3 Completed BehindTheWheel'] = 'No';
if(empty($our['Driver 4 Completed BehindTheWheel'])) $our['Driver 4 Completed BehindTheWheel'] = 'No';

//DailyCommuteMiles correct if not present, or 1-99 integer Driver 1*******************************************//
if(empty($our['Driver 1 Average One Way Mileage'])) $our['Driver 1 Average One Way Mileage'] = '10';
else	{
$our['Driver 1 Average One Way Mileage'] = (int)$our['Driver 1 Average One Way Mileage'];
if($our['Driver 1 Average One Way Mileage'] >= '1' && $our['Driver 1 Average One Way Mileage'] <=99) $our['Driver 1 Average One Way Mileage'] = $our['Driver 1 Average One Way Mileage'];
else
$our['Driver 1 Average One Way Mileage'] = '10';
		}
	
//DailyCommuteMiles correct if not present, or 1-99 integer Driver 2
if(!empty($our['Driver 2 First Name']) && empty($our['Driver 2 Average One Way Mileage'])) $our['Driver 2 Average One Way Mileage'] = '10';
else	{
$our['Driver 2 Average One Way Mileage'] = (int)$our['Driver 2 Average One Way Mileage'];
if($our['Driver 2 Average One Way Mileage'] >= '1' && $our['Driver 2 Average One Way Mileage'] <=99) $our['Driver 2 Average One Way Mileage'] = $our['Driver 2 Average One Way Mileage'];
else
$our['Driver 2 Average One Way Mileage'] = '10';
}

//DailyCommuteMiles correct if not present, or 1-99 integer Driver 3
if(!empty($our['Driver 3 First Name']) && empty($our['Driver 3 Average One Way Mileage'])) $our['Driver 3 Average One Way Mileage'] = '10';
else	{
$our['Driver 3 Average One Way Mileage'] = (int)$our['Driver 3 Average One Way Mileage'];
if($our['Driver 3 Average One Way Mileage'] >= '1' && $our['Driver 3 Average One Way Mileage'] <=99) $our['Driver 3 Average One Way Mileage'] = $our['Driver 3 Average One Way Mileage'];
else
$our['Driver 3 Average One Way Mileage'] = '10';
}	

//DailyCommuteMiles correct if not present, or 1-99 integer Driver 4
if(!empty($our['Driver 4 First Name']) && empty($our['Driver 4 Average One Way Mileage'])) $our['Driver 4 Average One Way Mileage'] = '10';
else	{
$our['Driver 4 Average One Way Mileage'] = (int)$our['Driver 4 Average One Way Mileage'];
if($our['Driver 4 Average One Way Mileage'] >= '1' && $our['Driver 4 Average One Way Mileage'] <=99) $our['Driver 4 Average One Way Mileage'] = $our['Driver 4 Average One Way Mileage'];
else
$our['Driver 4 Average One Way Mileage'] = '10';
}

//Fix submodel by extracting everything in front of the dash Driver 1*******************************************************************
if (!empty($our['Driver 1 Trim'])) {
list($our['1trim1'], $our['1trim2']) = explode('-',$our['Driver 1 Trim']);
if(!empty($our['1trim1'])) $our['Driver 1 Trim'] = $our['1trim1'];
}

//Fix submodel by extracting everything in front of the dash Driver 2
if (!empty($our['Driver 2 Trim'])) {
list($our['2trim1'], $our['2trim2']) = explode('-',$our['Driver 1 Trim']);
if(!empty($our['2trim1'])) $our['Driver 2 Trim'] = $our['2trim1'];
}

//Fix submodel by extracting everything in front of the dash Driver 3
if (!empty($our['Driver 3 Trim'])) {
list($our['3trim1'], $our['3trim2']) = explode('-',$our['Driver 3 Trim']);
if(!empty($our['3trim1'])) $our['Driver 3 Trim'] = $our['3trim1'];
}


//Fix submodel by extracting everything in front of the dash Driver 4
if (!empty($our['Driver 4 Trim'])) {
list($our['4trim1'], $our['4trim2']) = explode('-',$our['Driver 4 Trim']);
if(!empty($our['4trim1'])) $our['Driver 4 Trim'] = $our['4trim1'];
}

//Reconcile annual miles Driver 1**************************************************************************
if($our['Driver 1 Annual Mileage']== '2500') $our['Driver 1 Annual Mileage']= '5000';
if($our['Driver 1 Annual Mileage']== '0 - 5,000') $our['Driver 1 Annual Mileage']= '5000';
if($our['Driver 1 Annual Mileage']== '5,001 - 7,500') $our['Driver 1 Annual Mileage']= '7500';
if($our['Driver 1 Annual Mileage']== '7,501 - 10,000') $our['Driver 1 Annual Mileage']= '10000';
if($our['Driver 1 Annual Mileage']== '10,001 - 12,500') $our['Driver 1 Annual Mileage']= '12500';
if($our['Driver 1 Annual Mileage']== '12,501 - 15,000') $our['Driver 1 Annual Mileage']= '12500';
if($our['Driver 1 Annual Mileage']== '15,001 - 20,000') $our['Driver 1 Annual Mileage']= '20000';
if($our['Driver 1 Annual Mileage']== '20,001 - 25,000') $our['Driver 1 Annual Mileage']= '25000';
if($our['Driver 1 Annual Mileage']== '25,001 - 30,000') $our['Driver 1 Annual Mileage']= '30000';
if($our['Driver 1 Annual Mileage']== '30,001 - 40,000') $our['Driver 1 Annual Mileage']= '40000';
if($our['Driver 1 Annual Mileage']== '40,001 - 50,000') $our['Driver 1 Annual Mileage']= '50000';

//Reconcile annual miles Driver 2
if($our['Driver 2 Annual Mileage']== '2500') $our['Driver 3 Annual Mileage']= '5000';
if($our['Driver 2 Annual Mileage']== '0 - 5,000') $our['Driver 2 Annual Mileage']= '5000';
if($our['Driver 2 Annual Mileage']== '5,001 - 7,500') $our['Driver 2 Annual Mileage']= '7500';
if($our['Driver 2 Annual Mileage']== '7,501 - 10,000') $our['Driver 2 Annual Mileage']= '10000';
if($our['Driver 2 Annual Mileage']== '10,001 - 12,500') $our['Driver 2 Annual Mileage']= '12500';
if($our['Driver 2 Annual Mileage']== '12,501 - 15,000') $our['Driver 2 Annual Mileage']= '12500';
if($our['Driver 2 Annual Mileage']== '15,001 - 20,000') $our['Driver 2 Annual Mileage']= '20000';
if($our['Driver 2 Annual Mileage']== '20,001 - 25,000') $our['Driver 2 Annual Mileage']= '25000';
if($our['Driver 2 Annual Mileage']== '25,001 - 30,000') $our['Driver 2 Annual Mileage']= '30000';
if($our['Driver 2 Annual Mileage']== '30,001 - 40,000') $our['Driver 2 Annual Mileage']= '40000';
if($our['Driver 2 Annual Mileage']== '40,001 - 50,000') $our['Driver 2 Annual Mileage']= '50000';

//Reconcile annual miles Driver 3
if($our['Driver 3 Annual Mileage']== '2500') $our['Driver 3 Annual Mileage']= '5000';
if($our['Driver 3 Annual Mileage']== '0 - 5,000') $our['Driver 3 Annual Mileage']= '5000';
if($our['Driver 3 Annual Mileage']== '5,001 - 7,500') $our['Driver 3 Annual Mileage']= '7500';
if($our['Driver 3 Annual Mileage']== '7,501 - 10,000') $our['Driver 3 Annual Mileage']= '10000';
if($our['Driver 3 Annual Mileage']== '10,001 - 12,500') $our['Driver 3 Annual Mileage']= '12500';
if($our['Driver 3 Annual Mileage']== '12,501 - 15,000') $our['Driver 3 Annual Mileage']= '12500';
if($our['Driver 3 Annual Mileage']== '15,001 - 20,000') $our['Driver 3 Annual Mileage']= '20000';
if($our['Driver 3 Annual Mileage']== '20,001 - 25,000') $our['Driver 3 Annual Mileage']= '25000';
if($our['Driver 3 Annual Mileage']== '25,001 - 30,000') $our['Driver 3 Annual Mileage']= '30000';
if($our['Driver 3 Annual Mileage']== '30,001 - 40,000') $our['Driver 3 Annual Mileage']= '40000';
if($our['Driver 3 Annual Mileage']== '40,001 - 50,000') $our['Driver 3 Annual Mileage']= '50000';

//Reconcile annual miles Driver 4
if($our['Driver 4 Annual Mileage']== '2500') $our['Driver 4 Annual Mileage']= '5000';
if($our['Driver 4 Annual Mileage']== '0 - 5,000') $our['Driver 4 Annual Mileage']= '5000';
if($our['Driver 4 Annual Mileage']== '5,001 - 7,500') $our['Driver 4 Annual Mileage']= '7500';
if($our['Driver 4 Annual Mileage']== '7,501 - 10,000') $our['Driver 4 Annual Mileage']= '10000';
if($our['Driver 4 Annual Mileage']== '10,001 - 12,500') $our['Driver 4 Annual Mileage']= '12500';
if($our['Driver 4 Annual Mileage']== '12,501 - 15,000') $our['Driver 4 Annual Mileage']= '12500';
if($our['Driver 4 Annual Mileage']== '15,001 - 20,000') $our['Driver 4 Annual Mileage']= '20000';
if($our['Driver 4 Annual Mileage']== '20,001 - 25,000') $our['Driver 4 Annual Mileage']= '25000';
if($our['Driver 4 Annual Mileage']== '25,001 - 30,000') $our['Driver 4 Annual Mileage']= '30000';
if($our['Driver 4 Annual Mileage']== '30,001 - 40,000') $our['Driver 4 Annual Mileage']= '40000';
if($our['Driver 4 Annual Mileage']== '40,001 - 50,000') $our['Driver 4 Annual Mileage']= '50000';

//Create vehicle 1 package**************************************************************************
if(!empty($our['Driver 1 Year Of Vehicle'])) {
$our['car1']='<Vehicle VehicleID="1" Ownership="'.htmlspecialchars($our['Driver 1 Ownership']).'"><VIN>'.htmlspecialchars($our['Driver 1 Vin']).'</VIN><VehUse AnnualMiles="'.htmlspecialchars($our['Driver 1 Annual Mileage']).'" WeeklyCommuteDays="5" DailyCommuteMiles="'.htmlspecialchars($our['Driver 1 Average One Way Mileage']).'">'.htmlspecialchars($our['Driver 1 Primary Use']).'</VehUse><ComphrensiveDeductible>'.htmlspecialchars($our['Driver 1 Current Comprehensive Deductible']).'</ComphrensiveDeductible><CollisionDeductible>'.htmlspecialchars($our['Driver 1 Current Collision Deductible']).'</CollisionDeductible><GarageType>'.htmlspecialchars($our['Driver 1 Vehicle Parking']).'</GarageType></Vehicle>';
}

//Create vehicle 2 package**************************************************************************
if(!empty($our['Driver 2 Year Of Vehicle'])) {
$our['car2']='<Vehicle VehicleID="2" Ownership="'.htmlspecialchars($our['Driver 2 Ownership']).'"><VIN>'.htmlspecialchars($our['Driver 2 Vin']).'</VIN><VehUse AnnualMiles="'.htmlspecialchars($our['Driver 2 Annual Mileage']).'" WeeklyCommuteDays="5" DailyCommuteMiles="'.htmlspecialchars($our['Driver 2 Average One Way Mileage']).'">'.htmlspecialchars($our['Driver 2 Primary Use']).'</VehUse><ComphrensiveDeductible>'.htmlspecialchars($our['Driver 2 Current Comprehensive Deductible']).'</ComphrensiveDeductible><CollisionDeductible>'.htmlspecialchars($our['Driver 2 Current Collision Deductible']).'</CollisionDeductible><GarageType>'.htmlspecialchars($our['Driver 2 Vehicle Parking']).'</GarageType></Vehicle>';
}

//Create vehicle 3 package**************************************************************************
if(!empty($our['Driver 3 Year Of Vehicle'])) {
$our['car3']='<Vehicle VehicleID="3" Ownership="'.htmlspecialchars($our['Driver 3 Ownership']).'"><VIN>'.htmlspecialchars($our['Driver 3 Vin']).'</VIN><VehUse AnnualMiles="'.htmlspecialchars($our['Driver 3 Annual Mileage']).'" WeeklyCommuteDays="5" DailyCommuteMiles="'.htmlspecialchars($our['Driver 3 Average One Way Mileage']).'">'.htmlspecialchars($our['Driver 3 Primary Use']).'</VehUse><ComphrensiveDeductible>'.htmlspecialchars($our['Driver 3 Current Comprehensive Deductible']).'</ComphrensiveDeductible><CollisionDeductible>'.htmlspecialchars($our['Driver 3 Current Collision Deductible']).'</CollisionDeductible><GarageType>'.htmlspecialchars($our['Driver 3 Vehicle Parking']).'</GarageType></Vehicle>';
}

//Create vehicle 4 package**************************************************************************
if(!empty($our['Driver 4 Year Of Vehicle'])) {
$our['car4']='<Vehicle VehicleID="4" Ownership="'.htmlspecialchars($our['Driver 4 Ownership']).'"><VIN>'.htmlspecialchars($our['Driver 4 Vin']).'</VIN><VehUse AnnualMiles="'.htmlspecialchars($our['Driver 4 Annual Mileage']).'" WeeklyCommuteDays="5" DailyCommuteMiles="'.htmlspecialchars($our['Driver 4 Average One Way Mileage']).'">'.htmlspecialchars($our['Driver 4 Primary Use']).'</VehUse><ComphrensiveDeductible>'.htmlspecialchars($our['Driver 4 Current Comprehensive Deductible']).'</ComphrensiveDeductible><CollisionDeductible>'.htmlspecialchars($our['Driver 4 Current Collision Deductible']).'</CollisionDeductible><GarageType>'.htmlspecialchars($our['Driver 4 Vehicle Parking']).'</GarageType></Vehicle>';
}

//Package dui if present, send empty node if not driver 1**********************************************//
if($our['Driver 1 DUI DWI In The Past 5 Years'] == 'Yes') {
if(empty($our['dui_year'])) $our['dui_year'] = '2011';
if(empty($our['dui_month'])) $our['dui_month'] ='10';
if(empty($our['Driver 1 DUI State'])) $our['Driver 1 DUI State']= $our['Driver 1 State'];

$our['1dui']='<DUIs><DUI Year="'.htmlspecialchars($our['dui_year']).'" Month="'.htmlspecialchars($our['dui_month']).'"><State>'.htmlspecialchars($our['Driver 1 DUI State']).'</State></DUI></DUIs>';
}
else
$our['1dui'] = '<DUIs />';

//Driver2
if($our['Driver 2 DUI DWI In The Past 5 Years'] == 'Yes') {
if(empty($our['2dui_year'])) $our['2dui_year'] = '2011';
if(empty($our['2dui_month'])) $our['2dui_month'] ='10';
if(empty($our['Driver 2 DUI State'])) $our['Driver 2 DUI State']= $our['Driver 2 State'];

$our['2dui']='<DUIs><DUI Year="'.htmlspecialchars($our['2dui_year']).'" Month="'.htmlspecialchars($our['2dui_month']).'"><State>'.htmlspecialchars($our['Driver 2 DUI State']).'</State></DUI></DUIs>';
}
else
$our['2dui'] = '<DUIs />';

//Driver3
if($our['Driver 3 DUI DWI In The Past 5 Years'] == 'Yes') {
if(empty($our['3dui_year'])) $our['3dui_year'] = '2011';
if(empty($our['3dui_month'])) $our['3dui_month'] ='10';
if(empty($our['Driver 3 DUI State'])) $our['Driver 3 DUI State']= $our['Driver 3 State'];

$our['3dui']='<DUIs><DUI Year="'.htmlspecialchars($our['3dui_year']).'" Month="'.htmlspecialchars($our['3dui_month']).'"><State>'.htmlspecialchars($our['Driver 3 DUI State']).'</State></DUI></DUIs>';
}
else
$our['3dui'] = '<DUIs />';

//Driver4
if($our['Driver 4 DUI DWI In The Past 5 Years'] == 'Yes') {
if(empty($our['4dui_year'])) $our['4dui_year'] = '2011';
if(empty($our['4dui_month'])) $our['4dui_month'] ='10';
if(empty($our['Driver 4 DUI State'])) $our['Driver 4 DUI State']= $our['Driver 4 State'];

$our['4dui']='<DUIs><DUI Year="'.htmlspecialchars($our['4dui_year']).'" Month="'.htmlspecialchars($our['4dui_month']).'"><State>'.htmlspecialchars($our['Driver 4 DUI State']).'</State></DUI></DUIs>';
}
else
$our['4dui'] = '<DUIs />';

//Student/nonstudent
if(empty($our['Driver 1 FullTime Student'])) $our['Driver 1 FullTime Student']= 'No';
if(empty($our['Driver 2 FullTime Student'])) $our['Driver 2 FullTime Student']= 'No';
if(empty($our['Driver 3 FullTime Student'])) $our['Driver 3 FullTime Student']= 'No';
if(empty($our['Driver 4 FullTime Student'])) $our['Driver 4 FullTime Student']= 'No';

//Driver1 package************************************************************************//
if(!empty($our['Driver 1 Birthdate'])) {
$our['driver1']='
<Driver DriverID="1">
<PersonalInfo Gender="'.htmlspecialchars($our['Driver 1 Gender']).'" MaritalStatus="'.htmlspecialchars($our['Driver 1 Marital Status']).'" RelationshipToApplicant="'.htmlspecialchars($our['Driver 1 Relationship To Applicant']).'">
<BirthDate>'.htmlspecialchars($our['Driver 1 Birthdate']).'</BirthDate>
<SocialSecurityNumber></SocialSecurityNumber>
<Occupation>'.htmlspecialchars($our['Driver 1 Occupation']).'</Occupation>
<MilitaryExperience>'.htmlspecialchars($our['military']).'</MilitaryExperience>
<Education GoodStudentDiscount="'.htmlspecialchars($our['Driver 1 FullTime Student']).'">'.htmlspecialchars($our['Driver 1 Education']).'</Education>
<CreditRating Bankruptcy="'.htmlspecialchars($our['Driver 1 Bankruptcy In Past 5 Years']).'">'.htmlspecialchars($our['Driver 1 Credit Rating']).'</CreditRating>
</PersonalInfo><PrimaryVehicle>1</PrimaryVehicle>
<DriversLicense LicenseEverSuspendedRevoked="'.htmlspecialchars($our['Driver 1 Suspended Or Revoked In The Past 5 Years']).'">
<State>'.htmlspecialchars($our['Driver 1 Licensed State']).'</State>
<Number></Number>
<LicensedAge>'.htmlspecialchars($our['Driver 1 Age When First Licensed']).'</LicensedAge>
</DriversLicense>
<DrivingRecord SR22Required="'.htmlspecialchars($our['Driver 1 Filing Required']).'" DriverTraining="'.htmlspecialchars($our['Driver 1 Completed BehindTheWheel']).'">
'.$our['1dui'].'
<Accidents>
'.$our['1accident1'].'
'.$our['1accident2'].'
'.$our['1accident3'].'
'.$our['1accident4'].'
</Accidents>
<Tickets>
'.$our['1ticket1'].'
'.$our['1ticket2'].'
'.$our['1ticket3'].'
'.$our['1ticket4'].'
</Tickets>
<Claims>
'.$our['1claim1'].'
'.$our['1claim2'].'
'.$our['1claim3'].'
'.$our['1claim4'].'
</Claims>	
</DrivingRecord>
</Driver>';
}

$our['driver1'] =htmlspecialchars_decode($our['driver1']);


//Driver2 package************************************************************************//
//If Vehicle 2 exists, assign to driver 2
if(isset($our['Driver 2 Year Of Vehicle'])) $our['2carnum']= '2';
else
$our['2carnum'] = '1';

if(!empty($our['Driver 2 Birthdate'])) {
$our['driver2']='
<Driver DriverID="2">
<PersonalInfo Gender="'.htmlspecialchars($our['Driver 2 Gender']).'" MaritalStatus="'.htmlspecialchars($our['Driver 2 Marital Status']).'" RelationshipToApplicant="'.htmlspecialchars($our['Driver 2 Relationship To Applicant']).'">
<BirthDate>'.htmlspecialchars($our['Driver 2 Birthdate']).'</BirthDate>
<SocialSecurityNumber></SocialSecurityNumber>
<Occupation>'.htmlspecialchars($our['Driver 2 Occupation']).'</Occupation>
<MilitaryExperience>'.htmlspecialchars($our['military2']).'</MilitaryExperience>
<Education GoodStudentDiscount="'.htmlspecialchars($our['Driver 2 FullTime Student']).'">'.htmlspecialchars($our['Driver 2 Education']).'</Education>
<CreditRating Bankruptcy="'.htmlspecialchars($our['Driver 2 Bankruptcy In Past 5 Years']).'">'.htmlspecialchars($our['Driver 2 Credit Rating']).'</CreditRating>
</PersonalInfo><PrimaryVehicle>'.htmlspecialchars($our['2carnum']).'</PrimaryVehicle>
<DriversLicense LicenseEverSuspendedRevoked="'.htmlspecialchars($our['Driver 2 Suspended Or Revoked In The Past 5 Years']).'">
<State>'.htmlspecialchars($our['Driver 2 Licensed State']).'</State>
<Number></Number>
<LicensedAge>'.htmlspecialchars($our['Driver 2 Age When First Licensed']).'</LicensedAge>
</DriversLicense>
<DrivingRecord SR22Required="'.htmlspecialchars($our['Driver 2 Filing Required']).'" DriverTraining="'.htmlspecialchars($our['Driver 2 Completed BehindTheWheel']).'">
'.$our['2dui'].'
	<Accidents>
'.$our['2accident1'].'
'.$our['2accident2'].'
'.$our['2accident3'].'
'.$our['2accident4'].'
</Accidents>
<Tickets>
'.$our['2ticket1'].'
'.$our['2ticket2'].'
'.$our['2ticket3'].'
'.$our['2ticket4'].'
</Tickets>
<Claims>
'.$our['2claim1'].'
'.$our['2claim2'].'
'.$our['2claim3'].'
'.$our['2claim4'].'
</Claims>
</DrivingRecord>
</Driver>';
 }

$our['driver2'] =htmlspecialchars_decode($our['driver2']);


//Driver3 package************************************************************************//
//If Vehicle 2 exists, assign to driver 2
if(isset($our['Driver 3 Year Of Vehicle'])) $our['3carnum']= '3';
else
$our['2carnum'] = '1';

if(!empty($our['Driver 3 Birthdate'])) {
$our['driver3']='
<Driver DriverID="3">
<PersonalInfo Gender="'.htmlspecialchars($our['Driver 3 Gender']).'" MaritalStatus="'.htmlspecialchars($our['Driver 3 Marital Status']).'" RelationshipToApplicant="'.htmlspecialchars($our['Driver 3 Relationship To Applicant']).'">
<BirthDate>'.htmlspecialchars($our['Driver 3 Birthdate']).'</BirthDate>
<SocialSecurityNumber></SocialSecurityNumber>
<Occupation>'.htmlspecialchars($our['Driver 3 Occupation']).'</Occupation>
<MilitaryExperience>'.htmlspecialchars($our['military3']).'</MilitaryExperience>
<Education GoodStudentDiscount="'.htmlspecialchars($our['Driver 3 FullTime Student']).'">'.htmlspecialchars($our['Driver 3 Education']).'</Education>
<CreditRating Bankruptcy="'.htmlspecialchars($our['Driver 3 Bankruptcy In Past 5 Years']).'">'.htmlspecialchars($our['Driver 3 Credit Rating']).'</CreditRating>
</PersonalInfo><PrimaryVehicle>'.$our['3carnum'].'</PrimaryVehicle>
<DriversLicense LicenseEverSuspendedRevoked="'.htmlspecialchars($our['Driver 3 Suspended Or Revoked In The Past 5 Years']).'">
<State>'.htmlspecialchars($our['Driver 3 Licensed State']).'</State>
<Number></Number>
<LicensedAge>'.htmlspecialchars($our['Driver 3 Age When First Licensed']).'</LicensedAge>
</DriversLicense>
<DrivingRecord SR22Required="'.htmlspecialchars($our['Driver 3 Filing Required']).'" DriverTraining="'.htmlspecialchars($our['Driver 3 Completed BehindTheWheel']).'">
'.$our['3dui'].'
<Accidents>
'.$our['3accident1'].'
'.$our['3accident2'].'
'.$our['3accident3'].'
'.$our['3accident4'].'
</Accidents>
<Tickets>
'.$our['3ticket1'].'
'.$our['3ticket2'].'
'.$our['3ticket3'].'
'.$our['3ticket4'].'
</Tickets>
<Claims>
'.$our['3claim1'].'
'.$our['3claim2'].'
'.$our['3claim3'].'
'.$our['3claim4'].'
</Claims>
</DrivingRecord>
</Driver>';
}

$our['driver3'] =htmlspecialchars_decode($our['driver3']);


//Driver4 package************************************************************************//
//If Vehicle 2 exists, assign to driver 2
if(isset($our['Driver 4 Year Of Vehicle'])) $our['4carnum']= '4';
else
$our['2carnum'] = '1';

if(!empty($our['Driver 4 Birthdate'])) {
$our['driver4']='
<Driver DriverID="4">
<PersonalInfo Gender="'.htmlspecialchars($our['Driver 4 Gender']).'" MaritalStatus="'.htmlspecialchars($our['Driver 4 Marital Status']).'" RelationshipToApplicant="'.htmlspecialchars($our['Driver 4 Relationship To Applicant']).'">
<BirthDate>'.htmlspecialchars($our['Driver 4 Birthdate']).'</BirthDate>
<SocialSecurityNumber></SocialSecurityNumber>
<Occupation>'.htmlspecialchars($our['Driver 4 Occupation']).'</Occupation>
<MilitaryExperience>'.htmlspecialchars($our['military4']).'</MilitaryExperience>
<Education GoodStudentDiscount="'.htmlspecialchars($our['Driver 4 FullTime Student']).'">'.htmlspecialchars($our['Driver 4 Education']).'</Education>
<CreditRating Bankruptcy="'.htmlspecialchars($our['Driver 4 Bankruptcy In Past 5 Years']).'">'.htmlspecialchars($our['Driver 4 Credit Rating']).'</CreditRating>
</PersonalInfo><PrimaryVehicle>'.$our['4carnum'].'</PrimaryVehicle>
<DriversLicense LicenseEverSuspendedRevoked="'.htmlspecialchars($our['Driver 4 Suspended Or Revoked In The Past 5 Years']).'">
<State>'.htmlspecialchars($our['Driver 4 Licensed State']).'</State>
<Number></Number>
<LicensedAge>'.htmlspecialchars($our['Driver 4 Age When First Licensed']).'</LicensedAge>
</DriversLicense>
<DrivingRecord SR22Required="'.htmlspecialchars($our['Driver 4 Filing Required']).'" DriverTraining="'.htmlspecialchars($our['Driver 4 Completed BehindTheWheel']).'">
'.$our['4dui'].'
<Accidents>
'.$our['4accident1'].'
'.$our['4accident2'].'
'.$our['4accident3'].'
'.$our['4accident4'].'
</Accidents>
<Tickets>
'.$our['4ticket1'].'
'.$our['4ticket2'].'
'.$our['4ticket3'].'
'.$our['4ticket4'].'
</Tickets>
<Claims>
'.$our['4claim1'].'
'.$our['4claim2'].'
'.$our['4claim3'].'
'.$our['4claim4'].'
</Claims>
</DrivingRecord>
</Driver>';
}

$our['driver4'] =htmlspecialchars_decode($our['driver4']);

//Set phone numbers for post data****************************************************************//
if(!empty($our['Driver 1 Daytime Phone'])) $our['workphone'] = '<PhoneNumber Type="Work"><Number>'.htmlspecialchars($our['Driver 1 Daytime Phone']).'</Number><Extension>0000</Extension></PhoneNumber>';

if(!empty($our['Driver 1 Evening Phone'])) $our['homephone'] = '<PhoneNumber Type="Home"><Number>'.htmlspecialchars($our['Driver 1 Evening Phone']).'</Number><Extension>0000</Extension></PhoneNumber>';

if(!empty($our['Driver 1 Cell Phone'])) $our['cellphone'] = '<PhoneNumber Type="Cell"><Number>'.htmlspecialchars($our['Driver 1 Cell Phone']).'</Number><Extension>0000</Extension></PhoneNumber>';


//Driver1 package for POST************************************************************************//
if(!empty($our['Driver 1 First Name'])) {
$our['postdriver1']='
<Driver DriverID="1">
<PersonalInfo Gender="'.htmlspecialchars($our['Driver 1 Gender']).'" MaritalStatus="'.htmlspecialchars($our['Driver 1 Marital Status']).'" RelationshipToApplicant="'.htmlspecialchars($our['Driver 1 Relationship To Applicant']).'">
<FirstName>'.htmlspecialchars($our['Driver 1 First Name']).'</FirstName>
<LastName>'.htmlspecialchars($our['Driver 1 Last Name']).'</LastName>
<BirthDate>'.htmlspecialchars($our['Driver 1 Birthdate']).'</BirthDate>
<SocialSecurityNumber></SocialSecurityNumber>
<Occupation>'.htmlspecialchars($our['Driver 1 Occupation']).'</Occupation>
<MilitaryExperience>'.htmlspecialchars($our['military']).'</MilitaryExperience>
<Education GoodStudentDiscount="'.htmlspecialchars($our['Driver 1 FullTime Student']).'">'.htmlspecialchars($our['Driver 1 Education']).'</Education>
<CreditRating Bankruptcy="'.htmlspecialchars($our['Driver 1 Bankruptcy In Past 5 Years']).'">'.htmlspecialchars($our['Driver 1 Credit Rating']).'</CreditRating>
</PersonalInfo><PrimaryVehicle>1</PrimaryVehicle>
<DriversLicense LicenseEverSuspendedRevoked="'.htmlspecialchars($our['Driver 1 Suspended Or Revoked In The Past 5 Years']).'">
<State>'.htmlspecialchars($our['Driver 1 Licensed State']).'</State>
<Number></Number>
<LicensedAge>'.htmlspecialchars($our['Driver 1 Age When First Licensed']).'</LicensedAge>
</DriversLicense>
<DrivingRecord SR22Required="'.htmlspecialchars($our['Driver 1 Filing Required']).'" DriverTraining="'.htmlspecialchars($our['Driver 1 Completed BehindTheWheel']).'">
'.$our['1dui'].'
<Accidents>
'.$our['1accident1'].'
'.$our['1accident2'].'
'.$our['1accident3'].'
'.$our['1accident4'].'
</Accidents>
<Tickets>
'.$our['1ticket1'].'
'.$our['1ticket2'].'
'.$our['1ticket3'].'
'.$our['1ticket4'].'
</Tickets>
<Claims>
'.$our['1claim1'].'
'.$our['1claim2'].'
'.$our['1claim3'].'
'.$our['1claim4'].'
</Claims>	
</DrivingRecord>
</Driver>';
}

$our['driver1'] =htmlspecialchars_decode($our['driver1']);


//Driver2 package POST************************************************************************////If Vehicle 2 exists, assign to driver 2
if(isset($our['Driver 2 Year Of Vehicle'])) $our['2postcarnum']= '2';
else
$our['2postcarnum'] = '1';

if(!empty($our['Driver 2 First Name'])) {
$our['postdriver2']='
<Driver DriverID="2">
<PersonalInfo Gender="'.htmlspecialchars($our['Driver 2 Gender']).'" MaritalStatus="'.htmlspecialchars($our['Driver 2 Marital Status']).'" RelationshipToApplicant="'.htmlspecialchars($our['Driver 2 Relationship To Applicant']).'">
<FirstName>'.htmlspecialchars($our['Driver 2 First Name']).'</FirstName>
<LastName>'.htmlspecialchars($our['Driver 2 Last Name']).'</LastName>
<BirthDate>'.htmlspecialchars($our['Driver 2 Birthdate']).'</BirthDate>
<SocialSecurityNumber></SocialSecurityNumber>
<Occupation>'.htmlspecialchars($our['Driver 2 Occupation']).'</Occupation>
<MilitaryExperience>'.htmlspecialchars($our['military2']).'</MilitaryExperience>
<Education GoodStudentDiscount="'.htmlspecialchars($our['Driver 2 FullTime Student']).'">'.htmlspecialchars($our['Driver 2 Education']).'</Education>
<CreditRating Bankruptcy="'.htmlspecialchars($our['Driver 2 Bankruptcy In Past 5 Years']).'">'.htmlspecialchars($our['Driver 2 Credit Rating']).'</CreditRating>
</PersonalInfo><PrimaryVehicle>'.htmlspecialchars($our['2postcarnum']).'</PrimaryVehicle>
<DriversLicense LicenseEverSuspendedRevoked="'.htmlspecialchars($our['Driver 2 Suspended Or Revoked In The Past 5 Years']).'">
<State>'.htmlspecialchars($our['Driver 2 Licensed State']).'</State>
<Number></Number>
<LicensedAge>'.htmlspecialchars($our['Driver 2 Age When First Licensed']).'</LicensedAge>
</DriversLicense>
<DrivingRecord SR22Required="'.htmlspecialchars($our['Driver 2 Filing Required']).'" DriverTraining="'.htmlspecialchars($our['Driver 2 Completed BehindTheWheel']).'">
'.$our['2dui'].'
	<Accidents>
'.$our['2accident1'].'
'.$our['2accident2'].'
'.$our['2accident3'].'
'.$our['2accident4'].'
</Accidents>
<Tickets>
'.$our['2ticket1'].'
'.$our['2ticket2'].'
'.$our['2ticket3'].'
'.$our['2ticket4'].'
</Tickets>
<Claims>
'.$our['2claim1'].'
'.$our['2claim2'].'
'.$our['2claim3'].'
'.$our['2claim4'].'
</Claims>
</DrivingRecord>
</Driver>';
 }

$our['driver2'] =htmlspecialchars_decode($our['driver2']);


//Driver3 package POST************************************************************************//
if(isset($our['Driver 3 Year Of Vehicle'])) $our['3postcarnum']= '3';
else
$our['3postcarnum'] = '1';

if(!empty($our['Driver 3 First Name'])) {
$our['postdriver3']='
<Driver DriverID="3">
<PersonalInfo Gender="'.htmlspecialchars($our['Driver 3 Gender']).'" MaritalStatus="'.htmlspecialchars($our['Driver 3 Marital Status']).'" RelationshipToApplicant="'.htmlspecialchars($our['Driver 3 Relationship To Applicant']).'">
<FirstName>'.htmlspecialchars($our['Driver 3 First Name']).'</FirstName>
<LastName>'.htmlspecialchars($our['Driver 3 Last Name']).'</LastName>
<BirthDate>'.htmlspecialchars($our['Driver 3 Birthdate']).'</BirthDate>
<SocialSecurityNumber></SocialSecurityNumber>
<Occupation>'.htmlspecialchars($our['Driver 3 Occupation']).'</Occupation>
<MilitaryExperience>'.htmlspecialchars($our['military3']).'</MilitaryExperience>
<Education GoodStudentDiscount="'.htmlspecialchars($our['Driver 3 FullTime Student']).'">'.htmlspecialchars($our['Driver 3 Education']).'</Education>
<CreditRating Bankruptcy="'.htmlspecialchars($our['Driver 3 Bankruptcy In Past 5 Years']).'">'.htmlspecialchars($our['Driver 3 Credit Rating']).'</CreditRating>
</PersonalInfo><PrimaryVehicle>'.htmlspecialchars($our['3postcarnum']).'</PrimaryVehicle>
<DriversLicense LicenseEverSuspendedRevoked="'.htmlspecialchars($our['Driver 3 Suspended Or Revoked In The Past 5 Years']).'">
<State>'.htmlspecialchars($our['Driver 3 Licensed State']).'</State>
<Number></Number>
<LicensedAge>'.htmlspecialchars($our['Driver 3 Age When First Licensed']).'</LicensedAge>
</DriversLicense>
<DrivingRecord SR22Required="'.htmlspecialchars($our['Driver 3 Filing Required']).'" DriverTraining="'.htmlspecialchars($our['Driver 3 Completed BehindTheWheel']).'">
'.$our['3dui'].'
<Accidents>
'.$our['3accident1'].'
'.$our['3accident2'].'
'.$our['3accident3'].'
'.$our['3accident4'].'
</Accidents>
<Tickets>
'.$our['3ticket1'].'
'.$our['3ticket2'].'
'.$our['3ticket3'].'
'.$our['3ticket4'].'
</Tickets>
<Claims>
'.$our['3claim1'].'
'.$our['3claim2'].'
'.$our['3claim3'].'
'.$our['3claim4'].'
</Claims>
</DrivingRecord>
</Driver>';
}

$our['driver3'] =htmlspecialchars_decode($our['driver3']);


//Driver4 package POST************************************************************************//
if(isset($our['Driver 4 Year Of Vehicle'])) $our['4postcarnum']= '4';
else
$our['4postcarnum'] = '1';

if(!empty($our['Driver 4 First Name'])) {
$our['postdriver4']='
<Driver DriverID="4">
<PersonalInfo Gender="'.htmlspecialchars($our['Driver 4 Gender']).'" MaritalStatus="'.htmlspecialchars($our['Driver 4 Marital Status']).'" RelationshipToApplicant="'.htmlspecialchars($our['Driver 4 Relationship To Applicant']).'">
<FirstName>'.htmlspecialchars($our['Driver 4 First Name']).'</FirstName>
<LastName>'.htmlspecialchars($our['Driver 4 Last Name']).'</LastName>
<BirthDate>'.htmlspecialchars($our['Driver 4 Birthdate']).'</BirthDate>
<SocialSecurityNumber></SocialSecurityNumber>
<Occupation>'.htmlspecialchars($our['Driver 4 Occupation']).'</Occupation>
<MilitaryExperience>'.htmlspecialchars($our['military4']).'</MilitaryExperience>
<Education GoodStudentDiscount="'.htmlspecialchars($our['Driver 4 FullTime Student']).'">'.htmlspecialchars($our['Driver 4 Education']).'</Education>
<CreditRating Bankruptcy="'.htmlspecialchars($our['Driver 4 Bankruptcy In Past 5 Years']).'">'.htmlspecialchars($our['Driver 4 Credit Rating']).'</CreditRating>
</PersonalInfo><PrimaryVehicle>'.htmlspecialchars($our['4postcarnum']).'</PrimaryVehicle>
<DriversLicense LicenseEverSuspendedRevoked="'.htmlspecialchars($our['Driver 4 Suspended Or Revoked In The Past 5 Years']).'">
<State>'.htmlspecialchars($our['Driver 4 Licensed State']).'</State>
<Number></Number>
<LicensedAge>'.htmlspecialchars($our['Driver 4 Age When First Licensed']).'</LicensedAge>
</DriversLicense>
<DrivingRecord SR22Required="'.htmlspecialchars($our['Driver 4 Filing Required']).'" DriverTraining="'.htmlspecialchars($our['Driver 4 Completed BehindTheWheel']).'">
'.$our['4dui'].'
<Accidents>
'.$our['4accident1'].'
'.$our['4accident2'].'
'.$our['4accident3'].'
'.$our['4accident4'].'
</Accidents>
<Tickets>
'.$our['4ticket1'].'
'.$our['4ticket2'].'
'.$our['4ticket3'].'
'.$our['4ticket4'].'
</Tickets>
<Claims>
'.$our['4claim1'].'
'.$our['4claim2'].'
'.$our['4claim3'].'
'.$our['4claim4'].'
</Claims>
</DrivingRecord>
</Driver>';
}

$our['driver4'] =htmlspecialchars_decode($our['driver4']);
?>