<?php namespace TopMay;
use Dotenv\Dotenv;
require('./controller/init.php');
require('./vendor/autoload.php');

use Bola\Bola;
use Jenssegers\Blade\Blade;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


setlocale(LC_ALL, 'pt_BR.utf8');

$blade = new Blade('view', './assets/cache');

$pingNetwork = array(array("Oi", "FIREWALL", "NET 03"),
array("InfoWeb", "FIREWALL", "NET 04"),
array("Vivo PS", "FIREWALL", "NET 05"),
array("Ideal NET", "FIREWALL", "NET 07"),
array("BrisaNet",  "FIREWALL", "NET DC MG"),
array("Nicanor",   "FIREWALL", "NET CD03"));


$percentuaisDisks = ["/u"=> percentualDisk("/u"),
    "/var/lib/mysql" => percentualDisk("/var/lib/mysql"),
    "/var/log/mysql" => percentualDisk("/var/log/mysql"),
    "/tmp" => percentualDisk("/tmp"),
    "/var/backup" => percentualDisk("/var/backup")
];

$percentualMemoria = [
"CPU" => usoMemoria("CPU"),
"MEM" => usoMemoria("MEM"),
"SWAP" => usoMemoria("SWAP")];


$usoNoBreaks = [
"Bateria"=>array(usoNobreak("apc01","Charge"), usoNobreak("apc02","Charge"), usoNobreak("apc03","Charge")),
"Entrada"=>array(usoNobreak("apc01","Input Voltage"), usoNobreak("apc02","Input Voltage"), usoNobreak("apc03","Input Voltage")),
"Saída"=>array(usoNobreak("apc01","Output Voltage"), usoNobreak("apc02","Output Voltage"), usoNobreak("apc03","Output Voltage")),
"Corrente"=>array(usoNobreak("apc01","Output Current"), usoNobreak("apc02","Output Current"), usoNobreak("apc03","Output Current")),
"Temp"=>array(usoNobreak("apc01","U1"), usoNobreak("apc02","U1"), usoNobreak("apc03","U2")),
"Restante"=>array(usoNobreak("apc01","Runtime Remaining"), usoNobreak("apc02","Runtime Remaining"), usoNobreak("apc03","Runtime Remaining"))

];

$replicacoes = [
    "Banco02" => atrasoReplicaco('Banco 02'),
    "SaciOCI" => "SaciOCI",
];

$pingRedes = [
    pingAddress("Shopping", "MG => PS", "PS => MG"),
    pingAddress("Riverside", "PS => RV", "RV => PS"),
    pingAddress("Rio Branco", "MG => RB", "RB => MG"),
    pingAddress("Zequinha", "PS => ZF", "ZF => PS"),
    pingAddress("Valter", "MG => VA", "VA => MG"),
    pingAddress("Frei Serafim", "PS => FS", "FS => PS"),
    pingAddress("Calçados", "MG => PC", "PC => MG"),
    pingAddress("Timon", "PS => PT", "PT => PSVPN"),
    pingAddress("Dirceu", "PD => PS", ""),
    pingAddress("Rio Poty", "PS => RP", "RP => PS"),
];

// redenrizar pagina inicial e passar funções
echo $blade->make("home", [
    "bola" => new Bola,
    "lojas" => Vendas_Loja(), 
    "pingNetwork" => $pingNetwork,
    "nfe" => NFE(),
    "nfce" => NFCE(),
    "processamento" => Processamento(),
    "dadosmysql" => DADOSMYSQL(),
    "usoDisk" => $percentuaisDisks,
    "usoMemoria" => $percentualMemoria,
    "usoNoBreak" => $usoNoBreaks,
    "impressoras" => IMPRESSORA(),
    "top" => TOP(),
    "replicacao" => $replicacoes,
    "pingRedes" => $pingRedes,
    ])->render();
?>