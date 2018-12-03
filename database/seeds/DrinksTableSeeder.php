<?php

use Illuminate\Database\Seeder;

class DrinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drinks')->insert([
            'name' => "Pepsi",
            'price' => rand(10,100),
            'created_at' => now()
        ]);

        DB::table('drinks')->insert([
            'name' => "7Up",
            'price' => rand(10,100),
            'created_at' => now()
        ]);

        DB::table('drinks')->insert([
            'name' => "Coca-cola",
            'blocked' => true,
            'price' => rand(10,100),
            'created_at' => now()
        ]);

        DB::table('drinks')->insert([
            'name' => "Lipton",
            'price' => rand(10,100),
            'created_at' => now()
        ]);
    }
}
