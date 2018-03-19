@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Lista de Setores</h4>
        </div>
        <div class="row">
            {!! Button::PRIMARY('Novo setor')->asLinkTo(route('admin.setors.create')) !!}
        </div>
        <div class="row">
            <h4> </h4>
        </div>
        <div class="row">
            {!! Table::withContents($setors->items())->striped()
                ->callback('Ações', function ($field, $setor){
                    $linkEdit = route("admin.setors.edit", ['setor' => $setor->id]);
                    $linkShow = route('admin.setors.show', ['setor' => $setor->id]);
                    return Button::LINK('<i class="fas fa-pencil-alt"></i>' )->asLinkTo($linkEdit).'|'.
                           Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow);
                })

            !!}
        </div>
        {!! $setors->links() !!}
    </div>
@endsection