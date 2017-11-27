<?php

// Make the date parameter case insensitive.
$dateParameter = array_change_key_case($_GET, CASE_LOWER); 

if (array_key_exists('date', $dateParameter) &&
   trim($dateParameter['date']) != "") { // If date parameter are entered in the URL.
    $date = $dateParameter['date'];
} else { // If the URL do not have any parameters.
    $date = "null";
}

// Print date ** FOR TESTING PURPOSES **
echo $date;