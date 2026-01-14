<?php

    namespace App\Libraries;

    class BanglaConverter {

        public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");

        public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        public static $engdate = ['January','February','March','April','May','June','July','August','September','October','November','December'];

        public static $bangdate = ['জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর'];

        public static $engdays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        public static $bndays = ['শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার'];

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

        public static function en2bn_month($month) {
            return str_replace(self::$engdate, self::$bangdate, $month); 
        }

        public static function en2bn_day($day) {
            return str_replace(self::$engdays, self::$bndays, $day);
        }


    }



?>