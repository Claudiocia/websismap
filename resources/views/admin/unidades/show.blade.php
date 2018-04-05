@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Detalhe da Unidade</h4>
        </div>
        <br/>
        <div class="row">
            {!! Button::PRIMARY('<i class="fas fa-pencil-alt"></i> Editar')->asLinkTo(route('admin.unidades.edit', ['unidade' => $unidade->id])) !!}
            {!! Button::DANGER('<i class="fas fa-times"></i> Deletar')
                        ->asLinkTo(route('admin.unidades.destroy', ['unidade' => $unidade->id]))
                        ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
            !!}
            <?php
                $formDelete = Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                    'route' => ['admin.unidades.destroy', 'unidade' => $unidade->id],
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
                    <td>{{ $unidade->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $unidade->nome }}</td>
                </tr>
                <tr>
                    <th scope="row">Setor</th>
                    <td>{{ $unidade->setor->nome }}</td>
                </tr>
                <tr>
                    <th scope="row">Tipo</th>
                    <td>{{ $unidade->tipo }}</td>
                </tr>
                <tr>
                    <th scope="row">Localização</th>
                    <td>{{ $unidade->localiz }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection