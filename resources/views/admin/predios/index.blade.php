@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Lista de Prédios</h4>
        </div>
        <div class="row">
            {!! Button::PRIMARY('Novo prédio')->asLinkTo(route('admin.predios.create')) !!}
        </div>
        <div class="row">
            <h4> </h4>
        </div>
        <div class="row">
            {!! Table::withContents($predios->items())->striped()
                ->callback('Ações', function ($field, $predio){
                    $linkEdit = route('admin.predios.edit', ['predio' => $predio->id]);
                    $linkShow = route('admin.predios.show', ['predio' => $predio->id]);
                    return Button::LINK('<i class="fas fa-pencil-alt"></i>' )->asLinkTo($linkEdit).'|'.
                           Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow);
                })

            !!}
        </div>
        {!! $predios->links() !!}
    </div>
@endsection