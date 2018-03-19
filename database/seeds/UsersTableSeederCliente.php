<?php

use Illuminate\Database\Seeder;

class UsersTableSeederCliente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\WebSisMap\Models\User::class, 10)
            ->states('cliente')
            ->create()->each(function ($user){
                $user->verified = true;
                $user->save();
            });
        factory(\WebSisMap\Models\User::class, 10)
            ->states('operador')
            ->create()->each(function ($user){
                $user->verified = true;
                $user->save();
            });
    }
}
