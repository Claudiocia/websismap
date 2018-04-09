<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;
use WebSisMap\Models\Material;
use WebSisMap\Models\User;

class UnidadeRelacaoForm extends Form
{
    public function buildForm()
    {
        $this->add('users', 'choice',  [
            'choices' => User::where('role', '=', '3')->pluck('name', 'id')->toArray(),
            'choice_options' => [
                'wrapper' => ['class' => 'choice-wrapper'],
                'label_attr' => ['class' => 'label-class'],
            ],
            'label' => 'Responsável',
            'selected' => $this->model?$this->model->users->pluck('id')->toArray():null,
            'multiple' => true,
            'expanded' => true,
            'attr' => ['name' => 'users[]']
        ])
            ->add('materials', 'choice', [
                'choices' => Material::all()->pluck('nome', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => [ 'class' => 'label-class'],
                ],
                'label' => 'Materiais / Equipamentos',
                'selected' => $this->model?$this->model->materials->pluck('id')->toArray():null,
                'multiple' => true,
                'expanded' => true,
                'attr' => ['name' => 'materials[]']
            ]);
    }
}
