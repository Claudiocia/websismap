@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Detalhe do usuário</h4>
        </div>
        <br/>
        <div class="row">
            {!! Button::PRIMARY('<i class="fas fa-pencil-alt"></i>')->asLinkTo(route('admin.users.edit', ['user' => $user->id])) !!}
            {!! Button::DANGER('<i class="fas fa-times"></i>')
                        ->asLinkTo(route('admin.users.destroy', ['user' => $user->id]))
                        ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
            !!}
            <?php
                $formDelete = Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                    'route' => ['admin.users.destroy', 'user' => $user->id],
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
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection