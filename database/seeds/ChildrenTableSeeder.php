<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::first();
      DB::table('children')->insert([
        'id' => uniqid(),
        'first_name' => 'Young',
        'last_name' => 'Tyke',
        'birth_date' => Carbon::parse('2012-12-01'),
        'birth_city' => 'Ann Arbor',
        'birth_state' => 'MI',
        'birth_zip' => '48103',
        'parent_id' => $user->id,
      ]);
      DB::table('children')->insert([
        'id' => uniqid(),
        'first_name' => 'Smarty Pants',
        'last_name' => 'Teenager',
        'birth_date' => Carbon::parse('2000-4-18'),
        'birth_city' => 'Flint',
        'birth_state' => 'MI',
        'birth_zip' => '48501',
        'parent_id' => $user->id,
      ]);

    }
}
