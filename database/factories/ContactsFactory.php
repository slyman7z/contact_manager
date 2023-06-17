<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Company;
use App\Contacts;


$factory->define(Contacts::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
        'address' => $faker->address(),
        'company_id' => Company::pluck('id')->random()
    ];
});
