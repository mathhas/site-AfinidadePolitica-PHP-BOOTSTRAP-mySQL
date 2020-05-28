<?php
//faz conexão com o DB
include("conexao.php");

//dados do formulário
$editIdPol = $_POST["editIdPol"];
$editNomPol = $_POST["editNomPol"];
$editPartPol = $_POST["editPartPol"];

//tipo de ação no DB
$sql = "UPDATE politicos SET nome = '$editNomPol', partido = '$editPartPol' WHERE id = '$editIdPol'";

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

//volta para a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;
?>