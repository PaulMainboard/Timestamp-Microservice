<?php

include "classes/TimeFormatConvertorClass.php";
include "classes/CheckInputClass.php";
include "classes/JSON_ObjClass.php";

///* Tell if the parameter given is a date or timestamp. */
//if (preg_match("/^[a-zA-Z0-9]{4,10}$/i", $_GET['date'])) { //If parameter is a timestamp. 
//    echo "timestamp";
//} else { //If parameter is a date.
//    echo "date";
//}

// Make the date parameter case insensitive.
$dateParameter = array_change_key_case($_GET, CASE_LOWER); 

if (CheckInput::have_parameter($dateParameter, 'date')) { // If date parameter are entered in the URL.
    
    /* If the date parameter is a string */
    if (CheckInput::isDate($dateParameter['date'])) { //If parameter is a timestamp. 
            $timestamp = $dateParameter['date'];
            $date = date('m-d-y', $timestamp); // Convert timestamp to a date formatted string.
        } else { //If parameter is a date.
            /* ***NOTE: Need to make a method to handle date format M-D-YY*** */

            if ( // If the date format is numerical and has dashes in it. (example: YYYY-M-D or M-D-YYYY)
                CheckInput::include_dashes_year_in_front($dateParameter['date']) || 
                CheckInput::include_dashes_year_at_end($dateParameter['date'])) { 

                $dateParameter = $dateParameter['date'];

            } else { // If the date format is in any other format that does not include dashes.

                    $dateParameter = date("y-m-d",strtotime(trim($dateParameter['date'])));     

            }

            // If the date format is M-D-YYYY, bring the year to the front of the string (ex: YYYY-M-D).
            if (CheckInput::include_dashes_year_at_end($dateParameter)) { 
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

    }
    
} else { // If the URL do not have any parameters.
    $date = null;
    $timestamp = null;
    $testDate = "null";
}

// Convert date and timestamp into JSON format;
$date_json_obj = new json_obj($date, $timestamp);
$date_json_display = $date_json_obj->encode_to_json(); 

// Print date ** FOR TESTING PURPOSES **
//echo "<br>" . $date . "<br>" . $timestamp;
echo $date_json_display;
