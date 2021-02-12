<?php


namespace Bytes\PluralizeBundle\Twig;

use Exception;
use Illuminate\Support\Str;
use Twig\Extension\RuntimeExtensionInterface;

/**
 * Class AppRuntime
 * @package Bytes\PluralizeBundle\Twig
 */
class AppRuntime implements RuntimeExtensionInterface
{
    /**
     * Get a plural variation of a string
     *
     * @param string $string
     * @param integer $number
     *
     * @return string
     *
     * @throws Exception
     */
    public function getPluralizedString($string, $number)
    {
        // Is it a number?
        if (!is_numeric($number)) {
            throw new Exception('$value must be a number.');
        }

        // Choose the correct string
        if ($number == 1) {
            return Str::singular($string);
        } else {
            return Str::plural($string);
        }
    }
}