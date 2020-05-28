<?php
//conecta com DB
include("conexao.php");

//dados do formulário
$cadCodPec = @$_POST["cadCodPec"];
$cadNomPec = @$_POST["cadNomPec"];
$cadDescPec = @$_POST["cadDescPec"];

//ação a tomar no DB
$sql = "INSERT INTO pecs(codigo, nome, descricao) VALUES('$cadCodPec', '$cadNomPec', '$cadDescPec')";

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

//volta a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;

?>