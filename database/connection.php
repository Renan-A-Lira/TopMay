<?php 


function open()
{
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
  $con = mysqli_connect($_ENV['HOSTNAME'], $_ENV['BD_USERNAME'], $_ENV['BD_PASSWORD'], $_ENV['DATABASE']);
  if (mysqli_connect_errno()) {
    echo "Falha na conexao com banco: " . mysqli_connect_error();
    exit();
  } else {
    return $con;
  }
}


?>