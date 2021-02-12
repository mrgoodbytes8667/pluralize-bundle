<?php


namespace Symfony\Component\DependencyInjection\Loader\Configurator;


use Bytes\PluralizeBundle\Twig\AppRuntime;
use Bytes\PluralizeBundle\Twig\PluralizeExtension;

/**
 * @param ContainerConfigurator $container
 */
return static function (ContainerConfigurator $container) {

    $services = $container->services();

    $services->set('bytes_pluralize.pluralize_extension', PluralizeExtension::class)
        ->tag('twig.extension');

    $services->set('bytes_pluralize.app_runtime', AppRuntime::class)
        ->tag('twig.runtime');

};