<?php


namespace Bytes\PluralizeBundle;


use Illuminate\Support\Str;
use function Symfony\Component\String\u;

/**
 * Class Pluralize
 * @package Bytes\PluralizeBundle
 */
class Pluralize
{
    /**
     * Get a plural variation of a string
     *
     * @param integer $number
     * @param string $string
     * @param bool $includeNumber
     *
     * @return string
     */
    public static function pluralize(int $number, string $string, bool $includeNumber = true)
    {
        // Choose the correct string
        if ($number == 1) {
            return self::format($number, Str::singular($string), $includeNumber);
        } else {
            return self::format($number, Str::plural($string), $includeNumber);
        }
    }

    /**
     * @param int $number
     * @param string $string
     * @param bool $includeNumber
     * @return string
     */
    private static function format(int $number, string $string, bool $includeNumber = false): string
    {
        if($includeNumber)
        {
            return u($string)->prepend(' ')->prepend($number)->toString();
        } else {
            return $string;
        }
    }
}
