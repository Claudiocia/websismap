<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;
use WebSisMap\Models\Predio;
use WebSisMap\Models\Setor;

class UnidadeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('setor_id', 'entity', [
                'class' => Setor::class,
                'property' => 'nome',
                'label' => 'Setor',
                'empty_value' => 'Selecione...',
                'rules' => 'required|exists:setors,id'
            ])
            ->add('predio_id', 'entity', [
                'class' => Predio::class,
                'property' => 'nome',
                'label' => 'Predio',
                'empty_value' => 'Selecione...',
                'rules' => 'required|exists:predios,id'
            ])
            ->add('tipo', 'text')
            ->add('localiz', 'text')
            ->add('foto', 'text');
    }
}
