<?php
/*
 * This file is part of IdentifierAuth.
 */

namespace Gitmagox\Identifier\Facades;

use Illuminate\Support\Facades\Facade;

class IdentifierAuth extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor()
    {
        return \Gitmagox\Identifier\Identifier::class;
    }
}
