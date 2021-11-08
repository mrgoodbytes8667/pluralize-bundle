<?php


namespace Bytes\PluralizeBundle;


use Symfony\Component\String\Inflector\EnglishInflector;
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
        $inflector = new EnglishInflector();

        $result = $string;
        $results = [];

        // Choose the correct string
        if ($number == 1) {
            $results = $inflector->singularize($string);
        } else {
            $results = $inflector->pluralize($string);
        }
        if(!empty($results))
        {
            $result = array_shift($results);
        }

        return self::format($number, $result, $includeNumber);
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
