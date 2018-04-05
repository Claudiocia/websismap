@extends('layouts.admin')

@section('content')
    <div class="container">
            <div class="col-md-12">
                <h4>Nova Unidade</h4>
                <div class="form-control">
                    {!!
                        form($formCreate->add('salvar', 'submit', [
                            'attr' => ['class' => 'btn btn-primary btn-block'],
                            'label' => '<i class="fas fa-save"></i> Salvar'
                        ]))
                    !!}
                </div>
            </div>
    </div>
@endsection