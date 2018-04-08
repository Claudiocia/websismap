@extends('layouts.admin')

@section('content')
    <div class="container">
            <div class="col-md-12">
                <h4>Gerenciar Unidade - {!! $unidade->nome !!}</h4>
                <div class="text-right">
                    {!! Button::PRIMARY('Listar Unidades')->asLinkTo(route('admin.unidades.index')) !!}
                </div>
                <div class="row">
                    <h4> </h4>
                </div>
                <div class="form-control">
                    {!!
                        form($form->add('salvar', 'submit', [
                            'attr' => ['class' => 'btn btn-primary btn-block'],
                            'label' => '<i class="fas fa-save"></i> Salvar'
                        ]))
                    !!}
                </div>
            </div>
    </div>
@endsection