<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(),
        'category_id'=>rand(1,4),
        'slug'=>Str::slug($faker->sentence()),
        'price'=>rand(25,155),
        'images'=>'http://lorempixel.com/800/600/cats/',
        'description' => $faker->sentence()
    ];
});
