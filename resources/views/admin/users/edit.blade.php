@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Editar usuário</h4>
        </div>
        <div class="row">
            {!!
                form($form->add('salvar', 'submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => '<i class="fas fa-pencil-alt"></i>'
                ]))
            !!}
        </div>
    </div>
@endsection