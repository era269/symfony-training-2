<?php


namespace App\DependencyInjection\Compiler;


use App\Service\Handler\HandlerManager;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class CompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $taggedServices = $container->findTaggedServiceIds('app.handler');

        $definition = $container->findDefinition(HandlerManager::class);

        foreach ($taggedServices as $id => $tags) {
            // add the transport service to the TransportChain service
            $definition->addMethodCall('addHandler', [new Reference($id)]);
        }

//        foreach ($taggedServices as $id => $tags) {
//
//            // a service could have the same tag twice
//            foreach ($tags as $attributes) {
//                $definition->addMethodCall('addTransport', [
//                    new Reference($id),
//                    $attributes['alias']
//                ]);
//            }
//        }
    }
}
