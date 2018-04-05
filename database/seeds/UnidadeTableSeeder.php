<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class UnidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Collection $setors */
        $setors = \WebSisMap\Models\Setor::all();
        $users = \WebSisMap\Models\User::all();
        factory(\WebSisMap\Models\Unidade::class, 40)
            ->create()
            ->each(function ($unidade) use($setors, $users){
                $unidade->users()->attach($users->random(3)->pluck('id'));
                $num = rand(1,3);
                if ($num%2==0){
                    $setor = $setors->random();
                    $unidade->setor_id = $setor->id;
                    $unidade->setor()->associate($setor);
                    $unidade->save();
                }
        });
    }
}
