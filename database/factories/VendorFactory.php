<?php

$factory->define(App\Vendor::class, function (Faker\Generator $faker) {
    return [
        "user_id" => factory('App\User')->create(),
        "contact_person_name" => $faker->name,
        "contact_person_phone" => $faker->name,
        "contact_person_email" => $faker->safeEmail,
    ];
});
