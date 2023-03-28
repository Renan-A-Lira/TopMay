@extends('templates.table')

@section('caption')
    <p>Vendas/Min</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-[1fr_3fr_2fr] w-full">
        <th>Rank</th>
        <th>Loja</th>
        <th>Vendas/Min</th>
    </tr>
@overwrite

@section('contents')

    @foreach ($lojas as $item)
        <tr class="grid grid-cols-[1fr_3fr_2fr] w-full">
            @if ($loop->index+1 >= 1 && $loop->index+1 <= 2)
                <td class="bg-green-800">{{ $loop->index+1 }}</td>

            @elseif ($loop->index+1 >= 3 && $loop->index+1 <= 5)
                <td class="bg-green-600">{{ $loop->index+1 }}</td>

            @elseif ($loop->index+1 >= 6 && $loop->index+1 <= 8)
                <td class="bg-green-400">{{ $loop->index+1 }}</td>
            @endif
            <td>{{ array_keys($item)[0] }}</td>
            <td>{{ $item[array_keys($item)[0]] }}</td>
        </tr>
    @endforeach

@overwrite