@extends('templates.table')

@section('caption')
    <p>No Break</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-4 w-full">
        <th> </th>
        <th>DCMG01</th>
        <th>DCMG02</th>
        <th>DCPS03</th>
    </tr>
@overwrite 

@section('contents')

    @foreach ($usoNoBreak as $key => $item)
        <tr class="grid grid-cols-4 w-full">
            <td class="font-bold">{{$key}}</td>
            @foreach ($item as $subItem)
                @if ($subItem[1] > 25)
                    <td> {{$subItem[1]->valor}} C</td>
                @else
                    <td> {{$subItem[0]->valor}} </td>
                @endif
            @endforeach
        </tr>
    @endforeach

@overwrite