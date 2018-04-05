<?php
$tabs = [
    [
        'title' => 'Informações',
        'link' => !isset($unidade)?route('admin.unidades.create'):route('admin.unidades.edit', ['unidade' => $unidade->id]),
    ],
    [
        'title' => 'Usuários',
        'link' => !isset($unidade)?'':route('admin.unids.relacoes.create', ['unidade' => $unidade->id]),
        'disabled' => !isset($unidade)?true:false
    ],
    [
        'title' => 'Foto',
        'link' => ''
    ]
];
?>

<h3>Gerenciar Unidades</h3>
<div class="text-right">
    {!! Button::PRIMARY('Listar Unidades')->asLinkTo(route('admin.unidades.index')) !!}
</div>
{!! Navigation::tabs($tabs) !!}
<div>
    {!! $slot !!}
</div>

