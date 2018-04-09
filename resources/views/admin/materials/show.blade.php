@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Detalhe do Setor</h4>
        </div>
        <br/>
        <div class="row">
            {!! Button::PRIMARY('<i class="fas fa-pencil-alt"></i> Editar')->asLinkTo(route('admin.materials.edit', ['material' => $material->id])) !!}
            {!! Button::DANGER('<i class="fas fa-times"></i> Deletar')
                        ->asLinkTo(route('admin.materials.destroy', ['material' => $material->id]))
                        ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
            !!}
            <?php
                $formDelete = Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                    'route' => ['admin.materials.destroy', 'material' => $material->id],
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
                    <td>{{ $material->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $material->nome }}</td>
                </tr>
                <tr>
                    <th scope="row">Tipo</th>
                    <td>{{ $material->tipo }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection