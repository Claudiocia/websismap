<?php

namespace WebSisMap\Http\Controllers\Admin;

use Kris\LaravelFormBuilder\Facades\FormBuilder;
use WebSisMap\Forms\PredioCadForm;
use WebSisMap\Http\Controllers\Controller;
use WebSisMap\Models\Empre;
use WebSisMap\Models\Predio;
use Illuminate\Http\Request;
use WebSisMap\Repositories\PredioRepository;

class PrediosController extends Controller
{
    private $repository;

    /**
     * PrediosController constructor.
     */
    public function __construct(PredioRepository $repository)
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
        $predios = $this->repository->paginate();
        if (count($predios) == 0){

            $formCreate = \FormBuilder::create(PredioCadForm::class, [
                'url' => route('admin.predios.store'),
                'method' => 'POST'
            ]);

            return view('admin.predios.create', compact('formCreate'));
        }
        return view('admin.predios.index', compact('predios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formCreate = \FormBuilder::create(PredioCadForm::class, [
            'url' => route('admin.predios.store'),
            'method' => 'POST'
        ]);

        return view('admin.predios.create', compact('formCreate' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(PredioCadForm::class);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $this->repository->create($data);
        $request->session()->flash('message', 'Novo prédio cadastrado com sucesso!');
        return redirect()->route('admin.predios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \WebSisMap\Models\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function show(Predio $predio)
    {
       return view('admin.predios.show', compact('predio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \WebSisMap\Models\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function edit(Predio $predio)
    {
        $form = FormBuilder::create(PredioCadForm::class,[
            'url' => route('admin.predios.update', [ 'predio' => $predio->id]),
            'method' => 'PUT',
            'model' =>$predio
        ]);
        return view('admin.predios.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSisMap\Models\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = FormBuilder::create(PredioCadForm::class, [
            'data' =>['id' => $id]
        ]);
        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = array_except($form->getFieldValues(), ['empre_id']);
        $this->repository->update($data, $id);
        $request->session()->flash('message', 'Dados do prédio alterado com sucesso.');
        return redirect()->route('admin.predios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \WebSisMap\Models\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->delete($id);
        $request->session()->flash('message', 'Prédio excluido com sucesso.');
        return redirect()->route('admin.predios.index');
    }
}
