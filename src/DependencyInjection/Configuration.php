<?php

namespace Yaliilyaya\Symfony6AdminLte\DependencyInjection;

use Yaliilyaya\Symfony6AdminLte\Symfony6AdminLte;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @link https://symfony.com/doc/current/components/config/definition.html
     * Generates the configuration tree builder.
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        return new TreeBuilder(Symfony6AdminLte::ALIAS);
    }
}
