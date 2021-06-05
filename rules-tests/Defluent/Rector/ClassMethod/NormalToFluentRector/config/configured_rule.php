<?php

declare(strict_types=1);

use Rector\Defluent\Rector\ClassMethod\NormalToFluentRector;
use Rector\Defluent\ValueObject\NormalToFluent;
use Rector\Tests\Defluent\Rector\ClassMethod\NormalToFluentRector\Source\FluentInterfaceClass;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(NormalToFluentRector::class)
        ->call('configure', [[
            NormalToFluentRector::CALLS_TO_FLUENT => ValueObjectInliner::inline(
                [

                    new NormalToFluent(FluentInterfaceClass::class, [
                        'someFunction',
                        'otherFunction',
                        'joinThisAsWell',
                    ]),
                ]
            ),
        ]]);
};
