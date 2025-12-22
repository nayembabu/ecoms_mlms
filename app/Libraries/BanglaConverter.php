<?php

namespace App\Libraries;

class BanglaConverter {

    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

    public static function bn2en($number) {
        return str_replace(self::$bn, self::$en, $number);
    }

    public static function en2bn($number) {
        return str_replace(self::$en, self::$bn, $number); 
    }

    public static function bd_money($amount) {
        $amount = (string)$amount;
        if (strlen($amount) <= 3) return $amount;

        $last3 = substr($amount, -3);
        $rest = substr($amount, 0, -3);
        $rest = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $rest);

        return $rest . ',' . $last3;
    }


}



?>