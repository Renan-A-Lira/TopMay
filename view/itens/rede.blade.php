@extends('templates.table')

@section('caption')
    <p>Rede</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-5 w-full">
        <th>LOJA</th>
        <th>LINK BACK</th>
        <th>PING</th>
        <th>LAN TO LAN</th>
        <th>PING</th>
    <tr>
@overwrite 

@section('contents')
    @foreach ($pingRedes as $item)
        <tr class="grid grid-cols-5 w-full">
            <td>{{$item['descricao']}}</td>
            <td class="flex items-center justify-center">
                @if ($item['lanBack'] == 0 || $item['lanBack'] > 800)
                    <img src={{$bola->getBola('R')}} alt="">
                @elseif($item['lanBack'] > 400)
                    <img src={{$bola->getBola('Y')}} alt="">
                @else
                    <img src={{$bola->getBola('G')}} alt="">
                @endif
            </td>
            <td>
                {{$item['lanBack']}}
            </td>

            <td class="flex items-center justify-center">
                @if ($item['lanLan'] == 0 || $item['lanBack'] > 800)
                    <img src={{$bola->getBola('R')}} alt="">
                @elseif($item['lanLan'] > 400)
                    <img src={{$bola->getBola('Y')}} alt="">
                @else
                    <img src={{$bola->getBola('G')}} alt="">
                @endif
            </td>
            <td>
                {{$item['lanLan']}}
            </td>
        </tr>

    @endforeach
@overwrite