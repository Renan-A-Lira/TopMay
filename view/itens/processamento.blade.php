@extends('templates.table')

@section('caption')
    <p>Processamento</p>
@overwrite

@section('titles')
    <tr></tr>
@overwrite 

@section('contents')
    @foreach ($processamento as $key => $value)
        <tr class="grid grid-cols-2 w-full ">
            @if ($key == 'datahora')
                
            @elseif ($key == 'nProcess')


                <td class="font-bold">Não process</td>
                <td class="{{$value >= 300 ? 'bg-[#7a3333]' : ''}}">{{$value}}</td>

                @if ($value >= 300)
                    <audio src={{audioMario5()}}></audio>
                @endif
            @else
                <td class="font-bold">{{$key}}</td>
                <td>{{$value}}</td>
            @endif
        </tr>
    @endforeach
@overwrite