<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'photo' => $faker->image,
        'description' => $faker->text,
        'category' => $faker->text,
        'price'=> $faker->numberBetween(5,10),
    ];
});
