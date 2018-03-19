<?php

namespace WebSisMap\Http\Controllers\Admin;

use FormBuilder;
use Illuminate\Http\Request;

use WebSisMap\Forms\CadEmpForm;
use WebSisMap\Http\Controllers\Controller;
use WebSisMap\Http\Controllers\Response;
use WebSisMap\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use WebSisMap\Http\Requests\EmpreCreateRequest;
use WebSisMap\Http\Requests\EmpreUpdateRequest;
use WebSisMap\Models\Empre;
use WebSisMap\Repositories\EmpreRepository;
use WebSisMap\Validators\EmpreValidator;

/**
 * Class EmpresController.
 *
 * @package namespace WebSisMap\Http\Controllers;
 */
class EmpresController extends Controller
{
    /**
     * @var EmpreRepository
     */
    protected $repository;

    /**
     * @var EmpreValidator
     */
    protected $validator;

    /**
     * EmpresController constructor.
     *
     * @param EmpreRepository $repository
     * @param EmpreValidator $validator
     */
    public function __construct(EmpreRepository $repository, EmpreValidator $validator)
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
        $empres = $this->repository->first();

        if(count($empres) == 1) {
            return view('admin.empres.index', compact('empres'));
        }
        else{
            $formCad = FormBuilder::create(CadEmpForm::class, [
                'url' => route('admin.empres.store'),
                'method' => 'POST'
            ]);

            return view('admin.empres.create', compact('formCad'));
        }
    }

    public function create()
    {
        $empres = $this->repository->first();
        if (count($empres) == 1){
            return view('admin.empres.index', compact('empres'));
        }
        else {
            $formCad = FormBuilder::create(CadEmpForm::class, [
                'url' => route('admin.empres.store'),
                'method' => 'POST'
            ]);

            return view('admin.empres.create', compact('formCad'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmpreCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $formCad = FormBuilder::create(CadEmpForm::class);

        if (!$formCad->isValid()){
            return redirect()
                ->back()
                ->withErrors($formCad->getErrors())
                ->withInput();
        }
        $data = $formCad->getFieldValues();
        $this->repository->create($data);
        $request->session()->flash('message', 'Empresa Master criada com sucesso.');
        return redirect()->route('admin.empres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Empre $empre
     * @return \Illuminate\Http\Response
     */
    public function show(Empre $empre)
    {
        return view('admin.empres.show', compact('empre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Empre $empre
     * @return \Illuminate\Http\Response
     */
    public function edit(Empre $empre)
    {
        $formEdit = FormBuilder::create(CadEmpForm::class,[
            'url' => route('admin.empres.update', ['empre' => $empre->id]),
            'method' => 'PUT',
            'model' => $empre
        ]);

        return view('admin.empres.edit', compact('formEdit'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $form = FormBuilder::create(CadEmpForm::class, [
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
        $request->session()->flash('message', 'Cadastro alterado com sucesso.');
        return redirect()->route('admin.empres.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Empre deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Empre deleted.');
    }
}
