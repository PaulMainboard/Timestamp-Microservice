<?php

if ($_GET) { // If parameters are entered in the URL.
    $date = $_GET['date'];
} else { // If the URL do not have any parameters.
    $date = "null";
}

// Print date ** FOR TESTING PURPOSES **
echo $date;