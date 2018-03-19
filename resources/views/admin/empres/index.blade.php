@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Listagem de usuários</h4>
        </div>
        <div class="row">
            {!! Button::PRIMARY('<i class="fas fa-pencil-alt"></i> Editar')->asLinkTo(route('admin.empres.edit', ['empre' => $empres->id])) !!}
        </div>
        <div class="row">
            <h4> </h4>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>ID: {{ $empres->id }}</td>
                    <td colspan="2">Nome: {{ $empres->nome }}</td>
                </tr>
                <tr>
                    <td colspan="3">Nome Fantasia: {{ $empres->fantasia }}</td>
                </tr>
                <tr>
                    <td>CNPJ: {{$empres->cnpj}}</td>
                    <td>Email: {{ $empres->email }}</td>
                    <td>Tel.: {{ $empres->tel }}</td>
                </tr>
                <tr>
                    <td colspan="2">Site.: {{$empres->site}} </td>
                    <td>CEP.: {{ $empres->cep }}</td>
                </tr>
                <tr>
                    <td colspan="2">End: {{ $empres->end.', '.$empres->num.' - Bairro: '.$empres->bairro}}</td>
                    <td>Cidade: {{ $empres->cidade.'/'.$empres->uf }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection