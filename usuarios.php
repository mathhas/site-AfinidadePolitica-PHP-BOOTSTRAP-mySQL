<!DOCTYPE html>

<?php
//con3xão com o db
include("classes/conexao.php");

//tipo de persistencia
$consulta = "SELECT * FROM usuarios ORDER BY id";
$consultaPecs = "SELECT * FROM pecs";

//consulta a tabela, salvando um pseudo array de tudo ou fechando se der erro
$con = $mySqli->query($consulta) or die($mySqli->error);
$connPec = $mySqli->query($consultaPecs) or die($mySqli->error);

//----------caso dos votos do usuario---------
//recebe dados do form
$idUsuarioMostrarVotos = @$_POST["idUsuario"];

if (empty($idUsuarioMostrarVotos)) {
    //ação a tomar no DB
    $sql = "SELECT * FROM votosusuarios";
} else {
    //ação a tomar no DB
    $sql = "SELECT * FROM votosusuarios WHERE idUsuario = '$idUsuarioMostrarVotos'";
}

//executa ação no DB
$conn = $mySqli->query($sql) or die($mySqli->error);

?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">

    <title>Usuários</title>
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

        <!--tabela com todos usuários cadastrados-->
        <table class="table table-bordered table-dark mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dado = $con->fetch_array()) { ?>
                    <tr>
                        <th scope="col"><?php echo $dado["id"]; ?></th>
                        <th scope="col"><?php echo $dado["nome"]; ?></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-------------------------------------funcionalidades de usuários---------------------------------------->
        <!--botôes de ação-->
        <div class="col text-center mt-5">
            <div class="row justify-content-center">
                <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#cadUsu" aria-expanded="false" aria-controls="cadUsu">
                        Cadastrar Usuário
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#cadVotoUsu" aria-expanded="false" aria-controls="cadVotoUsu">
                        Cadastrar Votos de um Usuário
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#editUsu" aria-expanded="false" aria-controls="editUsu">
                        Editar dados de um Usuário
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#delUsu" aria-expanded="false" aria-controls="delUsu">
                        Excluir um Usuário
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#votosUsuario" aria-expanded="false" aria-controls="votosUsuario">
                        Votos Usuarios
                    </a>
                </p>
            </div>
            <!--cadastrar usuário-->
            <div class="collapse mt-3" id="cadUsu">
                <span class="badge badge-pill badge-light">
                    <h2>Cadastro de Usuário</h2>
                </span>
                <form action="classes/cadastroUsuarios.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="cadNomUsu" id="cadNomUsu" placeholder="Nome do Usuário">
                        </div>
                        <button type="submit" class="btn btn-dark">Salvar</button>
                    </div>
                </form>
            </div>


            <!--cadastrar voto do usuário-->

            <div class="collapse mt-3" id="cadVotoUsu">
                <span class="badge badge-pill badge-light">
                    <h2>Cadastro de voto do Usuário</h2>
                </span>
                <form action="classes/cadastroVotoUsuario.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="cadVotoIdPec" id="cadVotoIdPec" placeholder="ID da pec a cadastrar voto">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="cadVotoIdUsu" id="cadVotoIdUsu" placeholder="ID do usuário a registrar voto">
                        </div>
                        <div class="col">
                            <input type="radio" name="voto" id="favoravel" value="Favorável">
                            <label for="aFavor"><span class="badge badge-pill badge-success">Favorável</span></label>
                            <input type="radio" name="voto" id="contra" value="Contra">
                            <label for="contra"><span class="badge badge-pill badge-danger">Contra</span></label>
                            <button type="submit" class="btn btn-dark">Votar</button>
                        </div>
                    </div>
                </form>
                <span class="badge badge-pill badge-light mt-3">
                    <h3>Pec's cadastradas</h3>
                </span>
                <table class="table table-bordered table-dark mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dadoPec = $connPec->fetch_array()) { ?>
                            <tr>
                                <th scope="col"><?php echo $dadoPec["id"]; ?></th>
                                <td><?php echo $dadoPec["codigo"]; ?></td>
                                <td><?php echo $dadoPec["nome"]; ?></td>
                                <td><?php echo $dadoPec["descricao"]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!--editar usuário-->

            <div class="collapse mt-3" id="editUsu">
                <span class="badge badge-pill badge-light">
                    <h2>Edição de dados do Usuário</h2>
                </span>
                <form action="classes/editaUsuario.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="editIdUsu" id="editIdUsu" placeholder="Digite o ID do Usuário a editar os dados">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="editNomUsu" id="editNomUsu" placeholder="Novo nome do Usuário">
                        </div>
                        <button type="submit" class="btn btn-dark">Salvar</button>
                    </div>
                </form>
                <span class="badge badge-pill badge-warning">Complete todos os dados do Usuário. Do contrário, ele poderá ficar com campos vazios!</span>
            </div>

            <!--excluir politico-->

            <div class="collapse mt-3" id="delUsu">
                <span class="badge badge-pill badge-light">
                    <h2>Excluir Usuário</h2>
                </span>
                <form action="classes/excluirUsuario.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="delUsu" id="delUsu" placeholder="ID do Usuário a ser deletado">
                        </div>
                        <button type="submit" class="btn btn-dark">Deletar</button>
                    </div>
                </form>
                <span class="badge badge-pill badge-danger">Essa ação irá excluir permanentemente o Usuário do sistema!</span>
            </div>

            <!--ver votos de um politico-->
            <div class="collapse mt-3" id="votosUsuario">
                <span class="badge badge-pill badge-light">
                    <h2>Votos de um Usuário</h2>
                </span>
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="idUsuario" id="idUsuario" placeholder="ID do Usuário a verificar votos feitos">
                        </div>
                        <button type="submit" class="btn btn-dark">Verificar</button>
                    </div>
                </form>
                <!--tabela com votos de usuarios-->
                <table class="table table-bordered table-dark mt-5">
                    <thead>
                        <tr>
                            <th scope="col">id da Pec</th>
                            <th scope="col">id do Usuário</th>
                            <th scope="col">voto do Usuário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dadoIdVotoUsu = $conn->fetch_array()) { ?>
                            <tr>
                                <th scope="col"><?php echo $dadoIdVotoUsu["idPec"]; ?></th>
                                <th scope="col"><?php echo $dadoIdVotoUsu["idUsuario"]; ?></th>
                                <th scope="col"><?php echo $dadoIdVotoUsu["votoUsuario"]; ?></th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>



        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/popper.js/dist/popper.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>