<?php


namespace Bytes\PluralizeBundle\Tests;


use Bytes\PluralizeBundle\Twig\AppRuntime;
use Bytes\PluralizeBundle\Twig\PluralizeExtension;
use Twig\RuntimeLoader\RuntimeLoaderInterface;
use Twig\Test\IntegrationTestCase;

class IntegrationTest extends IntegrationTestCase
{

    public function getExtensions()
    {
        return [
            new PluralizeExtension()
        ];
    }

    /**
     * @return RuntimeLoaderInterface[]
     */
    protected function getRuntimeLoaders()
    {
        return [
            new class implements RuntimeLoaderInterface {
                public function load($class) {
                    if (AppRuntime::class === $class) {
                        return new AppRuntime();
                    }
                }
            },
        ];
    }


    /**
     * @return string
     */
    protected function getFixturesDir()
    {
        return __DIR__.'/Fixtures/';
    }
}