<?php


namespace App\Support;


/**
 * Class Formatter
 * @package App\Support
 */
class Formatter
{
    /**
     * @param $value
     * @return string
     */
    public static function moneyHuman($value)
    {
        return number_format(($value ? $value : 0), 2, ',', '.');
    }

    /**
     * @param $value
     * @return string|string[]
     */
    public static function moneyDb($value)
    {
        return str_replace(',', '.', str_replace('.', null, $value));
    }
}