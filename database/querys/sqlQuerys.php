<?php


function sqlGetDataHour() {
    return "select max(datahora) as tempo from datahora limit 1";

}

function sqlGetVendas() {
    return "select * from vendas
    where datahora = (select max(datahora) from datahora);";
}

function sqlGetVendas_lj() {

    return "select * from vendas_lj where loja IN (1,3,5,8,9,11,13,14,15) order by vendaMin desc;";
}

function sqlGetNfeOrNfce($type = 'nfe') {

    $sql = "select * from $type
                where datahora = (select max(datahora) from datahora);";
    
    return $sql;

}
function sqlGetTop() {
    return modelSqlTopAndImpressora('top', 'cpu', '5');

}
function sqlGetImpressoras() {

    return modelSqlTopAndImpressora('impressora', 'qtd', '6');
}

function modelSqlTopAndImpressora(string $table, string $orderBy, string $limit) {

    return  "select * from $table
    where datahora = (select max(datahora) from datahora)
    order by $orderBy desc
    limit $limit;";
}

function sqlGetDateHourFormat() {

    return "select DATE_FORMAT(max(datahora), '%d/%m/%Y %H:%i:%S') as datahora from datahora";
}

function sqlGetProvedor($provedor) {

    return "select max(rxbytes) as taxa from link
    where datahora > current_date
      and provedor = '$provedor';";
  
}

function sqlGetReplicacao($host) {

    return "select * from replicacao
    where host = '$host'
    order by datahora desc
    limit 1";

}

function sqlGetMaxDataHora() {
    return "select max(datahora) as tempo from datahora limit 1";
}
function sqlGetPingDistinct($host) {
    return "select distinct * from ping
    where host = '$host'
    order by datahora desc
    limit 1";
}

function sqlGetVelocidade($provedor) {

    return "select * from link
            where datahora = (select max(datahora) from link)
            and provedor = '$provedor';";
}

function sqlGetPercentualDisk($particao) {
    if ($particao == "/tmp") {
        return "select
            round((usado * 100 )/total)+1 as PORCENTO,
            round(total/(1024 * 1024 )) as GBTOTAL
            from disco where particao = '$particao'
            order by datahora desc
            limit 1";
        
    } else {
        return "select
            round((usado * 100 )/total) as PORCENTO,
            round(total/(1024 * 1024 )) as GBTOTAL
            from disco where particao = '$particao'
            order by datahora desc
            limit 1";
    }

}

function sqlGetPercentualMemoria($nome) {
    switch ($nome) {
        case "SWAP":
            return "select
              round((usado * 100 )/total)+1 as PORCENTO
              from recurso where nome = '$nome'
              order by datahora desc
              limit 1";
        
        default:
            return "select
                round((usado * 100 )/total) as PORCENTO
                from recurso where nome = '$nome'
                order by datahora desc
                limit 1";
    }

}
function sqlGetArrayInfoNoBreak(string $nome, string $campo) {

    return [
        "sql1" => "select nome,campo,
        if(campo = 'Output Voltage' or campo = 'Input Voltage',replace(valor,' VAC','V'),
        if(campo = 'Output Current',replace(valor,' ',''),
        if(campo LIKE '%Charge%',CONCAT(valor,'%'),valor))) 'valor'
      from nobreak where nome = '$nome' and campo like '%$campo%'
      order by datahora desc
      limit 2",

      "sql2" => "select nome,campo,if(campo = 'U1' or campo = 'U2',(lpad(valor,4,1)),'') 'valor', datahora
      From nobreak  where nome = '$nome' and campo like '%$campo%' and valor != 'NA'
      order by datahora desc
      limit 4",
    ];
}
function sqlGetPing(string $host, bool $distinct=false) {

    if ($distinct) return "select distinct * from ping
    where host = '$host'
    order by datahora desc
    limit 1";

    return "select * from ping 
    where host = '$host' 
    order by datahora desc 
    limit 1";

}
function sqlGetMySqlDados() {

    return "select * from thread
    where datahora = (select max(datahora) from datahora)
    and usuario not like '%user%'
    order by datahora desc
    limit 6";
}


?>