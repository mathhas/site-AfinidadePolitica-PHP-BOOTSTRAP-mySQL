<?php
//conecta com o DB
include("conexao.php");

//dados do formulário
$editPec = @$_POST["editPec"];
$editCodPec = @$_POST["editCodPec"];
$editNomPec = @$_POST["editNomPec"];
$editDescPec = @$_POST["editDescPec"];

//ação a tomar no DB
$sql = "UPDATE pecs SET codigo = '$editCodPec', nome = '$editNomPec', descricao = '$editDescPec' WHERE id = '$editPec'";

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

//volta para a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;

?>