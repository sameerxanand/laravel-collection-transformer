# Laravel Collection Transformer

## Introduction

This package helps developers to easily transform data in a item or in a collection of items.

## Requirements

* Laravel >= 5.4

## Installation

Install package through Composer:

    composer require spawned/transformer
    
Register service provider in the providers array in `config/app.php`

    Spawned\Transformer\TransformerServiceProvider::class

## Usage

### Generate Transformer

You can generate a new transformer by running `php artisan make:transformer {name}`. For example:

`php artisan make:transformer UserTransformer`

This will create `app\Transformers\UserTransformer.php` 

A generated transformer will look like this:
```php
class UserTransformer extends Transformer
{
    public function transform($user)
    {
        return [
            'name'  => $user->first . ' ' . $user->last
        ];
    }
}
```

Modify the returned array in the transform method to define how you want the data to be transformed.

### Using Transformers

You can transform a single item using the transform method. For example:

```php
public function show(User $user, UserTransformer $transformer)
{
    return $transformer->transform($user);
}
```

You can transform a collection of items using the transformCollection method. For example:

```php
public function index(UserTransformer $transformer)
{
    $users = User::all();

    return $transformer->transformCollection($users);
}
```

## License

Released under the MIT License, Copyright (c) 2017 - Sameer Anand (<sanand@cs.stonybrook.edu>)
