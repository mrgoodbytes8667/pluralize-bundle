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
        $result = self::setupResult($string, $number);

        return self::format($number, $result, $includeNumber, false, 0, null, null);
    }

    /**
     * @param int $number
     * @param string $string
     * @param int $decimals
     * @param string|null $decimal_separator
     * @param string|null $thousands_separator
     * @return string
     */
    public static function pluralizeFormatted(int $number, string $string, int $decimals = 0, ?string $decimal_separator = '.', ?string $thousands_separator = ',')
    {
        $result = self::setupResult($string, $number);

        return self::format($number, $result, true, true, $decimals, $decimal_separator, $thousands_separator);
    }

    /**
     * @param string $string
     * @param int $number
     * @return string|null
     */
    private static function setupResult(string $string, int $number): ?string
    {
        return self::processWord($string, $number, new EnglishInflector());
    }

    /**
     * @param int $number
     * @param string $string
     * @param bool $includeNumber
     * @param bool $format
     * @param int $decimals
     * @param string|null $decimalSeparator
     * @param string|null $thousandsSeparator
     * @return string
     */
    private static function format(int $number, string $string, bool $includeNumber, bool $format, int $decimals, ?string $decimalSeparator, ?string $thousandsSeparator): string
    {
        if($includeNumber)
        {
            if($format) {
                $number = number_format($number, $decimals, $decimalSeparator, $thousandsSeparator);
            }
            return u($string)->prepend(' ')->prepend($number)->toString();
        } else {
            return $string;
        }
    }

    /**
     * @param string $string
     * @param int $number
     * @param EnglishInflector $inflector
     * @return string|null
     */
    protected static function processWord(string $string, int $number, EnglishInflector $inflector): ?string
    {
        $result = $string;
        $results = [];

        // Choose the correct string
        if ($number == 1) {
            $results = $inflector->singularize($string);
        } else {
            // Swap word to singular first
            $string = self::processWord($string, 1, $inflector);
            $results = $inflector->pluralize($string);
        }
        if (!empty($results)) {
            $result = array_shift($results);
        }
        return $result;
    }
}
