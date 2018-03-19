<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;

class CadEmpForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('fantasia', 'text')
            ->add('cnpj', 'text')
            ->add('email', 'email')
            ->add('tel', 'text')
            ->add('site', 'text')
            ->add('end', 'text')
            ->add('num', 'text')
            ->add('bairro', 'text')
            ->add('cep', 'text')
            ->add('cidade', 'text')
            ->add('uf', 'text')
            ->add('und_princ', 'text')
            ->add('und_sub1', 'text')
            ->add('und_sub2', 'text')
            ->add('und_sub3', 'text');
    }
}
