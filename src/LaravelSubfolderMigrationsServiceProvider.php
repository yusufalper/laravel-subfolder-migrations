<?php

namespace Yusufalper\LaravelSubfolderMigrations;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSubfolderMigrationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-subfolder-migrations');

        $mainMigrationPath = database_path('migrations');
        $directories = glob($mainMigrationPath . '/*' , GLOB_ONLYDIR);
        $allSubDirs = self::recursiveSearch($directories);

        $allMigrationPaths = array_merge([$mainMigrationPath], $allSubDirs);

        $this->loadMigrationsFrom($allMigrationPaths);
    }

    protected static function recursiveSearch(array $directories): array
    {
        $subs = [];
        $deepSubs = [];
        if (count($directories) > 0){
            $subs = self::getSubDirectories($directories);
        }
        if (count($subs) > 0){
            $deepSubs = self::recursiveSearch($subs);
        }
        return array_merge($directories, $subs, $deepSubs);
    }

    protected static function getSubDirectories(array $directories): array
    {
        $subDirectories = [];
        foreach ($directories as $directory){
            $subDirectories[] = glob($directory . '/*' , GLOB_ONLYDIR);
        }
        return array_merge(...$subDirectories);
    }
}
