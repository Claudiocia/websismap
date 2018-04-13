<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;
use WebSisMap\Models\Predio;
use WebSisMap\Models\Setor;

class UnidadeForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $rulesThumb = 'image|max:1024';
        //$rulesThumb = !$id ? "required|$rulesThumb" : $rulesThumb;
        $this
            ->add('nome', 'text')
            ->add('setor_id', 'entity', [
                'class' => Setor::class,
                'property' => 'nome',
                'label' => 'Setor',
                'empty_value' => 'Selecione...',
                'rules' => 'required|exists:setors,id'
            ])
            ->add('tipo', 'text')
            ->add('localiz', 'text')
            ->add('foto', 'file',[
                'required' => !$id ? true : false,
                'rules' => $rulesThumb
            ]);
    }
}
