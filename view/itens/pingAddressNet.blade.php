@extends('templates.table')

@section('caption')
    <p>Internet</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-3 w-full">
        <th>Provedor</th>
        <th>Link</th>
        <th>Ping</th>
    </tr>
@overwrite 

@section('contents')
    @foreach ($pingNetwork as $item)
        <tr class="grid grid-cols-3 w-full ">
            @foreach (pingAddressNET($item[0], $item[1], $item[2]) as $subItem)
                @if ($loop->index == 1)
                    <td class="flex items-center justify-center"><img src="{{ $bola->getBola($subItem) }}" alt=""></td>
                @else
                    <td>{{ $subItem }}</td>
                @endif
            @endforeach
        </tr>
    @endforeach
@overwrite