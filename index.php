<?php

include "classes/TimeFormatConvertorClass.php";

// Make the date parameter case insensitive.
$dateParameter = array_change_key_case($_GET, CASE_LOWER); 

if (array_key_exists('date', $dateParameter) &&
   trim($dateParameter['date']) != "") { // If date parameter are entered in the URL.
    $date = $dateParameter['date'];
    // new DateTime($dateParameter['date']); // TESTING IN PROGRESS ** Change a string into a DateTime object **
    $timestamp = 0;
//    if (is_string($date)) { // TESTING IN PROGRESS ** Get Timestamp of a date that is a string **
//        $timestamp = strtotime($date);
//    }
    
    
} else { // If the URL do not have any parameters.
    $date = "null";
    $timestamp = "null";
}

// Print date ** FOR TESTING PURPOSES **
echo $date . "<br>" . $timestamp;
echo "<br>" . var_dump(strtotime(str_replace(" ", "-",$date))) . "<br>";
echo TimeFormatConvertor::str_month_to_str_num("november");