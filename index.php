<?php

include "classes/TimeFormatConvertorClass.php";

echo date("m-d-y",strtotime("23 nov 2018"));

echo var_dump(date("m-d-y",strtotime("11 23 2018")));

/* Tell if the parameter given is a date or timestamp. */
if (preg_match("/^[a-zA-Z0-9]{4,10}$/i", $_GET['date'])) { //If parameter is a timestamp. 
    echo "timestamp";
} else { //If parameter is a date.
    echo "date";
}

//Conditions for parameters entered in dashed format.
if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_GET['date'])) {
    echo "<br>Format: YYYY-MM-DD <br>";
} else if (preg_match("/^(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])-[0-9]{4}$/",$_GET['date'])) {
    echo "<br>Format: MM-DD-YYYY <br>";
}

// Make the date parameter case insensitive.
$dateParameter = array_change_key_case($_GET, CASE_LOWER); 

if (array_key_exists('date', $dateParameter) &&
   trim($dateParameter['date']) != "") { // If date parameter are entered in the URL.
    $dateParameter = date("m d y",strtotime(trim($_GET['date'])));
    echo var_dump(strtotime($_GET['date']));
    // Change a string into a DateTime object **
    $date =  new DateTime(TimeFormatConvertor::format_constant_datetime_input_month($dateParameter)); 
    
//    $date = ;
    
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
