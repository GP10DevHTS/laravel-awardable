# Laravel Awardable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gp10devhts/laravel-awardable.svg?style=flat-square)](https://packagist.org/packages/gp10devhts/laravel-awardable)
[![Total Downloads](https://img.shields.io/packagist/dt/gp10devhts/laravel-awardable.svg?style=flat-square)](https://packagist.org/packages/gp10devhts/laravel-awardable)

A Laravel package to add award functionality to any model using a polymorphic relationship. This package allows you to easily manage and assign awards to your models, with configurable categories and uniqueness settings.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [Preparing Your Model](#preparing-your-model)
  - [Giving an Award](#giving-an-award)
  - [Removing an Award](#removing-an-award)
  - [Checking for an Award](#checking-for-an-award)
  - [Fetching Awards](#fetching-awards)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)
A Laravel package to add award functionality to any model using a polymorphic relationship.

## Installation

You can install the package via composer:

```bash
composer require gp10devhts/laravel-awardable
```

Next, publish the package's assets (configuration, migrations, and seeders) by running:
## Publishing Assets

To publish the package's configuration file, migrations, and seeders, run the following command:

```bash
php artisan awardable:publish
```

This will create the following files:
- `config/awardable.php`
- `database/migrations/2024_01_01_000000_create_award_categories_table.php`
- `database/migrations/2024_01_01_000001_create_awards_table.php`
- `database/seeders/AwardCategorySeeder.php`

Run the migrations to create the necessary tables in your database:
This will publish the `awardable.php` configuration file to your `config` directory, the migrations to your `database/migrations` directory, and the seeders to your `database/seeders` directory.

## Running Migrations

Run the migrations to create the `award_categories` and `awards` tables:

```bash
php artisan migrate
```

Finally, you can seed the default award categories into the database:
## Seeding Categories

You can seed the default award categories into the database by running the following command:

```bash
php artisan awardable:seed-categories
```

## Configuration

The package's configuration can be found in the `config/awardable.php` file.

### Default Categories

You can customize the default award categories that are seeded into the database. Each category should have a `name`, a unique `slug`, and an optional `description`.

```php
'default_categories' => [
    [
        'name' => 'Best Speaker',
        'slug' => 'best-speaker',
        'description' => 'Awarded to the best speaker.',
    ],
    // ...
],
```

### Allow Multiple Awards

This option determines whether a model can receive the same award multiple times. By default, this is set to `false`, meaning a model can only receive a specific award once.

```php
'allow_multiple_awards' => false,
```

## Usage

### Preparing Your Model

To make a model "awardable," simply use the `Awardable` trait in your model class.
You can customize the default categories in the `config/awardable.php` file.

## Usage

### Using the Trait in a Model

To make a model awardable, use the `Awardable` trait in the model:

```php
use Gp10devhts\Awardable\Traits\Awardable;
use Illuminate\Database\Eloquent\Model;

class Debater extends Model
{
    use Awardable;
}
```

### Giving an Award

You can give an award to a model using the `giveAward` method, passing the category's slug.

```php
$debater = Debater::find(1);

// Assign an award
$debater->giveAward('best-speaker');

// Assign an award with additional meta data
$debater->giveAward('best-speaker', ['notes' => 'Exceptional performance in the final round.']);
```

If the `allow_multiple_awards` configuration option is set to `false`, the method will not create a duplicate award if the model already has it.

### Removing an Award

To remove an award from a model, use the `removeAward` method with the category's slug.

```php
$debater->removeAward('best-speaker');
```

### Checking for an Award

You can check if a model has a specific award using the `hasAward` method.

```php
if ($debater->hasAward('best-speaker')) {
    // The debater has the 'Best Speaker' award.
}
```

### Fetching Awards

To retrieve all of a model's awards, you can use the `awards` relationship, which returns a collection of `Award` models.

```php
$awards = $debater->awards;

foreach ($awards as $award) {
    echo $award->category->name;
    // Access meta data
    if (isset($award->meta['notes'])) {
        echo $award->meta['notes'];
    }
}
```

To get the latest awards, you can use the `latestAwards` method.

```php
$latestAwards = $debater->latestAwards()->get();
```

## Testing

To run the package's tests, you will need to have a testing environment set up. You can run the tests using the following command from the package's root directory:

```bash
./vendor/bin/pest
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
### Giving, Removing, and Checking Awards

You can give, remove, and check for awards on any model that uses the `Awardable` trait.

#### Giving an Award

To give an award to a model, use the `giveAward` method:

```php
// Assign award by category slug
$debater->giveAward('best-speaker');

// Assign award with meta data
$debater->giveAward('best-speaker', ['notes' => 'Exceptional performance']);
```

#### Removing an Award

To remove an award from a model, use the `removeAward` method:

```php
// Remove award by category slug
$debater->removeAward('best-speaker');
```

#### Checking for an Award

To check if a model has an award, use the `hasAward` method:

```php
// Check for award by category slug
$debater->hasAward('best-speaker'); // returns true or false
```

#### Fetching Awards

To fetch all of a model's awards, you can use the `awards` relationship:

```php
$debater->awards;
```

To fetch the latest awards, you can use the `latestAwards` method:

```php
$debater->latestAwards()->get();
```
