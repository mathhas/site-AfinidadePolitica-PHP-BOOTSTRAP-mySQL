<?php
//conecta com db
include("conexao.php");

//dados do formulario
$cadNomUsu = $_POST["cadNomUsu"];

//ação a tomar no db
$sql = "INSERT INTO usuarios(nome) VALUES('$cadNomUsu')";

//executa a ação
$conn = $mySqli->query($sql) or die($mySqli->error);

//volta a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;

?>