<?php


namespace App\DependencyInjection\Compiler;


use App\Service\Events\EventDispatcher;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class EventDispatcherCompilerPass implements CompilerPassInterface
{
    const TAG_NAME = 'app.event_listener';

    public function process(ContainerBuilder $container)
    {
        $taggedServices = $container->findTaggedServiceIds(self::TAG_NAME);

        $definition = $container->findDefinition(EventDispatcher::class);

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addListener', [new Reference($id)]);
        }
    }
}
