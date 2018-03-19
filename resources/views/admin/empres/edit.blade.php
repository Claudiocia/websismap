@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Editar Cadastro Empresa</h4>
        </div>
        <div class="form-control">
            {!!
                form($formEdit->add('salvar', 'submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => '<i class="fas fa-pencil-alt"></i> Editar'
                ]))
            !!}
        </div>
    </div>
@endsection