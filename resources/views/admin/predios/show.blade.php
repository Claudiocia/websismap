@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Detalhe do Prédio</h4>
        </div>
        <br/>
        <div class="row">
            {!! Button::PRIMARY('<i class="fas fa-pencil-alt"></i> Editar')->asLinkTo(route('admin.predios.edit', ['predio' => $predio->id])) !!}
            {!! Button::DANGER('<i class="fas fa-times"></i> Deletar')
                        ->asLinkTo(route('admin.predios.destroy', ['predio' => $predio->id]))
                        ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
            !!}
            <?php
                $formDelete = Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                    'route' => ['admin.predios.destroy', 'predio' => $predio->id],
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
                    <td>{{ $predio->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $predio->nome }}</td>
                </tr>
                <tr>
                    <th scope="row">Localização</th>
                    <td>{{ $predio->localiz }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection