<?php
//conecta com DB
include("conexao.php");

//dados do fomrulario
$delUsu = $_POST["delUsu"];

//ação a tomar no DB
$sql = "DELETE FROM usuarios WHERE id = '$delUsu'";

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

//volta a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;

?>