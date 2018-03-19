@extends('layouts.admin')

@section('content')
<div class="container">
   <div class="row">
       <h3>Registrar senha de usuário</h3>
       {!! form($form->add('salvar', 'submit',
            [
                'attr' => ['class' => 'btn btn-primary btn-block'], 'label' => 'Salvar'
            ]
       )) !!}
   </div>
</div>
@endsection
