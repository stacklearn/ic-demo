<?php

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

$factory->define(App\CalendarEvent::class, function (Faker $faker) {
  return [
    'title' => 'Payment',
    'isAllDay'=> false,
    'start' => Carbon::now()->addWeeks(1),
    'end' => Carbon::now()->addWeeks(1)->addDays(1),
    'id' => uniqid(),
  ];
});
