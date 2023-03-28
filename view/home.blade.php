<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="15">

    <script src="./jquery-3.2.1/dist/jquery.slim.min.js"></script>
    <script src="./jquery-3.2.1/dist/jquery.min.js"></script>
    
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600;800&display=swap" rel="stylesheet">
    {{-- fonts --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">


    <title>TopMay</title>
</head>
<body class="flex flex-row justify-center bg-[#0A1D66] text-xs text-cyan-50">
    @if (meioDia() >= "12:00:00" and meioDia() < "12:00:30")
        <audio src={{audioMDia()}} autoplay loop></audio>
    @endif
    
    <div class="ok"></div>
    <div id="load">
        <div id="sub-load">
            <svg class="tea" width="68" height="77" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="var(--secondary)" stroke-width="2"></path>
                <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="var(--secondary)" stroke-width="2"></path>
                <path id="teabag" fill="var(--secondary)" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
                <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="var(--secondary)"></path>
                <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="var(--secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="flex flex-col items-center leading-10">
                <h1 id="parada">Monitoramento Parou</h1>
                <h3 id="horario-parada"></h3>
            </div>
        </div>
    </div>

    <div class="text-white flex flex-col items-center justify-center h-screen w-full">
        <div class=" inline-grid grid-cols-3 auto-rows-[2fr] grid-flow-row max-h-screen w-[98vw] gap-1">

            {{-- incluir template --}}
            <div class="row-span-2">
                @include('itens.rede')
            </div>
            <div class="row-span-2">
                @include('itens.vendasMin')
            </div>
            @include('itens.replicacao')
            @include('itens.pingAddressNet')
            @include('itens.processamento')
            @include('itens.nfe')
            @include('itens.nfce')
            @include('itens.dadosMysql')
            @include('itens.usoNoBreak')
            @include('itens.usoDisk')
            @include('itens.impressoras')
            @include('itens.usoMemoria')
            @include('itens.top')

        </div>
        
    </div>

    <script>
        @php
            $tempoParada = parada()
        @endphp        

        // $(document).ready(function () {
  
        //   setTimeout(function(){
        //       window.location.reload(1);
        //   }, 15000);

        // });

        if (@json($tempoParada)) {
            $("#load").fadeIn()

            document.getElementById("horario-parada").innerHTML += @json($tempoParada)
        } else {
            $("#load").fadeOut(0)
        }
      </script>
</body>
</html>