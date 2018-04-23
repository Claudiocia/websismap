@extends('layouts.ordens')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Ordem de Serviço n. {{ $orden->id }} </h4>
        </div>
        <br/>
        <div class="nav-tabs">
            {!! Button::SUCCESS('Listar OS')->asLinkTo(route('ordens.ordens.index'))
                        ->addAttributes(['class'=>'btn-success'])!!}

            {!! Button::PRIMARY('<i class="fas fa-pencil-alt"></i> Editar')
                        ->asLinkTo(route('ordens.ordens.edit', ['ordemServ' => $orden->id]))!!}

            {!! Button::DANGER('<i class="fas fa-times"></i> Deletar')
                        ->asLinkTo(route('ordens.ordens.destroy', ['ordemServ' => $orden->id]))
                        ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
            !!}
            {!! Button::INFO('Imprimir OS')->asLinkTo(route('ordens.pdfos', ['orden' => $orden->id]))
                        ->addAttributes(['class'=>'btn-info'])!!}
            <?php
                $formDelete = Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                    'route' => ['ordens.ordens.destroy', 'ordemServ' => $orden->id],
                    'id' => 'form-delete',
                    'method' => 'DELETE',
                    'style' => 'display:none'
                    ])
            ?>
            {!! form($formDelete) !!}
        </div>
        <br/>
        <div class="form-control">
            <table class="table">
                <tbody>
                <tr>
                    <th colspan="3"><h5>{{ Html::image('/image/marca.jpg', 'marca', ['height' => '40']) }}
                            <span class="font-weight-bold">Ordem de Serviço n.</span> {{ $orden->id }}</h5></th>
                    <th colspan="3">
                        <h5 class="text-right"><span class="font-weight-bold">Emissão:</span> {{ $orden->data.' - '.$orden->hora }}</h5>
                        <h5 class="text-right"><span class="font-weight-bold">Solicitante:</span> {{ $orden->user->name }}</h5>
                    </th>
                </tr>
                <tr>
                    <td><span class="font-weight-bold">Unidade:</span> {{ $orden->unidade->nome }}</td>
                    <td><span class="font-weight-bold">Setor:</span> {{ $orden->unidade->setor->nome }}</td>
                    <td>
                        <span class="font-weight-bold">Prioridade:</span> @if($orden->priori == 0) Normal
                                                                              @else Urgente
                                                                              @endif
                    </td>
                    <td colspan="2"><span class="font-weight-bold">Atendente:</span>  @if(!isset($orden->atend->name)) Não Designado
                                                                            @else {{$orden->atend->name}} @endif
                    </td>
                    <td><span class="font-weight-bold">Status:</span>
                            @switch($orden->status)
                                @case(0)
                                    Solicitado
                                @break
                                @case(1)
                                    Em Atendimento
                                @break
                                @case(2)
                                    Com Terceiros
                                @break
                                @case(3)
                                    Pendente
                                @break
                                @case(4)
                                    Concluído
                                @break
                                @case(5)
                                    Cancelado
                                @break

                                @endswitch
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="border border-dark" style="height: 250px"><span class="font-weight-bold">Descrição:</span>
                        <p>{{ $orden->descri }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td colspan="6" class="border border-dark" style="height: 100px"><span class="font-weight-bold">Material a ser utilizado:</span>
                        <p></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"><span class="font-weight-bold">Fotos da ocorrência (caso existam)</span></td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-dark" style="height: 60px">
                        <span class="font-weight-bold">Foto1:</span>
                        <div class="col align-center">{{ Html::image('/image/sem_foto.jpg', 'semfoto', ['height' => '80']) }}</div>
                    </td>
                    <td colspan="2" class="border border-dark" style="height: 60px">
                        <span class="font-weight-bold">Foto2:</span>
                        <div class="col align-center">{{ Html::image('/image/sem_foto.jpg', 'semfoto', ['height' => '80']) }}</div>
                    </td>
                    <td colspan="2" class="border border-dark" style="height: 60px">
                        <span class="font-weight-bold">Foto3:</span>
                        <div class="col align-center">{{ Html::image('/image/sem_foto.jpg', 'semfoto', ['height' => '80']) }}</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"><span class="font-weight-bold">Atendimento</span></td>
                </tr>
                <tr>
                    <td colspan="6" class="border border-dark" style="height: 100px"><span class="font-weight-bold">Serviços Executados:</span>
                        <p></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td colspan="6" class="border border-dark" style="height: 100px">
                        <div class="font-weight-bold text-center" align="center" style="font-size: 80%">
                            Empresa: {{ $orden->unidade->setor->predio->empre->nome }}<br/>
                            CNPJ: {{ $orden->unidade->setor->predio->empre->cnpj }}<br/>
                            Endereço {{ $orden->unidade->setor->predio->empre->end .', '.
                            $orden->unidade->setor->predio->empre->num .' - '.
                            $orden->unidade->setor->predio->empre->bairro .' - CEP: '.
                            $orden->unidade->setor->predio->empre->cep }}<br/>
                            {{ $orden->unidade->setor->predio->empre->cidade .' - '. $orden->unidade->setor->predio->empre->uf}}
                        </div>
                    </td>
                </tr>

            </table>
        </div>
    </div>
@endsection