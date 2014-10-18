<?php

namespace Adunsulag\DoctrineEncryptBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Adunsulag\DoctrineEncryptBundle\DependencyInjection\AdunsulagDoctrineEncryptExtension;
use Adunsulag\DoctrineEncryptBundle\DependencyInjection\Compiler\RegisterServiceCompilerPass;


class AdunsulagDoctrineEncryptBundle extends Bundle {
    
    public function build(ContainerBuilder $container) {
        parent::build($container);
        $container->addCompilerPass(new RegisterServiceCompilerPass(), PassConfig::TYPE_AFTER_REMOVING);
    }
    
    public function getContainerExtension()
    {
        return new AdunsulagDoctrineEncryptExtension();
    }
}
