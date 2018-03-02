@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Novo usuário</h4>
        </div>
        <div class="row">
            <?php $icon = Icon::create('floppy disk'); ?>
            {!!
                form($form->add('salvar', 'submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => $icon.'Salvar'
                ]))
            !!}
        </div>
    </div>