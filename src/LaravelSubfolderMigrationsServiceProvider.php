<?php

namespace Yusufalper\LaravelSubfolderMigrations;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Yusufalper\LaravelSubfolderMigrations\Commands\LaravelSubfolderMigrationsCommand;

class LaravelSubfolderMigrationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-subfolder-migrations')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-subfolder-migrations_table')
            ->hasCommand(LaravelSubfolderMigrationsCommand::class);
    }
}
