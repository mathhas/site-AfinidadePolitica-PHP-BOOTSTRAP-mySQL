<?php
//faz conexao com o DB
include("conexao.php");

//dados do formulario
$delPolitico = $_POST["delPolitico"];

//ação a tomar no DB
$sql = "DELETE FROM politicos WHERE id = '$delPolitico'";

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

//volta para a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;


?>