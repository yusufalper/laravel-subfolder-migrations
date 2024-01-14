# Organize your migrations into subfolders.

IF YOU DO NOT WANT TO USE PACKAGE FOR THIS FEATURE, YOU CAN USE SIMPLE PROVIDER GIST FROM [HERE](https://gist.github.com/yusufalper/25c0c7e5a347abc09349bbc16817c268)

This package allows you to split database/migrations into subfolders. Especially in large projects, migrations folder may cause headaches. 

Now you can turn this:

- database

- - migrations

- - - 2019_08_19_000000_create_users_table.php

- - - 2019_08_19_000000_create_user_xs_table.php

- - - 2019_08_19_000000_create_user_ys_table.php

- - - 2019_08_19_000000_create_companies_table.php

- - - 2019_08_19_000000_create_company_zs_table.php

- - - 2019_08_19_000000_create_company_ts_table.php


into this:

- database

- - migrations

- - - company_migrations

- - - - 2019_08_19_000003_create_companies_table.php

- - - - 2019_08_19_000004_create_company_zs_table.php

- - - - 2019_08_19_000005_create_company_ts_table.php

- - - user_migrations

- - - - 2019_08_19_000000_create_users_table.php

- - - - 2019_08_19_000001_create_user_xs_table.php

- - - - 2019_08_19_000002_create_user_ys_table.php


Directory order is not important, the only important thing is naming migration files as before. Package will scan all migration folder with all subfolders and will do the migrations in order. In the example above, the first file to run will be "2019_08_19_000000_create_users_table.php".

## Installation

You can install the package via composer:

```bash
composer require yusufalper/laravel-subfolder-migrations
```

And you are good to go! You can run your migration commands as just like before. For example:


```
php artisan migrate
```

Note:

If you don't have auto discovery enabled, you should add the following to config/app.php "providers" array:

```
Yusufalper\LaravelSubfolderMigrations\LaravelSubfolderMigrationsServiceProvider::class,

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Yusuf Alper Sarı](https://github.com/yusufalper)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
