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
            'amount' => rand(1,10),
            'price' => rand(10,100),
            'created_at' => now()
        ]);

        DB::table('drinks')->insert([
            'name' => "7Up",
            'amount' => rand(1,10),
            'price' => rand(10,100),
            'created_at' => now()
        ]);

        DB::table('drinks')->insert([
            'name' => "Coca-cola",
            'amount' => rand(1,10),
            'blocked' => true,
            'price' => rand(10,100),
            'created_at' => now()
        ]);

        DB::table('drinks')->insert([
            'name' => "Lipton",
            'amount' => rand(1,10),
            'price' => rand(10,100),
            'created_at' => now()
        ]);
    }
}
