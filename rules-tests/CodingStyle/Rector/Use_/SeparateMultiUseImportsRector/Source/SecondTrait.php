<?php

declare(strict_types=1);

namespace Rector\Tests\CodingStyle\Rector\Use_\SeparateMultiUseImportsRector\Source;

trait SecondTrait
{
    public function exec(): string
    {
        return 'bar';
    }
}
