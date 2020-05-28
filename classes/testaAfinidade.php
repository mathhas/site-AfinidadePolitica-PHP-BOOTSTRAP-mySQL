<!DOCTYPE html>
<html lang="en">
<?php
// fazer comparação de votos para calcular afinidade entre usuário e político

//conexão com o DB
include("conexao.php");

//id do político e usuário a testar afinidade
$idPol = @$_POST['idPol'];
$idUsu = @$_POST['idUsu'];

//tipo de persistencia ao DB
$sql = "SELECT * FROM votospoliticos join votosusuarios on votospoliticos.idPec = votosusuarios.idPec WHERE idPolitico = '$idPol' AND idUsuario = '$idUsu'";

//executa ação no db ou encerra se der erro
$conn = $mySqli->query($sql) or die($mySqli->error);

//cria um vetor para salvar os votos em comum
$vetorDeVotosEmComum = array();
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">

    <title>Afinida Política</title>
</head>

<body>


    <div class="container">
        <!--navbar-->
        <nav class="navbar navbar-dark bg-dark">
            <!--logo do site com link para voltar a página incial-->
            <a href="../index.php">
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
                        <a href="../index.php" class="nav-link">Início</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../testarAfinidade.php" class="nav-link">Testar afinidade com políticos</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../usuarios.php" class="nav-link">Cadastrar voto em Proposta de Ementa Constitucional</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../politicos.php" class="nav-link">Cadastrar Político</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../pecs.php" class="nav-link">Cadastrar Proposta de Ementa Constitucional</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../politicos.php" class="nav-link">Cadastrar voto do político a ementa</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../politicos.php" class="nav-link">Editar políticos</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../pecs.php" class="nav-link">Editar Proposta de Ementa Constitucional</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../politicos.php" class="nav-link">Excluir Politicos</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="../pecs.php" class="nav-link">Excluir Proposta de ementa Constitucional</a>
                    </li>
                </ul>
            </div>
        </nav>

        <a href="../testarAfinidade.php" class="btn btn-dark mt-3">
            Voltar</a>
        <!--tabela relacionando votos de politicos e usuarios-->
        <table class="table table-striped table-dark mt-3">
            <thead>
                <tr>
                    <th scope="col">id Pec</th>
                    <th scope="col">Id Político</th>
                    <th scope="col">id Usuário</th>
                    <th scope="col">voto Político</th>
                    <th scope="col">voto Usuário</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php while ($comparacaoVotos = $conn->fetch_array()) { ?>
                        <th scope="row"><?php echo $comparacaoVotos["idPec"] ?></th>
                        <td><?php echo $comparacaoVotos["idPolitico"] ?></td>
                        <td><?php echo $comparacaoVotos["idUsuario"] ?></td>
                        <td><?php echo $comparacaoVotos["votoPolitico"] ?></td>
                        <td><?php echo $comparacaoVotos["votoUsuario"] ?></td>
                </tr>
            <?php array_push($vetorDeVotosEmComum, $comparacaoVotos);
                    } ?>
            </tbody>
        </table>

        <!--percentual de afinidade-->
        <?php
        $i = 0;
        $votosIguais = 0;
        $totalVotos = count($vetorDeVotosEmComum);

        //validação de entradas
        if (empty($vetorDeVotosEmComum[0]["votoPolitico"]) || empty($vetorDeVotosEmComum[0]["votoUsuario"])) {

            //header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
            echo "<span class='badge badge-warning'>Votos não encontrados, volte a página anterior e tente novamente</span>";
            exit;
        }

        //operação de percentual se as entradas forem válidas
        while ($i < $totalVotos) {
            if ($vetorDeVotosEmComum[$i]["votoPolitico"] == $vetorDeVotosEmComum[$i]["votoUsuario"]) {
                $votosIguais++;
            }
            $i++;
        }

        $afinidade = ($votosIguais / $totalVotos) * 100;
        $afinidadeFormatada = number_format($afinidade, 2, ",", ".");

        ?>

        <!--card exibição afinidade-->
        <div class="row mt-5 justify-content-center">
            <div class="col-sm-4 col-md-4">
                <div class="card text-white bg-dark text-center">
                    <div class="card-header">A afinidade calculada com este político foi:</div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo "$afinidadeFormatada%"; ?></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>