<?php

namespace App;

use App\Service\Configurator;
use App\Service\DecoratorService;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel implements CompilerPassInterface
{
    use MicroKernelTrait;

    public function process(ContainerBuilder $container): void
    {
        // in this method you can manipulate the service container:
        // for example, changing some container service:
        //$container->getDefinition('app.some_private_service')->setPublic(true);

//        foreach ($container->getDefinitions() as $definition) {
//            if (!$definition->getConfigurator()) {
//                $definition->setConfigurator([Configurator::class, 'configure']);
//            }
//        }


    }
}
