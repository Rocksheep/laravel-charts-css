<?php

namespace Maartenpaauw\Chartscss\Specifications\Dummy;

use Maartenpaauw\Chartscss\Specifications\BasicSpecification;

class PositiveSpecification implements BasicSpecification
{
    public function isSatisfiedBy($entity): bool
    {
        return true;
    }
}
