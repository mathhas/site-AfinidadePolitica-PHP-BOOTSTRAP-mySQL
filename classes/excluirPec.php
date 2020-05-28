<?php
//conecta com DB
include("conexao.php");

//dados do form
$delPec = $_POST["delPec"];

//ação a tomar no DB
$sql = "DELETE FROM pecs WHERE id = '$delPec'";

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
exit;

?>