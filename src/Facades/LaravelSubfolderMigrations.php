<?php

namespace Yusufalper\LaravelSubfolderMigrations\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Yusufalper\LaravelSubfolderMigrations\LaravelSubfolderMigrations
 */
class LaravelSubfolderMigrations extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Yusufalper\LaravelSubfolderMigrations\LaravelSubfolderMigrations::class;
    }
}
