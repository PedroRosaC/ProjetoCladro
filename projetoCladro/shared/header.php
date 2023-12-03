<!DOCTYPE html>
<html>

    <head>
        <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="./img/epitelisLogo.png">
        <link rel="stylesheet" href="css/sidebar.css">
        <title>Epitelis</title>
        <link rel="stylesheet" href="./css/estilo.css">
    </head>

    <body>
        <header>

            <div>

                <div class="content">
                    <?php
                    @session_start();
                    if (isset($_SESSION['user'])) {
                        echo '<button class="open" onclick="abrir()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list whiteimg" viewBox="0 0 16 16" id="">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </button>';
                    }
                    ?>
                    <a href="index.php"><img src="img/logo.png" class="logo img"></a>
                </div>


                <?php
                require_once './model/pacienteModel.php';
                @session_start();
                if (@$_SESSION['user'] == 'pct') {
                    echo '<div class="sidebar">
                        <div class="close">
                            <img src="img/X.png" class="close-btn whiteimg" onclick="fechar()">
                        </div>
                        <a class="a" href="solicitarConsulta.php">
                            <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><a class="text">Solicitar Consulta</a>
                            </div>
                        </a>
                        
                        <a class="a" href="index.php">
                            <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><a class="text">Home</a>
                            </div>
                        </a>
                        <a class="a" href="#">
                            <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><a class="text">Perfil</a>
                            </div>
                        </a>
                    </div>';
                }
                if (@$_SESSION['user'] == 'socia') {
                    echo '<div class="sidebar">
                        <div class="close">
                            <img src="img/X.png" class="close-btn whiteimg" onclick="fechar()">
                        </div>
                        <a class="a" href="cadastroADM.php?pg=1&&id=
                        "' . @session_start();
                    echo @$_SESSION['id'] . '">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Alterar Cadastro PCT</a>
                    </div>
                </a>
                <a class="a" href="faturamentoADM.php">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Faturamento</a>
                    </div>
                </a>
                <a class="a" href="estoqueADM.php">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Estoque</a>
                    </div>
                </a>
                <a class="a" href="itemADM.php">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Lançar Itens</a>
                    </div>
                </a>
                <a class="a" href="despesasADM.php">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Lançar Despesas</a>
                    </div>
                </a>
                <a class="a" href="cadastroADM.php">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Cadastro</a>
                    </div>
                </a>
                <a class="a" href="financeiroADM.php">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Financeiro</a>
                    </div>
                </a>
                <a class="a" href="consultaADM.php">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Criar Consulta</a>
                    </div>
                </a>
                <a class="a" href="solicitarConsulta.php">
                    <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Consultas Solicitadas</a>
                    </div>
                </a>
            </div>';
                }
                if (@$_SESSION['user'] == 'atendente') {
                    echo '<div class="sidebar">
                        <div class="close">
                            <img src="img/X.png" class="close-btn whiteimg" onclick="fechar()">
                        </div>
                        <a class="a" href="cadastroADM.php?pg=1&&id=
                        "' . @session_start();
                    echo @$_SESSION['id'] . '">
                            <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Alterar cadastro PCT
                            </div>
                        </a>
                        
                        <a class="a" href="itemADM.php">
                            <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg"><p class="text">Lançar Itens</a>
                            </div>
                        </a>
                        <a class="a" href="CadastroADM.php">
                            <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Cadastro
                            </div>
                        </a>
                        <a class="a" href="consultaADM.php">
                            <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Criar Consulta
                            </div>
                        </a>  
                        <a class="a" href="solicitarConsulta.php">
                            <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">consultas Solicitadas
                            </div>
                        </a>
                    </div>';
                }
                ?>
            </div>
            <ul class="menu">
                <?php
                if (empty($_SESSION)) {
                    echo '<li><a href="login.php"><b>Entrar</b></a></li>';
                } else {
                    echo '<li><a href="./controller/logoutController.php?cod=logout"><b>Sair</b></a></li>';
                }
                ?>
                <li><a href="local.php"><b>Localização</b></a></li>
            </ul>

        </header>