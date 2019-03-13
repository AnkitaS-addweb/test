<?php

$factory->define(App\Productprice::class, function (Faker\Generator $faker) {
    return [
        "vendor_id" => factory('App\User')->create(),
        "price" => $faker->name,
        "product_id" => factory('App\Productdetail')->create(),
    ];
});
