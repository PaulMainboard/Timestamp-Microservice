<?php

include "classes/TimeFormatConvertorClass.php";

///* Tell if the parameter given is a date or timestamp. */
//if (preg_match("/^[a-zA-Z0-9]{4,10}$/i", $_GET['date'])) { //If parameter is a timestamp. 
//    echo "timestamp";
//} else { //If parameter is a date.
//    echo "date";
//}
//
////Conditions for parameters entered in dashed format.
//if (preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/",$_GET['date'])) {
//    echo "<br>Format: YYYY-MM-DD <br>";
//} else if (preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/",$_GET['date'])) {
//    echo "<br>Format: MM-DD-YYYY <br>";
//}

// Make the date parameter case insensitive.
$dateParameter = array_change_key_case($_GET, CASE_LOWER); 

if (array_key_exists('date', $dateParameter) &&
   trim($dateParameter['date']) != "") { // If date parameter are entered in the URL.
     
//    if (!preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/",$dateParameter['date']) && !preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/",$dateParameter['date'])) {
//            
//        $dateParameter = date("m d y",strtotime(trim($dateParameter['date'])));
//        echo var_dump(strtotime($dateParameter));   
//    }
    
    /* If the date parameter is a string */

    // If the date format is numerical and has dashes in it. (example: YYYY-M-D or M-D-YYYY)
    /* ***NOTE: Need to make a method to handle date format M-D-YY*** */
    if (preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/",$dateParameter['date']) || preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/",$dateParameter['date'])) { 
        $dateParameter = $dateParameter['date'];
    } else { // If the date format is in any other format that does not include dashes.
            $dateParameter = date("y-m-d",strtotime(trim($dateParameter['date'])));     
    }
    
    // If the date format is M-D-YYYY, bring the year to the front of the string (ex: YYYY-M-D).
    if (preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/",$dateParameter)) { 
            $dateParameter = TimeFormatConvertor::format_constant_datetime_input_month($dateParameter);   
    }
    
    // Change a string into a DateTime object **
    $date =  new DateTime($dateParameter); 
    
    // Get the timestamp of the date.
    $timestamp = $date->getTimestamp();
//    if (is_string($date)) { // TESTING IN PROGRESS ** Get Timestamp of a date that is a string **
//        $timestamp = strtotime($date);
//    }
    $date= $date->format("m-d-Y"); // Set the date in dashed format. (example: 11-24-2018)
    
} else { // If the URL do not have any parameters.
    $date = "null";
    $timestamp = "null";
    $testDate = "null";
}

// Print date ** FOR TESTING PURPOSES **
echo "<br>" . $date . "<br>" . $timestamp;
