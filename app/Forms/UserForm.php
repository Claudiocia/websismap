<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;

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
