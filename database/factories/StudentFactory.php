<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
// seeder class Student
use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address'=> $faker->address
    ];
});
