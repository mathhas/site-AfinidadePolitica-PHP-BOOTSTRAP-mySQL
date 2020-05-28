<!DOCTYPE html>
<html lang="en">

<?php
include("classes/conexao.php");

//tipo de requisição do db
$consultaPolitico = "SELECT * FROM politicos";
$consultaUsuario = "SELECT * FROM usuarios";

//faz a requisição, mas fecha se não conseguir conexão
$connPol = $mySqli->query($consultaPolitico) or die($mySqli->error);
$connUsu = $mySqli->query($consultaUsuario) or die($mySqli->error);

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">

    <title>Testar Afinidade Política</title>
</head>

<body>
    <div class="container">
        <!--navbar-->
        <nav class="navbar navbar-dark bg-dark">
            <!--logo do site com link para voltar a página incial-->
            <a href="index.php">
                <img src="https://image.flaticon.com/icons/svg/2036/2036930.svg" width="40" height="40" alt="">
            </a>
            <!--botão de menu-->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--menu na navbar-->
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav ml-auto">
                    <!--itens menu-->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Início</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="testarAfinidade.php" class="nav-link">Testar afinidade com políticos</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="usuarios.php" class="nav-link">Cadastrar voto em Proposta de Ementa Constitucional</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="politicos.php" class="nav-link">Cadastrar Político</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="pecs.php" class="nav-link">Cadastrar Proposta de Ementa Constitucional</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="politicos.php" class="nav-link">Cadastrar voto do político a ementa</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="politicos.php" class="nav-link">Editar políticos</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="pecs.php" class="nav-link">Editar Proposta de Ementa Constitucional</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="politicos.php" class="nav-link">Excluir Politicos</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="pecs.php" class="nav-link">Excluir Proposta de ementa Constitucional</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--formulário para testar afinidade política por id-->
        <div class="jumbotron mt-5">
            <h1 class="display-6">Teste sua afinidade política com os políticos cadastrados</h1>
            <p class="lead"> Para isso, procure abaixo entre os políticos já cadastrados, um que deseje testar afinidade,
                veja qual é o número do seu "Id", e preencha o formulário abaixo. Não se esqueça de procurar seu nome
                de usuário e Id registrado também! várias pessoas utilizam este programa e registram seus votos nas pec's também!
            </p>

            <form action="classes/testaAfinidade.php" method="post">
                <div class="form-group">
                    <label for="idPolitico">Id Político:
                        <input type="number" name="idPol" id="idPol" class="form-control" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Escolha um político abaixo, e coloque aqui o ID.</small>
                    </label>
                </div>
                <div class="form-group">
                    <label for="idUsuario">Id Usuário:
                        <input type="number" name="idUsu" id="idUsu" class="form-control" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Escolha um usuário abaixo, e coloque aqui o ID.</small>
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Testar Afinidade</button>
                </div>
            </form>

        </div>
        <!--políticos cadastrados e usuários exibidos em 2 colunas paralelas-->
        <div class="row mt-5">
            <div class="col text-center">
                <!--table acom políticos cadastrados-->
                <h2>Tabela de Políticos cadastrados</h2>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Partido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dado = $connPol->fetch_array()) { ?>
                            <tr>
                                <th scope="col"><?php echo $dado["id"]; ?></th>
                                <th scope="col"><?php echo $dado["nome"]; ?></th>
                                <th scope="col"><?php echo $dado["partido"]; ?></th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col text-center">
                <h2>Tabela de usuários cadastrados</h2>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dadoUsu = $connUsu->fetch_array()) { ?>
                            <tr>
                                <th scope="col"><?php echo $dadoUsu["id"]; ?></th>
                                <th scope="col"><?php echo $dadoUsu["nome"]; ?></th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>