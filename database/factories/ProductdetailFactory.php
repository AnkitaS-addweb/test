<?php

$factory->define(App\Productdetail::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "type" => $faker->name,
        "parent_product_id" => factory('App\Productdetail')->create(),
    ];
});
