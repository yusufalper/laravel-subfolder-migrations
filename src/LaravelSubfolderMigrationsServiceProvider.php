<?php

namespace Yusufalper\LaravelSubfolderMigrations;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/*The provided service provider is a useful addition for the Laravel framework,
specifically for handling migrations. By default, Laravel expects all migration
files to be placed directly in the migrations directory without any subdirectories.
However, this service provider allows you to create subdirectories within the
migrations directory, providing a more organized structure for your migration files.
With this service provider, you can organize your migration files into subdirectories
based on your application's needs. The code recursively searches for subdirectories
within the migrations directory and retrieves all migration files, regardless
of their depth in the directory structure.
The migration files within the subdirectories are ordered based on their timestamp,
just like the migration files in the main migrations directory.
This ensures that the migrations are executed in the correct order
when running the migration command.
Once the service provider is registered in your Laravel application, it automatically
loads the migration files from the main migrations directory as well as any subdirectories.
This enables you to take advantage of a more organized structure while still
maintaining the proper execution order of your migrations.
In summary, this service provider enhances the Laravel framework's migration functionality
by allowing the creation of subdirectories within the migrations directory.
It ensures that all migration files, regardless of their location within the subdirectories,
are ordered based on their timestamp and properly executed when running the migration command.
*/
class LaravelSubfolderMigrationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-subfolder-migrations');

        $this->loadMigrationsFrom(
            $this->retrieveSubdirectories([database_path('migrations')])
        );
    }

    /**
     * Recursively returns subdirectories within the given directory path(s),
     * including child subdirectories.
     */
    private function retrieveSubdirectories(array|string $paths): array
    {
        $paths = is_string($paths) ? [$paths] : $paths;

        $subdirs = [];

        foreach ($paths as $path) {
            $subdirs += glob($path . '/*', GLOB_ONLYDIR) ?? [];
        }

        if (!empty($subdirs)) {
            $subdirs = $this->retrieveSubdirectories($subdirs);
            return array_merge($paths, $subdirs);
        }

        return $paths;
    }
}
