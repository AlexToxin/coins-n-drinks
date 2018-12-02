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
            'name' => Faker\Factory::create('ru_RU')->name,
            'email' => Faker\Factory::create('ru_RU')->unique()->safeEmail,
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
            'created_at' => now()
        ]);
    }
}
