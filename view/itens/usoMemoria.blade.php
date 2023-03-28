@extends('templates.table')

@section('caption')
    <p>Memoria</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-3 w-full">
        <th>Nome</th>
        <th>Uso</th>
        <th>%</th>
    </tr>
@overwrite 

@section('contents')

    @foreach ($usoMemoria as $key => $item)
        <tr class="grid grid-cols-3 w-full">
            <td>
                {{$key}}
            </td>
            <td class="justify-start">
               <div class="w-[{{$item->PORCENTO}}%] h-full bg-green-700 transition-all"></div> 
            </td>
            <td>
                {{$item->PORCENTO}}%
            </td>
        </tr>
    @endforeach

@overwrite