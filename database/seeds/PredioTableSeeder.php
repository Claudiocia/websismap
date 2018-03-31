<?php

use Illuminate\Database\Seeder;

class PredioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\WebSisMap\Models\Predio::class, 5)->create();
    }
}
