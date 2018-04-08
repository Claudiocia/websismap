<?php

namespace WebSisMap\Http\Controllers\Admin;

use WebSisMap\Forms\UnidadeRelacaoForm;
use WebSisMap\Models\Unidade;
use Illuminate\Http\Request;
use WebSisMap\Http\Controllers\Controller;
use WebSisMap\Repositories\UnidadeRepository;

class UnidadeRelacoesController extends Controller
{
    /**
     * @var UnidadeRepository
     */
    private $repository;

    /**
     * UnidadeRelacoesController constructor.
     */
    public function __construct(UnidadeRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unidade $unidade)
    {
        $form = \FormBuilder::create(UnidadeRelacaoForm::class, [
            'url' => route('admin.unids.relacoes.store', ['unidade' => $unidade->id]),
            'method' => 'POST',
            'model' => $unidade
        ]);

        return view('admin.unidades.relacoes-create', compact('form', 'unidade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $form = \FormBuilder::create(UnidadeRelacaoForm::class);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $this->repository->update($data, $id);
        $request->session()->flash('message', 'Dados dos responsaveis registrados com sucesso.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \WebSisMap\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \WebSisMap\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSisMap\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidade $unidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \WebSisMap\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        //
    }
}
