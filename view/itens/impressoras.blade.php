@extends('templates.table')

@section('caption')
<p>Impressoras</p>
@overwrite

@section('titles')
<tr class="grid grid-cols-[1fr_3fr_1fr] w-full">
        <th>Impressora</th>
        <th>Problema</th>
        <th>Qtd</th>
    </tr>
@overwrite 

@section('contents')
    @foreach ($impressoras as $item)
        <tr class="grid grid-cols-[1fr_3fr_1fr] w-full ">
            <td> {{$item->nome}} </td>
            <td valign=top> {{utf8_encode($item->problema)}} </td>
            <td> {{$item->qtd}} </td>
        </tr>
    @endforeach
@overwrite

