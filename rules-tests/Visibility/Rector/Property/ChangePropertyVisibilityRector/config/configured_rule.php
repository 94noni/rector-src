<?php

declare(strict_types=1);

use Rector\Core\ValueObject\Visibility;
use Rector\Tests\Visibility\Rector\Property\ChangePropertyVisibilityRector\Source\ParentObject;
use Rector\Visibility\Rector\Property\ChangePropertyVisibilityRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(ChangePropertyVisibilityRector::class)
        ->call('configure', [[
            ChangePropertyVisibilityRector::PROPERTY_TO_VISIBILITY_BY_CLASS => [
                ParentObject::class => [
                    'toBePublicProperty' => Visibility::PUBLIC,
                    'toBeProtectedProperty' => Visibility::PROTECTED,
                    'toBePrivateProperty' => Visibility::PRIVATE,
                    'toBePublicStaticProperty' => Visibility::PUBLIC,
                ],
                'Rector\Tests\Visibility\Rector\Property\ChangePropertyVisibilityRector\Fixture\Fixture3' => [
                    'toBePublicStaticProperty' => Visibility::PUBLIC,
                ],
            ],
        ]]);
};
