<?php

namespace Yaliilyaya\Symfony6AdminLte\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use function dirname;

class Symfony6AdminLteExtension extends Extension
{

    /**
     * @link https://symfony.com/doc/current/bundles/extension.html#using-configuration-to-change-the-services
     * @param array $configs An array of configuration settings
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->loadConfiguration($configs, $container);

        $loader = $this->createLoader($container);
        $loader->load('services.yaml');
    }

    /**
     * https://stackoverflow.com/questions/52616405/symfony-bundle-default-configurations
     * @param array $configs
     * @param ContainerBuilder $container
     * @return void
     */
    private function loadConfiguration(array $configs, ContainerBuilder $container)
    {
        /** @var Configuration $configuration */
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

    }

    private function createLoader($container): YamlFileLoader
    {
        $configPath = dirname(__DIR__, 2) . '/config';
        $fileLocator = new FileLocator($configPath);

        return new YamlFileLoader($container, $fileLocator);
    }
}
