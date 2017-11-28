<?php

include "classes/TimeFormatConvertorClass.php";

// Make the date parameter case insensitive.
$dateParameter = array_change_key_case($_GET, CASE_LOWER); 

if (array_key_exists('date', $dateParameter) &&
   trim($dateParameter['date']) != "") { // If date parameter are entered in the URL.
    $date = $dateParameter['date'];
    $testDate =  new DateTime(/*$dateParameter['date']*/ "9-12-2017"); // TESTING IN PROGRESS ** Change a string into a DateTime object **
    /* DateTime formats:  */ 
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
echo "<br>" . $testDate->format("m d y");
echo "<br>" . TimeFormatConvertor::format_constant_datetime_input_month("9-12-2017");