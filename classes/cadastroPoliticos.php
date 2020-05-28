<?php
            //cadastro de político

            //fazer conexão com o banco
            include("conexao.php");

            //valores a inserir, pegando do formulario post acima
            $cadNomPol = @$_POST["cadNomPol"];
            $cadPartPol = @$_POST["cadPartPol"];

            //tipo de ação
            $sql = "INSERT INTO politicos(nome, partido) VALUES('$cadNomPol', '$cadPartPol')";

            //ação no DB
            $conn = $mySqli->query($sql) or die($mySqli->error);

            //volta a página anterior
            header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
            exit;
?>
