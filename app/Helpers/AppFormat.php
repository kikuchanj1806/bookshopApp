<?php

namespace App\Helpers;

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
}
