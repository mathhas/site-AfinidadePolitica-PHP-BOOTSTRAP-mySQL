<?php
//conecta com o DB
include("conexao.php");

//dados do formulário
$cadVotoIdPec = $_POST["cadVotoIdPec"];
$cadVotoIdUsu = $_POST["cadVotoIdUsu"];
$voto = $_POST["voto"];

//tipo de ação no DB
$sql = "INSERT INTO votosusuarios(idPec, idUsuario, votoUsuario) VALUES('$cadVotoIdPec', '$cadVotoIdUsu', '$voto')";

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

//volta a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;

?>