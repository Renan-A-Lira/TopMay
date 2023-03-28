@extends('templates.table')

@php
    date_default_timezone_set('America/Fortaleza');
    $date = date('d-m-Y H:i:s');    
@endphp

@section('caption')
    <p>Replicação {{$date}}</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-3 w-full">
        <th>Host</th>
        <th>Atraso</th>
        <th>S</th>
    </tr>
@overwrite

@section('contents')

    @foreach ($replicacao as $item)
        <tr class="grid grid-cols-3 w-full">
            <td>{{$item->host ?: $item}}</td>
            <td>{{$item->atraso}}</td>
            <td class="flex items-center justify-center">
                @if ($item->atraso > 5 * 60)
                    <img src={{$bola->getBola('R')}} alt="">
                @else
                    <img src={{$bola->getBola('G')}} alt="">
                @endif
            </td>
            @if ($item->atraso >= 60 *60)
                <audio src={{audioReplicacao()}}></audio>
            @endif
        </tr>
        
        
    @endforeach
    
@overwrite