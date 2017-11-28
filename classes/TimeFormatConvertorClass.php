<?php

class TimeFormatConvertor {
    
    public static function str_month_to_str_num($strMonth) {
        /*
         * Return the number representation 
         * the month that is entered as
         * a parameter.
        */
        switch ($strMonth) {
                
            case "january":
                return "1";
                break;
            case "febuary":
                return "2";
                break;
            case "march":
                return "3";
                break;
            case "april":
                return "4";
                break;
            case "may":
                return "5";
                break;
            case "june":
                return "6";
                break;
            case "july":
                return "7";
                break;
            case "august":
                return "8";
                break;
            case "september":
                return "9";
                break;
            case "october":
                return "10";
                break;
            case "november":
                return "11";
                break;
            case "december":
                return "12";
                break;
            default:
                return "invalid input";
                break;
        }
    }
}