@extends('templates.table')

@section('caption')
    <p>Uso do Disco(GB)</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-4 w-full">
        <th>Particao</th>
        <th>Uso</th>
        <th>%</th>
        <th>Espaco</th>
    </tr>
@overwrite 

@section('contents')

    @foreach ($usoDisk as $key => $item)
        <tr class="grid grid-cols-4 w-full">
            <td>
                {{$key}}
            </td>
            <td class="justify-start">
               <div class="w-[{{$item->PORCENTO}}%] h-full bg-green-700 transition-all"></div> 
            </td>
                @if ($item->PORCENTO > 89)
                    <td class="bg-red-600">
                        {{$item->PORCENTO}}%
                    </td>
                    <audio src={{audiosonar()}} autoplay></audio>
                @else
                    <td>
                        {{$item->PORCENTO}}%

                    </td>
                @endif
            <td>
                {{$item->GBTOTAL}} GB
            </td>
        </tr>
    @endforeach

@overwrite