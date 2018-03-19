<?php

namespace WebSisMap\Http\Controllers\Admin;

use Kris\LaravelFormBuilder\Facades\FormBuilder;
use WebSisMap\Forms\SetorForm;
use WebSisMap\Http\Controllers\Controller;
use WebSisMap\Models\Setor;
use Illuminate\Http\Request;
use WebSisMap\Repositories\SetorRepository;

class SetorsController extends Controller
{
    private $repository;

    /**
     * SetorsController constructor.
     */
    public function __construct(SetorRepository $repository)
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
        $setors = $this->repository->paginate();
        if (count($setors) == 0){
            return redirect()->route('admin.setors.create');
        }
        return view('admin.setors.index', compact('setors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formCreate = FormBuilder::create(SetorForm::class, [
            'url' => route('admin.setors.store'),
            'method' => 'POST'
        ]);

        return view('admin.setors.create', compact('formCreate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = FormBuilder::create(SetorForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $this->repository->create($data);
        $request->session()->flash('message', 'Novo Setor cadastrado com sucesso!');
        return redirect()->route('admin.setors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \WebSisMap\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function show(Setor $setor)
    {
        return view('admin.setors.show', compact('setor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \WebSisMap\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function edit(Setor $setor)
    {
        $form = FormBuilder::create(SetorForm::class, [
            'url' => route('admin.setors.update', ['setor' => $setor->id]),
            'method' => 'PUT',
            'model' => $setor
        ]);
        return view('admin.setors.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSisMap\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = FormBuilder::create(SetorForm::class, [
            'data' => ['id' => $id]
        ]);
        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $this->repository->update($data, $id);
        $request->session()->flash('message', 'Dados do setor alterados com sucesso');
        return redirect()->route('admin.setors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->delete($id);
        $request->session()->flash('message', 'Setor excluido com sucesso');
        return redirect()->route('admin.setors.index');
    }
}
