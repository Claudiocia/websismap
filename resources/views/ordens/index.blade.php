@extends('layouts.ordens')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Listagem de OS</h4>
        </div>
        <div class="col">
            {!! Button::PRIMARY('Nova OS')->asLinkTo(route('ordens.ordens.create')) !!}
        </div>
        <div class="row" >
            {!!
                form($form->add('salvar', 'submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => '<i class="fas fa-save"></i> Buscar'
                ]))
            !!}
        </div>
        <div class="row-control">
            {!! Table::withContents($ordens->items())->striped()
                ->callback('Ações', function ($field, $orden){
                    $linkEdit = route('ordens.ordens.edit', ['orden' => $orden->id]);
                    $linkShow = route('ordens.ordens.show', ['orden' => $orden->id]);
                    $linkPDF = route('ordens.pdfos', ['orden' => $orden->id]);
                    return Button::LINK('<i class="fas fa-pencil-alt"></i>' )->asLinkTo($linkEdit).'|'.
                           Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow).'|'.
                           Button::LINK('<i class="fas fa-print"></i>')->asLinkTo($linkPDF);
                })

            !!}
        </div>
        {!! $ordens->links() !!}
    </div>
@endsection