@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Lista de Materiais</h4>
        </div>
        <div class="row">
            {!! Button::PRIMARY('Novo material')->asLinkTo(route('admin.materials.create')) !!}
        </div>
        <div class="row">
            <h4> </h4>
        </div>
        <div class="row">
            {!! Table::withContents($materials->items())->striped()
                ->callback('Ações', function ($field, $material){
                    $linkEdit = route("admin.materials.edit", ['material' => $material->id]);
                    $linkShow = route('admin.materials.show', ['material' => $material->id]);
                    return Button::LINK('<i class="fas fa-pencil-alt"></i>' )->asLinkTo($linkEdit).'|'.
                           Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow);
                })

            !!}
        </div>
        {!! $materials->links() !!}
    </div>
@endsection