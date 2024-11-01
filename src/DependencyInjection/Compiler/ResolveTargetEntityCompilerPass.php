<?php

declare(strict_types=1);

namespace Abenmada\BackofficePlugin\DependencyInjection\Compiler;

use Doctrine\ORM\Tools\ResolveTargetEntityListener;
use Sylius\Component\Channel\Model\ChannelInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ResolveTargetEntityCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('doctrine.orm.listeners.resolve_target_entity')) {
            $container->register('doctrine.orm.listeners.resolve_target_entity', ResolveTargetEntityListener::class)
                ->addTag('doctrine.event_listener', ['event' => 'loadClassMetadata']);
        }

        $listener = $container->getDefinition('doctrine.orm.listeners.resolve_target_entity');

        $listener->addMethodCall('addResolveTargetEntity', [
            ChannelInterface::class,
            $container->getParameter('abenmada_backoffice_plugin.channel_class'),
            []
        ]);
    }
}
