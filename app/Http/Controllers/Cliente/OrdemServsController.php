<?php

namespace WebSisMap\Http\Controllers\Cliente;

use Barryvdh\DomPDF\PDF;
use Dompdf\Adapter\PDFLib;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use WebSisMap\Forms\BuscarOSForm;
use WebSisMap\Forms\GerarOSForm;
use WebSisMap\Http\Controllers\Controller;
use WebSisMap\Models\OrdemServ;
use Illuminate\Http\Request;
use WebSisMap\Models\Unidade;
use WebSisMap\Models\User;
use WebSisMap\Repositories\OrdemServRepository;

class OrdemServsController extends Controller
{
    /**
     * @var OrdemServRepository
     */
    private $repository;

    /**
     * OdemServsController constructor.
     */
    public function __construct(OrdemServRepository $repository)
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
        //$ordens = $this->repository->paginate();
        $id = Auth::user()->id;
        $ordens = $this->repository->whereUser($id)->paginate();
        $form = \FormBuilder::create(BuscarOSForm::class, [
            'url' => route('ordens.unidadelist'),
            'method' => 'GET',
        ]);
        return view('ordens.index', compact('ordens', 'form'));
    }

    public function unidade()
    {
        $form = \FormBuilder::create(BuscarOSForm::class);
        $data = $form->getFieldValues();

        foreach ( $data as $v ) {
            $id = $v;
        }
        $ordens = $this->repository->whereUnidade($id)->paginate();

        $form = \FormBuilder::create(BuscarOSForm::class, [
            'url' => route('ordens.unidadelist'),
            'method' => 'GET',
        ]);
        return view('ordens.index', compact('ordens', 'form'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(GerarOSForm::class, [
            'url' => route('ordens.ordens.store'),
            'method' => 'POST',
        ]);

        return view('ordens.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(GerarOSForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $form->remove('nome');
        $data = $form->getFieldValues();
        $this->repository->create($data);
        $request->session()->flash('message', 'Foi Gerada um novo Pedido de Serviço');
        return redirect()->route('ordens.ordens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \WebSisMap\Models\OrdemServ  $ordemServ
     * @return \Illuminate\Http\Response
     */
    public function show(OrdemServ $orden)
    {
        return view('ordens.show', compact('orden'));
    }

    /**
     * @param OrdemServ $orden
     * @return \Illuminate\Http\Response
     */
    public function imprimirPdf(OrdemServ $orden)
    {
        return \PDF::loadView('ordens.pdfos', compact('orden'))->stream('document.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \WebSisMap\Models\OrdemServ  $ordemServ
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdemServ $ordemServ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSisMap\Models\OrdemServ  $ordemServ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdemServ $ordemServ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \WebSisMap\Models\OrdemServ  $ordemServ
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdemServ $ordemServ)
    {
        //
    }
}
