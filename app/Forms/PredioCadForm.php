<?php

namespace WebSisMap\Forms;

use Kris\LaravelFormBuilder\Form;
use WebSisMap\Http\Controllers\Admin\EmpresController;
use WebSisMap\Models\Empre;
use WebSisMap\Repositories\EmpreRepository;

class PredioCadForm extends Form
{
    public function buildForm()
    {
        $list = $this->formarLista();
        $this
            ->add('nome', 'text')
            ->add('localiz', 'textarea')
            ->add('empre_id', 'entity', [
                'class' => Empre::class,
                'property' => 'nome',
                'label' => 'Empresas',
                'rules' => 'required|exists:empres,id'
            ]);
    }

    /**
     * @param Request $request
     */
    private function formarLista()
    {
        $listaEmpres = Empre::all();

        return $listaEmpres;

    }
}
