
@extends('templates.table')

@section('caption')
    <p>Top</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-6 w-full">
        <th>PID</th>
        <th>USER</th>
        <th>Comando</th>
        <th>%CPU</th>
        <th>%MEM</th>
        <th>S</th>
    </tr>
@overwrite

@section('contents')

    @foreach ($top as $item)
        <tr class="grid grid-cols-6 w-full">
            <td>{{$item->pid}}</td>
            <td>{{$item->user}}</td>
            <td>{{$item->comando}}</td>
            <td>{{$item->cpu}}</td>
            <td>{{$item->mem}}</td>
            <td class="flex items-center justify-center">
                @if ($item->cpu > 80)
                    <img src={{$bola->getBola('R')}} alt="">
                @elseif ($item->cpu > 40)
                    <img src={{$bola->getBola('Y')}} alt="">
                @else
                    <img src={{$bola->getBola('G')}} alt="">
                    
                @endif
            </td>
        </tr>
    @endforeach

@overwrite