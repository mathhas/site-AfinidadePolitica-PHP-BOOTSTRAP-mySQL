<!DOCTYPE html>

<!--consulta ao DB-->
<?php
//conexão com o DB
include("classes/conexao.php");

//query monta tabela politicos
$consulta = "SELECT * FROM politicos";
$con = $mySqli->query($consulta) or die($mySqli->error);

//query monta tabela pecs
$consultaPec = "SELECT * FROM pecs";
$conPec = $mySqli->query($consultaPec) or die($mySqli->error);

//-------------query monta tabela votos de um politico
//dado do formulário
$idPoliticoMostrarVotos = @$_POST["votoPolitico"];

if (empty($idPoliticoMostrarVotos)) {
    //ação a tomar no DB
    $sql = "SELECT * FROM votospoliticos";
} else {
    //ação a tomar no DB
    $sql = "SELECT * FROM votospoliticos WHERE idPolitico = '$idPoliticoMostrarVotos'";
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

    <title>Politicos Cadastrados</title>
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
        <!--table com políticos cadastrados-->
        <table class="table table-bordered table-dark mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Partido</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dado = $con->fetch_array()) { ?>
                    <tr>
                        <th scope="col"><?php echo $dado["id"]; ?></th>
                        <th scope="col"><?php echo $dado["nome"]; ?></th>
                        <th scope="col"><?php echo $dado["partido"]; ?></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-------------------------------------funcionalidades de politicos---------------------------------------->

        <!--botôes de ação-->
        <div class="col text-center mt-5">
            <div class="row justify-content-center">
                <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#cadPol" aria-expanded="false" aria-controls="cadPol">
                        Cadastrar Político
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#cadVotoPolitico" aria-expanded="false" aria-controls="cadVotoPolitico">
                        Cadastrar Votos de um político
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#editarPolitico" aria-expanded="false" aria-controls="editarPolitico">
                        Editar dados de um político
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#excluirPolitico" aria-expanded="false" aria-controls="excluirPolitico">
                        Excluir um político
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#votosPolitico" aria-expanded="false" aria-controls="votosPolitico">
                        Verificar votos de um político
                    </a>
                </p>
            </div>
            <!--cadastrar politico-->
            <div class="collapse mt-3" id="cadPol">
                <span class="badge badge-pill badge-light">
                    <h2>Cadastro de político</h2>
                </span>
                <form action="classes/cadastroPoliticos.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="cadNomPol" id="cadNomPol" placeholder="Nome do Político">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="cadPartPol" id="cadPartPol" placeholder="Partido do Político">
                        </div>
                        <button type="submit" class="btn btn-dark">Salvar</button>
                    </div>
                </form>
            </div>


            <!--cadastrar voto do politico-->

            <div class="collapse mt-3" id="cadVotoPolitico">
                <span class="badge badge-pill badge-light">
                    <h2>Cadastro de voto do Político</h2>
                </span>
                <form action="classes/cadastroVotoPolitico.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="cadVotoIdPec" id="cadVotoIdPol" placeholder="ID da pec a cadastrar voto">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="cadVotoIdPol" id="cadVotoIdPol" placeholder="ID do político a registrar voto">
                        </div>
                        <div class="col">
                            <input type="radio" name="voto" id="favoravel" value="Favorável">
                            <label for="aFavor"><span class="badge badge-pill badge-success">Favorável</span></label>
                            <input type="radio" name="voto" id="contra" value="Contra">
                            <label for="contra"><span class="badge badge-pill badge-danger">Contra</span></label>
                            <button type="submit" class="btn btn-dark" value="Votar" name="submit">Votar</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-dark mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dadoPec = $conPec->fetch_array()) { ?>
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

            <!--editar politico-->

            <div class="collapse mt-3" id="editarPolitico">
                <span class="badge badge-pill badge-light">
                    <h2>Edição de dados do político</h2>
                </span>
                <form action="classes/editaPolitico.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="editIdPol" id="editIdPol" placeholder="Digite o ID do político a editar os dados">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="editNomPol" id="editNomPol" placeholder="Novo nome do Político">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="editPartPol" id="editPartPol" placeholder="Novo partido do Político">
                        </div>
                        <button type="submit" class="btn btn-dark">Salvar</button>
                    </div>
                </form>
                <span class="badge badge-pill badge-warning">Complete todos os dados do Político. Do contrário, ele poderá ficar com campos vazios!</span>
            </div>

            <!--excluir politico-->

            <div class="collapse mt-3" id="excluirPolitico">
                <span class="badge badge-pill badge-light">
                    <h2>Excluir Político</h2>
                </span>
                <form action="classes/excluirPolitico.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="delPolitico" id="delPolitico" placeholder="ID do Político a ser deletado">
                        </div>
                        <button type="submit" class="btn btn-dark">Deletar</button>
                    </div>
                </form>
                <span class="badge badge-pill badge-danger">Essa ação irá excluir permanentemente o político do sistema!</span>
            </div>

            <!--ver votos de um político-->

            <div class="collapse mt-3" id="votosPolitico">
                <span class="badge badge-pill badge-light">
                    <h2>Votos Políticos</h2>
                </span>
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="votoPolitico" id="votoPolitico" placeholder="ID do Político a verificar votos feitos">
                        </div>
                        <button type="submit" class="btn btn-dark">Verificar</button>
                    </div>
                </form>
                <!--tabela votos de um politico-->
                    <table class="table table-bordered table-dark mt-5 collapse mt-3" id="votosPolitico">
                        <thead>
                            <tr>
                                <th scope="col">id da Pec</th>
                                <th scope="col">id do Politico</th>
                                <th scope="col">voto do Político</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($dadoIdVotoPol = $conn->fetch_array()) { ?>
                                <tr>
                                    <th scope="col"><?php echo $dadoIdVotoPol["idPec"]; ?></th>
                                    <th scope="col"><?php echo $dadoIdVotoPol["idPolitico"]; ?></th>
                                    <th scope="col"><?php echo $dadoIdVotoPol["votoPolitico"]; ?></th>
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