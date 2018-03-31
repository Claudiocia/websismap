@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Detalhe do Setor</h4>
        </div>
        <br/>
        <div class="row">
            {!! Button::PRIMARY('<i class="fas fa-pencil-alt"></i> Editar')->asLinkTo(route('admin.setors.edit', ['setor' => $setor->id])) !!}
            {!! Button::DANGER('<i class="fas fa-times"></i> Deletar')
                        ->asLinkTo(route('admin.setors.destroy', ['setor' => $setor->id]))
                        ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
            !!}
            <?php
                $formDelete = Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                    'route' => ['admin.setors.destroy', 'setor' => $setor->id],
                    'id' => 'form-delete',
                    'method' => 'DELETE',
                    'style' => 'display:none'
                    ])
            ?>
            {!! form($formDelete) !!}
        </div>
        <br/>
        <div class="row">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{ $setor->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $setor->nome }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection