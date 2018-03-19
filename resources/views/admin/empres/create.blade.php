@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Cadastrar Empresa</h4>
        </div>
        <div class="form-control">
            {!!
                form($formCad->add('salvar', 'submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => '<i class="fas fa-save"></i> Salvar'
                ]))
            !!}
        </div>
    </div>
@endsection