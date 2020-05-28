<?php
//faz conexão com o DB
include("conexao.php");

//dados do formulário
$cadVotoIdPec = @$_POST["cadVotoIdPec"];
$cadVotoIdPol = @$_POST["cadVotoIdPol"];
$voto= @$_POST["voto"];

echo "voto: $voto.";

//tipo de ação no DB
$sql = "INSERT INTO votospoliticos(idPec, idPolitico, votoPolitico) VALUES('$cadVotoIdPec', '$cadVotoIdPol', '$voto')";

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

//volta a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;
?>