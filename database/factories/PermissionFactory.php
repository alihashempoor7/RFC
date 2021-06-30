<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\Spatie\Permission\Models\Permission::class, function (Faker $faker) {
    return [
        'name'=>$faker->name
    ];
});
