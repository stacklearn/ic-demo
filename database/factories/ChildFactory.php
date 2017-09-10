<?php

use App\User;
use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Child::class, function (Faker $faker) {
  return [
      'first_name' => 'Young',
      'last_name' => 'Tyke',
      'birth_date' => Carbon::parse('-10 years'),
      'birth_city' => 'Fakeville',
      'birth_state' => 'MI',
      'birth_zip' => '90210',
      'parent_id' => User::first()
  ];
});
