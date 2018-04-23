<?php

namespace WebSisMap\Forms;

use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\Form;
use WebSisMap\Models\Unidade;
use WebSisMap\Models\User;

class GerarOSForm extends Form
{
    /**
     * @return mixed|void
     */
    public function buildForm()
    {
        date_default_timezone_set('America/Bahia');
        $user = Auth::user();
        $this
            ->add('solicit_id', 'hidden', [
                'value' => Auth::user()->id,
            ])
            ->add('nome', 'text', [
                'label' => 'Solicitante',
                'value' => Auth::user()->name,
            ])
            ->add('unid_id', 'select', [
                'choices' => $user->unidades()->pluck('nome', 'id')->toArray(),
                'label' => 'Unidade',
                'empty_value' => 'Selecione...',
                'rules' => 'required|exists:unidades,id'
            ])
            ->add('data', 'text', [
                'label' => 'Data',
                'value' => date('d-m-Y'),
            ])
            ->add('hora', 'text', [
                'label' => 'Hora',
                'value' => date('H:i'),
            ])
            ->add('descri', 'textarea', [
                'label' => 'Descrição da Ocorrência',
                'rules' => 'required'
            ])
            ->add('priori', 'select', [
                'label' => 'Prioridade',
                'choices' => ['0' => 'Normal', '1' => 'Urgente'],
                'multiple' => 'false',
                'selected' => '0',
                'rules' => 'required',
            ])
            ->add('foto1', 'file',[
                'label' => 'Fotos',
            ])
            ->add('foto2', 'file',[
                'label' => false,
            ])
            ->add('foto3', 'file',[
                'label' => false,
            ]);
    }
}
