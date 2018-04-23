@extends('layouts.pdf')

@section('content')
    <div class="container">
        <div>
            <table style="border: #16181b 2px; width: 100%">
                <tr>
                    <td colspan="6"><hr/></td>
                </tr>
                <tr>
                    <td style="align-content: center"><img src="{{public_path('/image/marca.jpg') }}" height="40" alt="marca"/></td>
                    <td colspan="3" style="align-content: center"><h3 style="text-align: left;">
                            <span style="font-weight: bold"> {{ $orden->unidade->setor->predio->empre->fantasia }}<br/> Ordem de Serviço n. {{ $orden->id }}</span></h3></td>
                    <td colspan="2" style="text-align: right">
                        <h5><span style="font-weight: bold">Emissão:</span> {{ $orden->data.' - '.$orden->hora }}<br/>
                        <span style="font-weight: bold">Solicitante:</span> {{ $orden->user->name }}</h5>
                    </td>
                </tr>

                <tr>
                    <td><span style="font-weight: bold">Unidade:</span><br/>{{ $orden->unidade->nome }}</td>
                    <td><span style="font-weight: bold">Setor:</span><br/>{{ $orden->unidade->setor->nome }}</td>
                    <td>
                        <span style="font-weight: bold">Prioridade:</span><br/> @if($orden->priori == 0) Normal
                                                                              @else Urgente
                                                                              @endif
                    </td>
                    <td colspan="2"><span style="font-weight: bold">Atendente:</span><br/>  @if(!isset($orden->atend->name)) Não Designado
                                                                            @else {{$orden->atend->name}} @endif
                    </td>
                    <td><span style="font-weight: bold">Status:</span><br/>
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
                    <td colspan="6" style="height: 250px"><span style="font-weight: bold">Descrição:</span>
                        <p>{{ $orden->descri }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td colspan="6" style="height: 100px"><span style="font-weight: bold">Material a ser utilizado:</span>
                        <p>Não se aplica</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"><span style="font-weight: bold">Fotos da ocorrência (caso existam):</span></td>
                </tr>
                <tr>
                    <td colspan="2" style="height: 80px">
                        <span style="font-weight: bold">Foto1:</span>
                        <div><img src="{{public_path('/image/sem_foto.jpg') }}" height="80" alt="sem foto"/></div>
                    </td>
                    <td colspan="2" style="height: 80px">
                        <span style="font-weight: bold">Foto2:</span>
                        <div><img src="{{public_path('/image/sem_foto.jpg') }}" height="80" alt="sem foto"/></div>
                    </td>
                    <td colspan="2" style="height: 80px">
                        <span style="font-weight: bold">Foto3:</span>
                        <div><img src="{{public_path('/image/sem_foto.jpg') }}" height="80" alt="sem foto"/></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="height: 200px"><span style="font-weight: bold">Serviços Executados:</span><br/>
                        <p>Area para uso do atendente </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"><hr/></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div align="center" style="font-size: 60%; text-align: center">
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