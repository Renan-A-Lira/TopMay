
@extends('templates.table')

@section('caption')
    <p>NFE</p>
@overwrite

@section('titles')
    <tr class="grid grid-cols-2 w-full">
        <th>Serviços</th>
        <th>Status</th>
    </tr>
@overwrite

@section('contents')

    @if ($nfe != NULL)
        @foreach ( $nfe as $key => $value)
            @if ($key == 'datahora')
                                
            @else
                <tr class="grid grid-cols-2 w-full ">
                    <td>
                        {{$key != 'inutil' ? $key : 'inutilização'}}
                    </td>
                    <td class="flex items-center justify-center">
                        @if ($key == 'tempo')
                            {{$value}}
                        @else
                            <img src="{{ $bola->getBola($value) }}">
                        @endif
                    </td>
                </tr>
                                
            @endif
        @endforeach
                            
    @else
                            
    @endif
    
@overwrite