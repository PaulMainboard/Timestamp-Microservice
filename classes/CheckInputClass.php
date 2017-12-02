<?php

class CheckInput {
    
    public static function include_dashes_year_at_end($input) {
        /* Check if the input has dashes and have year at the end of a date string (ex: MM-DD-YYYY)*/
        
        // The string has dashes and has the year at the end.
        if (preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/",$input)) {
            return true; 
        }
        
        return false; // The string DOES NOT have have the year at the end and/or dashes.
    }
    
    public static function include_dashes_year_in_front($input) {
        /* Check if the input has dashes and have year at the beginning of a date string (ex: YYYY-MM-DD)*/
        
        // The string has dashes and has the year at the beginning of the string.
        if (preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/",$input)) {
            return true;
        }
        
        return false; // The string DOES NOT have have the year in the front and/or dashes.
    }
    
    public static function isDate($input) {
        /* Determine if the input is a date or a timestamp */
        
        if (preg_match("/^[a-zA-Z0-9]{4,10}$/i", $input)) { 
            return true; // Input is a date.
        }
        return false; // Input is a timestamp.
    }
    
    public static function have_parameter($arr, $key) {
        /* If a parameter is entered in the URL.*/
        
        if (  // Check to see if the key/parameter exists in the array and that it is not empty.
            array_key_exists($key, $arr) && 
            trim($arr[$key]) != ""
        ) {
            return true;  
        } 
        
        return false; // No parameters were entered in the URL or it does not exist as a parameter.
    }
}