<?php

namespace WebSisMap\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Kris\LaravelFormBuilder\Facades\FormBuilder;
use WebSisMap\Forms\UnidadeForm;
use WebSisMap\Http\Controllers\Controller;
use WebSisMap\Http\Controllers\Response;
use WebSisMap\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use WebSisMap\Http\Requests\UnidadeCreateRequest;
use WebSisMap\Http\Requests\UnidadeUpdateRequest;
use WebSisMap\Models\Unidade;
use WebSisMap\Repositories\UnidadeRepository;
use WebSisMap\Validators\UnidadeValidator;

/**
 * Class UnidadesController.
 *
 * @package namespace WebSisMap\Http\Controllers;
 */
class UnidadesController extends Controller
{
    /**
     * @var UnidadeRepository
     */
    protected $repository;

    /**
     * @var UnidadeValidator
     */
    protected $validator;

    /**
     * UnidadesController constructor.
     *
     * @param UnidadeRepository $repository
     * @param UnidadeValidator $validator
     */
    public function __construct(UnidadeRepository $repository, UnidadeValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = $this->repository->paginate();
        if (count($unidades) == 0){
            return redirect()->route('admin.unidades.create');
        }
        return view('admin.unidades.index', compact('unidades'));
    }

    public function create()
    {
        $formCreate = FormBuilder::create(UnidadeForm::class, [
            'url' => route('admin.unidades.store'),
            'method' => 'POST'
        ]);
        return view('admin.unidades.create', compact( 'formCreate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UnidadeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UnidadeCreateRequest $request)
    {
        $form = FormBuilder::create(UnidadeForm::class);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        Model::unguard();
        $this->repository->create($data);
        $request->session()->flash('message', 'Nova Unidade criada com sucesso');
        return redirect()->route('admin.unidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        return view('admin.unidades.show', compact('unidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        $form = FormBuilder::create(UnidadeForm::class, [
            'url' => route('admin.unidades.update', [ 'unidade' => $unidade]),
            'method' => 'PUT',
            'model' => $unidade,
            'data' => ['id' => $unidade->id],
        ]);
        return view('admin.unidades.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UnidadeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UnidadeUpdateRequest $request, $id)
    {
       $form = FormBuilder::create(UnidadeForm::class, [
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
        $request->session()->flash('message', 'Dados da unidade alterados com sucesso');
        return redirect()->route('admin.unidades.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->delete($id);
        $request->session()->flash('message', 'Unidade excluida com sucesso');
        return redirect()->route('admin.unidades.index');
    }

    public function thumbAsset(Unidade $unidade)
    {
        return response()->download($unidade->thumb_path);
    }

    public function thumbSmallAsset(Unidade $unidade)
    {
        return response()->download($unidade->thumb_small_path);
    }
}
