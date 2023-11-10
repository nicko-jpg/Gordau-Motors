<?php
include("conexao.php");

$id     =       $_POST["id"];

$deletar    =   "DELETE FROM tbclientes WHERE id='$id'";

$queryCadastro  =   mysqli_query($mysqli,$deletar);

header("location:index.php")



?>