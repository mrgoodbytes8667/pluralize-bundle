<?php


namespace Bytes\PluralizeBundle\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class PluralizeExtension
 * @package Bytes\PluralizeBundle\Twig
 */
class PluralizeExtension extends AbstractExtension
{
    /**
     * @return array|TwigFunction[]
     */
    public function getFilters()
    {
        return [
            new TwigFilter('pluralize', [AppRuntime::class, 'getPluralizedString']),
        ];
    }
}