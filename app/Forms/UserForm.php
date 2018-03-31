<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;
use WebSisMap\Models\Setor;

class UserForm extends Form
{
    public function buildForm()
    {
        $list[] = [ 0 => 'Selecione', 1 => 'Administrador', 2 => 'Operador', 3 => 'Cliente'];
        $id = $this->getData('id');
        $this
            ->add('role', 'select',[
                'label' => 'Função',
                'choices' => [$list],
                'rules' => 'required'
            ])
            ->add('setor_id', 'entity', [
                'class' => Setor::class,
                'property' => 'nome',
                'label' => 'Setor',
                'empty_value' => 'Selecione...'
            ])
            ->add('name', 'text',[
                'label' => 'Nome',
                'rules' => 'required|max:255'
            ])
            ->add('email', 'email',[
                'label' => 'E-mail',
                'rules' => "required|max:255|email|unique:users,email,$id"
            ]);
    }
}
