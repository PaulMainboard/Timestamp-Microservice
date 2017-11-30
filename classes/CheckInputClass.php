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
        if (preg_match("/^[a-zA-Z0-9]{4,10}$/i", $input)) {
            return true;
        }
        return false;
    }
}