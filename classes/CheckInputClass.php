<?php

class CheckInput {
    
    public static function include_dashes_year_at_end($input) {
        /* Check if the input has dashes and have year at the end a date string (ex: MM-DD-YYYY)*/
        
        // The string has dashes and has the year at the end.
        if (preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/",$input)) {
            return true; 
        }
        
        return false; // The string DOES NOT have have the year at the end and/or dashes.
    }
}