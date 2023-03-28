<?php
require('./vendor/autoload.php');
require('./database/querys/sqlQuerys.php');
require('./database/connection.php');



function parada()
{
  $con = open();
  $sql = sqlGetMaxDataHora();

  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($result);
  // data maior hora do bd
  $data1 = new DateTime($row->tempo);

  // hora atual
  $data2 = (new DateTime())->setTimezone(new DateTimeZone('America/Fortaleza'));

  // diferença entre as 2 datas
  $interval = $data1->diff($data2);
  $time = $interval->format('%H:%i:%s');

  $arr = explode(':', $time);
  if (count($arr) == 3) {
    $second = $arr[0] * 3600 + $arr[1] * 60 + $arr[2];
  } else {
    $second = $arr[0] * 60 + $arr[1];
  }

  return $second > 300 ? ($data1->format('d/m/Y H:i:s')) : null;
}


function meioDia()
{
  date_default_timezone_set('America/Fortaleza');
  $date = date('H:i:s');
  return $date;
}



function ping($host)
{
  $con = open();
  $sql = sqlGetPingDistinct($host);
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($result);
  $atraso = $row->atraso;
  mysqli_free_result($result);

  return $atraso;
}

function pingAddress($descricao, $back, $lan)
{
  $ab = ping($back);
  $al = ping($lan);


  return ["descricao" => $descricao, "lanBack" => $ab ?: 0, "lanLan" => $al ?: 0];
}

function pingAddressNET($descricao, $remoto, $local)
{

  $al = ping($local);
  if ($al == "" || $al > 800) $corL = 'R';
  else if ($al > 400) $corL = 'Y';
  else $corL = 'G';
  $al = number_format($al, 2, ",", ".");

  // "bola" => Bola::getBola($corL),

  return ["descricao" => $descricao, "corBola" => $corL, "atraso" => $al, ];
}

function DADOSMYSQL()
{
  $con = open();
  $sql = sqlGetMySqlDados();
  $result = mysqli_query($con, $sql);
  $retorno = [];
  while ($row = mysqli_fetch_object($result)) {

    array_push($retorno, $row);
  }
  
  mysqli_free_result($result);
  return $retorno;
}

function Processamento()
{
  $con = open();
  $sql = sqlGetVendas();
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($result);

  mysqli_free_result($result);
  return $row;
}

function Vendas_Loja()
{
  $C = 1;
  $con = open();
  $sqlV = sqlGetVendas_lj();
  $resultV = mysqli_query($con, $sqlV);
  $resultArray=[];


  while ($rowV = mysqli_fetch_object($resultV)) {

    switch ($rowV->loja) {
      case 1:
        array_push($resultArray, ["Magazine" => $rowV->vendaMin]);
        // echo "Magazine";
        break;
      case 3:
        array_push($resultArray, ["Riverside"=> $rowV->vendaMin]);
        // echo "Riverside";
        break;
      case 5:
        array_push($resultArray, ["Rio Branco"=> $rowV->vendaMin]);
        // echo "Rio Branco";
        break;
      case 8:
        array_push($resultArray, ["Calcados"=> $rowV->vendaMin]);
        // echo "Calçados";
        break;
      case 9:
        array_push($resultArray, ["Frei Serafim"=> $rowV->vendaMin]);
        // echo "Frei Serafim";
        break;
      case 11:
        array_push($resultArray, ["Shopping"=> $rowV->vendaMin]);
        // echo "Shopping";
        break;
      case 13:
        array_push($resultArray, ["Loja Virtual"=> $rowV->vendaMin]);
        // echo "Loja Virtual";
        break;
      case 14:
        array_push($resultArray, ["Timon"=> $rowV->vendaMin]);
        // echo "Timon";
        break;
      case 15:
        array_push($resultArray, ["Dirceu"=> $rowV->vendaMin]);
        // echo "Dirceu";
        break;
    }
  }
  mysqli_free_result($resultV);
  return $resultArray;
}

function NFE()
{
  $con = open();
  $sql = sqlGetNfeOrNfce();
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($result);

  mysqli_free_result($result);
  return $row;
}

function NFCE()
{
  $con = open();
  $sql = sqlGetNfeOrNfce("nfce");
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($result);

  mysqli_free_result($result);

  return $row;
}


function TOP()
{
  $con = open();
  $sql = sqlGetTop();
  $result = mysqli_query($con, $sql);
  $retorno = [];
  while ($row = mysqli_fetch_object($result)) {

    array_push($retorno, $row);
  }
  mysqli_free_result($result);

  return $retorno;
}

function IMPRESSORA()
{
  $con = open();
  $sql = sqlGetImpressoras();
  $result = mysqli_query($con, $sql);

  $retorno = [];
  while ($row = mysqli_fetch_object($result)) {

    array_push($retorno, $row);
  }

  mysqli_free_result($result);

  return $retorno;

}



function atrasoReplicaco($host)
{
  $con = open();
  $sql = sqlGetReplicacao($host);
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($result);


  mysqli_free_result($result);

  return $row;
}



function percentualDisk($particao)
{
  $con = open();
  $sql = sqlGetPercentualDisk($particao);
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($result);

  mysqli_free_result($result);

  return $row;
}


function usoMemoria($nome)
{
  $con = open();
  $sql = sqlGetPercentualMemoria($nome);
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($result);



  mysqli_free_result($result);

  return $row;
}


function usoNobreak($nome, $campo)
{
  $con = open();
  $sql = sqlGetArrayInfoNoBreak($nome, $campo);
  $result = mysqli_query($con, $sql['sql1']);
  $row = mysqli_fetch_object($result);


  $result2 = mysqli_query($con, $sql['sql2']);
  $row2 = mysqli_fetch_object($result2);

  mysqli_free_result($result);

  return [$row, $row2];
}


// funções não utilizadas

// function pingHost($descricao)
// {
//   $con = open();
//   $sql = sqlGetPing($descricao);

//   $result = mysqli_query($con, $sql);
//   $row = mysqli_fetch_object($result);
//   if ($row->atraso != null) $cor = 'blue';
//   else $cor = 'red';
  
//   mysqli_free_result($result);
// }

// function getDatetime()
// {
//   $con = open();
//   $sql = sqlGetDateHourFormat();
//   $result = mysqli_query($con, $sql);
//   $row = mysqli_fetch_object($result);
//   $datahora = $row->datahora;
//   mysqli_free_result($result);

//   return $datahora;
// }

// function getVelociade($provedor)
// {
//   $con = open();
//   $sql = sqlGetVelocidade($provedor);
//   $result = mysqli_query($con, $sql);
//   $row = mysqli_fetch_object($result);
//   $speed = $row->rxbytes;

//   mysqli_free_result($result);

//   return $speed;
// }

// function getMaxLink($provedor)
// {
//   $con = open();
//   $sql = sqlGetProvedor($provedor);
//   $result = mysqli_query($con, $sql);
//   $row = mysqli_fetch_object($result);
//   $speed = $row->taxa;

//   mysqli_free_result($result);

//   return $speed;
// }