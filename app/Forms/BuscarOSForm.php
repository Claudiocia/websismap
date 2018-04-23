<?php

namespace WebSisMap\Forms;

use Auth;
use Kris\LaravelFormBuilder\Form;

class BuscarOSForm extends Form
{
    public function buildForm()
    {
        $user = Auth::user();
        $this
            ->add('unid_id', 'select', [
                'choices' => $user->unidades()->pluck('nome', 'id')->toArray(),
                'label' => 'Buscar os por Unidade',
                'empty_value' => 'Selecione a unidade',
                'rules' => 'required|exists:unidades,id'
            ]);
    }
}
