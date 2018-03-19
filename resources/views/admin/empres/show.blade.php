@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Detalhe da Empresa</h4>
        </div>
        <br/>
        <div class="row">
            {!! Button::PRIMARY('<i class="fas fa-pencil-alt"></i>')->asLinkTo(route('admin.empres.edit', ['empre' => $empre->id])) !!}
            {!! Button::DANGER('<i class="fas fa-times"></i>')
                        ->asLinkTo(route('admin.empres.destroy', ['empre' => $empre->id]))
                        ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
            !!}
            <?php
                $formDelete = Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                    'route' => ['admin.empres.destroy', 'empre' => $empre->id ],
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
                    <th scope="row">id</th>
                    <td>{{ $empre->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $empre->cnpj }}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $empre->email }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection