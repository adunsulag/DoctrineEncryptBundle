<?php

namespace Adunsulag\DoctrineEncryptBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Definition;

/**
 * Initialization of bundle.
 *
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AdunsulagDoctrineEncryptExtension extends Extension {

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $services = array(
            'orm' => 'orm-services',
            'odm' => 'odm-services',
        );

        if (empty($config['secret_key'])) {
            if ($container->hasParameter('secret')) {
                $config['secret_key'] = $container->getParameter('secret');
            } else {
                throw new \RuntimeException('You must provide "secret_key" for DoctrineEncryptBundle or "secret" for framework');
            }
        }

        if (empty($config['system_salt'])) {
            throw new \RuntimeException('You must provide "system_salt" for DoctrineEncryptBundle');
        }

        if (empty($config['encryptor_service'])) {
            $config['encryptor_service'] = Configuration::defaultEncryptorService;
        }

        if (empty($config['encrypted_prefix'])) {
            $config['encrypted_prefix'] = Configuration::defaultPrefix;
        }

        $container->setParameter('adunsulag_doctrine_encrypt.secret_key', $config['secret_key']);
        $container->setParameter('adunsulag_doctrine_encrypt.system_salt', $config['system_salt']);
        $container->setParameter('adunsulag_doctrine_encrypt.encryptor_service', $config['encryptor_service']);
        $container->setParameter('adunsulag_doctrine_encrypt.encrypted_prefix', $config['encrypted_prefix']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load(sprintf('%s.xml', $services[$config['db_driver']]));

        // If default encryption service needs to be created
        if (Configuration::defaultEncryptorService === $config['encryptor_service']) {
            $loader->load('default-encryptor.xml');
        }
    }

    public function getAlias() {
        return 'adunsulag_doctrine_encrypt';
    }

}
