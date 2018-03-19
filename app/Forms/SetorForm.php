<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;
use WebSisMap\Models\Predio;
use WebSisMap\Models\User;


class SetorForm extends Form
{

    public function buildForm()
    {

        $this->add('nome', 'text')
            ->add('predio_id', 'entity', [
                'class' => Predio::class,
                'property' => 'nome',
                'label' => 'Localização',
                'rules' => 'required|exists:predios,id'
            ])
            ->add('user_id', 'select', [
                'choices' => [User::where('role', '=', '3')->pluck('name', 'id')->toArray()],
                'label' => 'Responsável',
                'rules' => 'required|exists:users,id'
            ]);
    }

}
