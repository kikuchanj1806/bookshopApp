<?php

namespace App\Helpers;

use App\Models\ProductCategory;
use App\Models\ProductModel;

class AppFormat
{
    // Format số với dấu thập phân và dấu phân cách hàng nghìn
    public static function toNumber($number, $options = [])
    {
        if (! $number || ! is_numeric($number)){
            return '';
        }

        $precision = $options['precision'] ?? 3;
        $number = round($number, $precision);
        if(!$number) {
            return '';
        }
        $decimal = '';
        if(strpos($number, ".")) {
            list($number, $decimal) = explode(".", $number);
        }
        $result = '';
        $sign = '';
        if($number < 0) {
            $sign = '-';
            $number = $number + ($number * (-2));
        }
        while(strlen($number) > 3) {
            $result = '.' . substr($number, strlen($number)-3, 3) . $result;
            $number = substr($number, 0, strlen($number)-3);
        }
        $return = $sign . $number . $result;
        if($decimal) {
            $return .= ','. $decimal;
        }
        return $return;
    }

    // Format số với các tham số tùy chỉnh
    public static function toNumberFormat($number, $decimals = 0, $dec_point = ',', $thousands_sep = '.')
    {
        if(!$number){
            return '';
        }
        return number_format($number, $decimals, $dec_point, $thousands_sep);
    }

    // Làm tròn số lượng
    public static function roundQtyNumber($number, $precision = 3, $mode = PHP_ROUND_HALF_UP)
    {
        if (!$number) return 0;
        if (is_string($number)){
            $number = (float) $number;
        }
        return round($number, $precision, $mode);
    }

    // Hiển thị số lượng hỗ trợ số thập phân
    public static function toFloatNumber($number)
    {
        if(!$number) return '';
        if (str_contains($number, '.')){
            $decimals = 3; // hoặc giá trị mong muốn khác
            return number_format($number, $decimals);
        }
        return number_format($number);
    }

    // Hiển thị tiền
    public static function toIntNumber($number)
    {
        if(!$number) return '';
        $newNumber = self::roundMoneyNumber($number);
        return self::toNumber($newNumber);
    }

    // Làm tròn tiền
    public static function roundMoneyNumber($number, $precision = 0): float
    {
        return round($number, $precision);
    }

    // Hàm format trạng thái
    public static function getStatus($status) {
        $statusText = [
            1 => 'Mới',
            2 => 'Đang bán',
            3 => 'Ngừng bán',
            4 => 'Hết hàng'
        ];
        return $statusText[$status] ?? 'Không xác định';
    }

    public static function removeSigns($text)
    {
        $vnSigns = array(
            'à','á','ạ','ả','ã','â','ầ','ấ','ậ','ẩ','ẫ','ă','ằ','ắ','ặ','ẳ','ẵ',
            'đ',
            'è','é','ẹ','ẻ','ẽ','ê','ề','ế','ệ','ể','ễ',
            'ì','í','ị','ỉ','ĩ',
            'ò','ó','ọ','ỏ','õ','ô','ồ','ố','ộ','ổ','ỗ','ơ','ờ','ớ','ợ','ở','ỡ',
            'ù','ú','ụ','ủ','ũ','ư','ừ','ứ','ự','ử','ữ',
            'ỳ','ý','ỵ','ỷ','ỹ',
            'À','Á','Ạ','Ả','Ã','Â','Ầ','Ấ','Ậ','Ẩ','Ẫ','Ă','Ằ','Ắ','Ặ','Ẳ','Ẵ',
            'Đ',
            'È','É','Ẹ','Ẻ','Ẽ','Ê','Ề','Ế','Ệ','Ể','Ễ',
            'Ì','Í','Ị','Ỉ','Ĩ',
            'Ò','Ó','Ọ','Ỏ','Õ','Ô','Ồ','Ố','Ộ','Ổ','Ỗ','Ơ','Ờ','Ớ','Ợ','Ở','Ỡ',
            'Ù','Ú','Ụ','Ủ','Ũ','Ư','Ừ','Ứ','Ự','Ử','Ữ',
            'Ỳ','Ý','Ỵ','Ỷ','Ỹ'
        );
        $vnUnsigns = array(
            'a','a','a','a','a','a','a','a','a','a','a','a','a','a','a','a','a',
            'd',
            'e','e','e','e','e','e','e','e','e','e','e',
            'i','i','i','i','i',
            'o','o','o','o','o','o','o','o','o','o','o','o','o','o','o','o','o',
            'u','u','u','u','u','u','u','u','u','u','u',
            'y','y','y','y','y',
            'A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A',
            'D',
            'E','E','E','E','E','E','E','E','E','E','E',
            'I','I','I','I','I',
            'O','O','O','O','O','O','O','O','O','O','O','O','O','O','O','O','O',
            'U','U','U','U','U','U','U','U','U','U','U',
            'Y','Y','Y','Y','Y'
        );
        return str_replace($vnSigns, $vnUnsigns, $text);
    }

    static public function slugifyText($text)
    {
        // convert to lowercase
        $text = strtolower($text);
        // remove Vietnamese signs
        $text = self::removeSigns($text);
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    static public function slugify($obj)
    {
        switch ($obj)
        {
            case $obj instanceof ProductCategory:
            case $obj instanceof ProductModel:
                $name = self::slugifyText($obj->name);
                return $name;
            // Add cases for other models if needed
        }
        return '';
    }
}
