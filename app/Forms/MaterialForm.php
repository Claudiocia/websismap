<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;

class MaterialForm extends Form
{
    public function buildForm()
    {
        $tipos = ['Elétrico' => 'Elétrico', 'Manual' => 'Manual', 'Mecânico' => 'Mecânico', 'Mobiliário' => 'Mobiliário', 'Outro' => 'Outro'];
        $this->add('nome', 'text')
            ->add('tipo', 'select', [
                'label' => 'Tipo',
                'choices' => $tipos,
                'empty_value' => 'Selecione...',
                'rules' => 'required'
            ])
            ->add('descricao', 'textarea')
            ->add('observacao', 'textarea');
    }
}
