@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Lista de Unidades</h4>
        </div>
        <div class="row">
            {!! Button::PRIMARY('Nova Unidade')->asLinkTo(route('admin.unidades.create')) !!}
        </div>
        <div class="row">
            <h4> </h4>
        </div>
        <div class="row">
            {!! Table::withContents($unidades->items())->striped()
                ->callback('Detalhes', function ($field, $unidade){
                return MediaObject::withContents([
                'image' => '//placehold.it/64x64',
                'link' => '#',
                'heading' => $unidade->nome,
                'body' => ' Setor: '.$unidade->setor->nome.'<br/>Localização: '.$unidade->localiz
                ]);
                })
                ->callback('Ações', function ($field, $unidade){
                    $linkEdit = route("admin.unidades.edit", ['unidade' => $unidade->id]);
                    $linkShow = route('admin.unidades.show', ['unidade' => $unidade->id]);
                    $linkUser = route('admin.unids.relacoes.create', ['unidade' => $unidade->id]);
                    return Button::LINK('<i class="fas fa-pencil-alt"></i>' )->asLinkTo($linkEdit).'|'.
                           Button::LINK('<i class="fas fa-user"></i>' )->asLinkTo($linkUser).'|'.
                           Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow);
                })
            !!}
        </div>
        {!! $unidades->links() !!}
    </div>
@endsection
@push('style')
    <style>
        .media-body{
            width: auto;
        }
    </style>
@endpush