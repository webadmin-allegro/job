<?php defined('SYSPATH') or die('No direct script access.');
 
class Helper_MyUrl
 {
    public static function SEOIt($str)
     {
         $str = explode('/', $str);
		 $u = array(' ','.','"',')','(',':',',');
         $str = str_replace($u, '-', $str[0]);
		 $str = rtrim($str,"-");
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
 }