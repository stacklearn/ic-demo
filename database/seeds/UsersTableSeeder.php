<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'id' => uniqid(),
        'name' => 'Wesley Meier',
        'email' => 'wesley.meier@informationcurators.com',
        'password' => bcrypt('secret'),
      ]);
    }
}
