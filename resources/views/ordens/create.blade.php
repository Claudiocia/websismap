@extends('layouts.ordens')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Novo Pedido de Serviço</h4>
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
@endsection