<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;
use WebSisMap\Models\User;

class UnidadeRelacaoForm extends Form
{
    public function buildForm()
    {
        $this->add('users', 'entity', [
            'choices' => User::where('role', '=', '3')->pluck('name', 'id')->toArray(),
            'label' => 'Responsável',
            'selected' => $this->model?$this->model->users->pluck('name', 'id')->toArray():null,
            'multiple' => true,
            'attr' => ['name' => 'users[]']
        ]);
    }
}
