@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Listagem de usuários</h4>
        </div>
        <div class="row">
            {!! Button::PRIMARY('Novo usuário')->asLinkTo(route('admin.users.create')) !!}
        </div>
        <div class="row" >
            <h4> </h4>
        </div>
        <div class="row">
            {!! Table::withContents($users->items())->striped()
                ->callback('Ações', function ($field, $user){
                    $linkEdit = route('admin.users.edit', ['user' => $user->id]);
                    $linkShow = route('admin.users.show', ['user' => $user->id]);
                    return Button::LINK('<i class="fas fa-pencil-alt"></i>' )->asLinkTo($linkEdit).'|'.
                           Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow);
                })

            !!}
        </div>
        {!! $users->links() !!}
    </div>
@endsection