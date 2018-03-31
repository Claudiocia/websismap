<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class SetorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Collection $predios */
        $predios = \WebSisMap\Models\Predio::all();
        factory(\WebSisMap\Models\Setor::class, 20)
            ->create()
            ->each(function ($setor) use($predios){
                $predio = $predios->random();
                $setor->predio_id = $predio->id;
                $setor->predio()->associate($predio);
                $setor->save();
            });
    }
}
