<!doctype html>

<html lang="pt-br">

<!--conexao com db-->
<?php
include("classes/conexao.php");
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">

    <title>Afinidade Política</title>
</head>

<body>
    <!--página inicial-->
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

        <!--cards de escolha: políticos/Pecs -->

        <div class="row pt-5">
            <!--card acessar politicos-->
            <div class="col-sm-4 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://www.alagoinhashoje.com/wp-content/uploads/2019/07/ESQUERDA-E-DIREITA-1-886x465.jpg" alt="imagem card politicos" class="card-img-top">
                        <h2 class="card-title">Acessar políticos</h2>
                        <p class="card-text">Veja os políticos já cadastrados.</p>
                        <a href="politicos.php" class="card-link">Entrar</a>
                    </div>
                </div>
            </div>

            <!--card acessar usuários-->
            <div class="col-sm-4 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://www.growdigital.com.br/wp-content/uploads/2017/04/comportamento-usuario-internet-vender-mais.jpg" alt="imagem card usuarios" class="card-img-top">
                        <h2 class="card-title">Acessar usuários</h2>
                        <p class="card-text">Veja os usuários já cadastrados.</p>
                        <a href="usuarios.php" class="card-link">Entrar</a>
                    </div>
                </div>
            </div>

            <!--card acessar pec's-->
            <div class="col-sm-4 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://jornal.usp.br/wp-content/uploads/2018/10/20181002_00_constituicao_federal_1988_1.jpg" alt="imagem card pecs" class="card-img-top">
                        <h2 class="card-title">Acessar Pec's</h2>
                        <p class="card-text">Veja as Pec's cadastradas.</p>
                        <a href="pecs.php" class="card-link">Entrar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid text-center mt-2">
            <div class="container">
                <h1 class="display-4">Teste sua afinidade política</h1>
                <p class="lead">Teste sua afinidade política com os políticos cadastrados. O processo considera ambos os votos em pec's, e retona uma porcentagem indicativa aproximada de sua afinidade com determinado político.</p>
                <h2 class="display-8">
                    <a href="testarAfinidade.php">Testar agora!</a>
                </h2>
            </div>
        </div>

    </div>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>