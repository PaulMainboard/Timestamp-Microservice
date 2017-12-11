<?php

include "classes/TimestampMicroserviceClass.php";

// Make the date parameter case insensitive.
$dateParameter = array_change_key_case($_GET, CASE_LOWER); 

if (CheckInput::have_parameter($dateParameter, 'date')) { // If date parameter are entered in the URL.    
    $dateTimestamp = new TimestampMicroservice($dateParameter['date']);
}else { // If the URL do not have any parameters.
    ?>
    <h1>Timestamp Microservice</h1>
    <h2>Instructions: </h2>
    <p>Pass parameter in the URL as ?date=(date). The date parameter can be a human readable date like July 8 2017 or a timestamp.</p>
    <p>The output of the program will be a JSON formatted object contain the timestamp and the matching numerical date of the parameter that was entered in the URL.</p>
    <p>If nothing was entered as a parameter, the date and time variables of the site will be set to null.</p>
    <h2>Example usage:</h2>
    <p>https://paul-mainboard-timestamp.herokuapp.com/?date=12/20/2017</p>
    <p>https://paul-mainboard-timestamp.herokuapp.com/?date=Dec%2020%202017</p>
    <p>https://paul-mainboard-timestamp.herokuapp.com/?date=1513728000</p>
    <p>https://paul-mainboard-timestamp.herokuapp.com/?date=December%2020%202017</p>
    <p>https://paul-mainboard-timestamp.herokuapp.com/?date=2017-12-20</p>
    <p>https://paul-mainboard-timestamp.herokuapp.com/?date=12-20-2017</p>
    <h2>Example Output:</h2>
    <p>{"date":"12-20-2017","timestamp":1513724400}</p>
    <h2>For more Info and the code for this site. Go to this page <a href="https://github.com/PaulMainboard/Timestamp-Microservice">GitHub Repository</a></h2>
<?php
    $dateTimestamp = new TimestampMicroservice();
}

// Convert date and timestamp into JSON format;
$date_json_obj = new json_obj(/*$date*/ $dateTimestamp->get_date(), /*$timestamp*/ $dateTimestamp->get_timestamp());
$date_json_display = $date_json_obj->encode_to_json(); 

// Print JSON object containing the date and timestamp if a date parameter was entered.
if ($dateTimestamp->get_timestamp()) {
    echo $date_json_display;   
}


