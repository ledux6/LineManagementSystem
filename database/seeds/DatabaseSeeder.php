<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lines')->insert([
            'name' => 'Stomotologas',
            'number' => '1',
        ]);
        DB::table('lines')->insert([
            'name' => 'Ortopedas',
            'number' => '2',
        ]);
    }
}
