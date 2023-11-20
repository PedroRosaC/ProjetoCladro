<!DOCTYPE html>
<html>

    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.7.0.min.js" type="text/javascript"></script>
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
                <a href="index.php"><img src="img/logo.png" class="logo img"></a>
                <?php
                require_once './model/pacienteModel.php';
                @session_start();
                if (@$_SESSION['user'] == 'pct') {
                    echo'<div class="sidebar">
    <div class="close">
        <img src="img/X.png" class="close-btn whiteimg" onclick="fechar()">
    </div>
    <a class="a" href="solicitarConsulta.php">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Solicitar Consulta
        </div>
    </a>
    <a class="a" href="#">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Home
        </div>
    </a>
    <a class="a" href="#">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Home
        </div>
    </a>
    <a class="a" href="#">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Home
        </div>
    </a>
</div>
<div class="content">
    <button class="open" onclick="abrir()" class="open-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" id="">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </button>
</div>';
                }
                if (@$_SESSION['user'] == 'socia') {
                    echo'<div class="sidebar">
    <div class="close">
        <img src="img/X.png" class="close-btn whiteimg" onclick="fechar()">
    </div>
    <a class="a" href="cadastroADM.php?pg=1&&id=
    "' . @session_start();
                    echo @$_SESSION['id'] . '">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Alterar cadastro PCT
        </div>
    </a>
    <a class="a" href="cadastroADM.php">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Cadastro
        </div>
    </a>
    <a class="a" href="financeiroADM.php">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Financeiro
        </div>
    </a>
    <a class="a" href="consultaADM.php">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Criar Consulta
        </div>
    </a>
</div>
<div class="content">
    <button class="open" onclick="abrir()" class="open-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" id="">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </button>
</div>';
                }
                if (@$_SESSION['user'] == 'atendente') {
                    echo'<div class="sidebar">
    <div class="close">
        <img src="img/X.png" class="close-btn whiteimg" onclick="fechar()">
    </div>
    <a class="a" href="cadastroADM.php?pg=1&&id=
    "' . @session_start();
                    echo @$_SESSION['id'] . '">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Alterar cadastro PCT
        </div>
    </a>
    <a class="a" href="CadastroADM.php">
        <div class="itens"><img src="img/home.png" alt="homeimagem" class="icon whiteimg">Cadastro
        </div>
    </a>
</div>
<div class="content">
    <button class="open" onclick="abrir()" class="open-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" id="">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </button>
</div>';
                }
                ?>
            </div>
            <ul class="menu">
                <?php
                if(empty($_SESSION)){
                echo '<li><a href="login.php"><b>Entrar</b></a></li>';
                }else{
                echo '<li><a href="./controller/logoutController.php?cod=logout"><b>Sair</b></a></li>';                    
                }
                ?>
                <li><a href="local.php"><b>Localização</b></a></li>
            </ul>

        </header>