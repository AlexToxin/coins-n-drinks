<?php

use Illuminate\Database\Seeder;

class CoinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            'value' => 1,
            'amount' => rand(1,10),
            'created_at' => now()
        ]);

        DB::table('coins')->insert([
            'value' => 2,
            'amount' => rand(1,10),
            'blocked' => true,
            'created_at' => now()
        ]);

        DB::table('coins')->insert([
            'value' => 5,
            'amount' => rand(1,10),
            'created_at' => now()
        ]);

        DB::table('coins')->insert([
            'value' => 10,
            'amount' => rand(1,10),
            'created_at' => now()
        ]);
    }
}
