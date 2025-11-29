# Laravel Awardable

A Laravel package to add award functionality to any model using a polymorphic relationship.

## Installation

You can install the package via composer:

```bash
composer require gp10devhts/laravel-awardable
```

## Publishing Assets

To publish the package's configuration file, migrations, and seeders, run the following command:

```bash
php artisan awardable:publish
```

This will publish the `awardable.php` configuration file to your `config` directory, the migrations to your `database/migrations` directory, and the seeders to your `database/seeders` directory.

## Running Migrations

Run the migrations to create the `award_categories` and `awards` tables:

```bash
php artisan migrate
```

## Seeding Categories

You can seed the default award categories into the database by running the following command:

```bash
php artisan awardable:seed-categories
```

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
