<?php
require_once './shared/header.php';
?>
<header>
    <a href="index.php"><img src="img/epitelisLogo.png" class="logo"></a>
    <ul class="menu">
        <li><a href="cadastro.php">Cadastrar</a></li>
        <li><a href="login.php">Entrar</a></li>
    </ul>
</header>


<div>
    <form method="POST" action="controller/loginController.php">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
require_once './shared/footer.php'
?>