<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeederCliente::class);
         $this->call(EmpresaTableSeeder::class);
         $this->call(PredioTableSeeder::class);
         $this->call(SetorTableSeeder::class);
         //$this->call(UnidadeTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
    }
}
