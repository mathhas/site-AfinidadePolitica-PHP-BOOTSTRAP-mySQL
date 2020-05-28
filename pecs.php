<?php
//inclui a classe da conexão com o db
include("classes/conexao.php");

//tipo de acesso a tabela
$consulta = "SELECT * FROM pecs";

//faz cosulta a tabela ou encerra se der erro
$con = $mySqli->query($consulta) or die($mysqli->error);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">

    <title>Pec's Cadastradas</title>
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
        <!--tabela com pecs cadastradas-->
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
                <?php while ($dado = $con->fetch_array()) { ?>
                    <tr>
                        <th scope="col"><?php echo $dado["id"]; ?></th>
                        <th scope="col"><?php echo $dado["codigo"]; ?></th>
                        <th scope="col"><?php echo $dado["nome"]; ?></th>
                        <th scope="col"><?php echo $dado["descricao"]; ?></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-------------------------------------funcionalidades de politicos---------------------------------------->

        <!--botôes de ação-->
        <div class="col text-center mt-5">
            <div class="row justify-content-center">
                <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#cadPec" aria-expanded="false" aria-controls="cadPec">
                        Cadastrar Pec
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#editPec" aria-expanded="false" aria-controls="editPec">
                        Editar Pec
                    </a>
                </p>
                <p class="ml-3">
                    <a class="btn btn-dark" data-toggle="collapse" href="#delPec" aria-expanded="false" aria-controls="delPec">
                        Excluir Pec
                    </a>
                </p>
            </div>

            <!--cadastrar pec-->
            <div class="collapse mt-3" id="cadPec">
                <span class="badge badge-pill badge-light">
                    <h2>Cadastrar Pec</h2>
                </span>
                <form action="classes/cadastraPecs.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="cadCodPec" id="cadCodPec" placeholder="Código da Pec">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="cadNomPec" id="cadNomPec" placeholder="Nome da Pec">
                        </div>
                        <div class="col">
                            <textarea class="form-control" id="cadDescPec" name="cadDescPec" cols="20" rows="4" placeholder="Descrição da Pec"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Salvar</button>
                    </div>
                </form>
            </div>


            <!--editar pec-->

            <div class="collapse mt-3" id="editPec">
                <span class="badge badge-pill badge-light">
                    <h2>Editar Pecs</h2>
                </span>
                <form action="classes/editaPec.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="editPec" id="editPec" placeholder="ID da pec a editar">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="editCodPec" id="editCodPec" placeholder="Novo código da pec">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="editNomPec" id="editNomPec" placeholder="Novo nome da Pec">
                        </div>
                        <div class="col">
                            <textarea class="form-control" id="editDescPec" name="editDescPec" rows="4" cols="20" placeholder="Nova descrição da Pec"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Salvar</button>
                    </div>
                </form>
                <span class="badge badge-pill badge-warning">Complete todos os dados da Pec. Do contrário, ela poderá ficar com campos vazios!</span>
            </div>

            <!--excluir pec-->

            <div class="collapse mt-3" id="delPec">
                <span class="badge badge-pill badge-light">
                    <h2>Excluir pec cadastrada</h2>
                </span>
                <form action="classes/excluirPec.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="delPec" id="delPec" placeholder="Digite o ID da Pec a ser deletada">
                        </div>
                        <button type="submit" class="btn btn-dark">Deletar</button>
                    </div>
                </form>
                <span class="badge badge-pill badge-danger">Essa ação irá excluir a Pec permanentemente do sistema!</span>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>