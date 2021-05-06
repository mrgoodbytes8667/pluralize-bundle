<?php


namespace Bytes\PluralizeBundle\Twig;

use Bytes\PluralizeBundle\Pluralize;
use Exception;
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
            throw new Exception('$number must be a number.');
        }
        if(!is_string($string)) {
            throw new Exception('$string must be a string.');
        }
        return Pluralize::pluralize($number, $string, false);
    }
}