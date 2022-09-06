<?php

namespace Yusufalper\LaravelSubfolderMigrations\Commands;

use Illuminate\Console\Command;

class LaravelSubfolderMigrationsCommand extends Command
{
    public $signature = 'laravel-subfolder-migrations';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
