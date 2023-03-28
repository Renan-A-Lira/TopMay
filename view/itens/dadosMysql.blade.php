
@extends('templates.table')

@section('caption')
    <p>Dados MySQL</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-6 w-full">
        <th>Banco</th>
        <th>Tipo</th>
        <th>Thread</th>
        <th>Usuário</th>
        <th>Tempo</th>
        <th> S </th>
    </tr>
@overwrite

@section('contents')

    @foreach ($dadosmysql as $item)
        
    <tr class="grid grid-cols-6 w-full">
        <td>
            {{$item->host}}
        </td>
        <td>
            {{$item->tipo}}
        </td>
        <td>
            {{$item->thread}}
        </td>
        <td>
            {{$item->usuario}}
        </td>
        <td>
            {{$item->tempo}}
        </td>
        {{-- <td class="flex items-center justify-center">
            <img src="{{$item->tempo > 10 ? bola('R') : bola('G')}}" alt="" class="h-5">
        </td> --}}
        @component('components.imgTd')
            <img src="{{$item->tempo > 10 ? $bola->getBola('R') : $bola->getBola('G')}}" alt="">
        @endcomponent
    </tr>

    @endforeach
    
@overwrite