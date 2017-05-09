<?php defined('SYSPATH') or die('No direct script access.');
 
class Helper_MyUrl
 {
    public static function SEOIt($str,$param=false)
     {
         $str = explode('/', $str);
		 $u = [' ','.','"',')','(',':',','];
         $str = str_replace($u, '-', $str[0]);
		 $str = rtrim($str,"-");
		 if ($param){
             $u = ['х','Х'];
             $str = str_replace($u, "x", $str);
         }
        return $str;
     }

     public static function ValidArr($arr)
     {
         if (is_array($arr)) {

             foreach ($arr as $key => $part) {

                 $array = array_flip($part);

                 foreach ($array as $key_ => $part_) {

                     if ($key_ == '') $res = $part_;

                 }
             }

             return ["Поле $res не должно быть пустым."];
         }

     }

    public static function  Calculate_Age($birthday) {

        $birthday_timestamp = strtotime($birthday);
        $age = date('Y') - date('Y', $birthday_timestamp);

         if (date('md', $birthday_timestamp) > date('md')) {
                $age--;
           }
              return $age;
       }


    public static function clearData($data, $type="s")
    {
        switch ($type) {
            case "s":
                return mysqli_real_escape_string(trim(strip_tags($data)));
            case "i":
                return (int)$data;
        }
    }


    public static function clearTag($str){

        $allowable_tags = '<p><br><ul><li><ol><b><i><u><blockquote>';

        $new  = strip_tags($str, $allowable_tags);

        return $new;

    }


 }