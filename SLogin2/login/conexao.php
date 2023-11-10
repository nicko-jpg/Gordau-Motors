<?php
$usuario    =       "root";
$senha      =       "usbw";
$database   =       "login";
$host       =       "localhost:3312";

$mysqli = new mysqli( $host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados ". $mysqli->error);
}

?>