<?php
//conecta com o DB
include("conexao.php");

//dados do formulario
$editIdUsu = $_POST["editIdUsu"];
$editNomUsu = $_POST["editNomUsu"];

//ação a tomar no DB
$slq = "UPDATE usuarios SET nome = '$editNomUsu' WHERE id = '$editIdUsu'";

//executa ação no DB
$conn = $mySqli->query($slq) or die($mySqli->error);


//volta a página anterior
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;


?>