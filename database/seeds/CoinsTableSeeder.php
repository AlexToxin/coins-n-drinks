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
            'created_at' => now()
        ]);

        DB::table('coins')->insert([
            'value' => 2,
            'created_at' => now()
        ]);

        DB::table('coins')->insert([
            'value' => 5,
            'created_at' => now()
        ]);

        DB::table('coins')->insert([
            'value' => 10,
            'created_at' => now()
        ]);
    }
}
