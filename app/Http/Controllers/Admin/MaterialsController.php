<?php

namespace WebSisMap\Http\Controllers\Admin;

use Kris\LaravelFormBuilder\Facades\FormBuilder;
use WebSisMap\Forms\MaterialForm;
use WebSisMap\Http\Controllers\Controller;
use WebSisMap\Models\Material;
use Illuminate\Http\Request;
use WebSisMap\Repositories\MaterialRepository;

class MaterialsController extends Controller
{
    private $repository;

    /**
     * MaterialsController constructor.
     */
    public function __construct(MaterialRepository $repository)
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
        $materials = $this->repository->paginate();
        if (count($materials) == 0){
            return redirect()->route('admin.materias.create');
        }
        return view('admin.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = FormBuilder::create(MaterialForm::class, [
           'url' => route('admin.materials.store'),
           'method' => 'POST'
        ]);

        return view('admin.materials.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = FormBuilder::create(MaterialForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $this->repository->create($data);
        $request->session()->flash('message', 'Novo Material cadastrado com sucesso!');
        return redirect()->route('admin.materials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \WebSisMap\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        return view('admin.materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \WebSisMap\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $form = FormBuilder::create(MaterialForm::class, [
            'url' => route('admin.materials.update', ['material' => $material->id]),
            'method' => 'PUT',
            'model' => $material
        ]);
        return view('admin.materials.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSisMap\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = FormBuilder::create(MaterialForm::class, [
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
        $request->session()->flash('message', 'Dados do material alterados com sucesso');
        return redirect()->route('admin.materials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \WebSisMap\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->delete($id);
        $request->session()->flash('message', 'Material excluido com sucesso');
        return redirect()->route('admin.materials.index');
    }
}
