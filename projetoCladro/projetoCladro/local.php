<?php
require_once './shared/header.php';
?>
<header>
    <a href="index.php"><img src="img/logo.png" class="logo"></a>
    <ul class="menu">
        <li><a href="cadastro.php"><b>Cadastrar</b></a></li>
        <li><a href="login.php"><b>Entrar</b></a></li>
    </ul>
</header>




<form method="POST" action="controller/loginController.php">
    <div class="local">
        <h1>Localização da clínica</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3465.700078436121!2d-53.825857789208015!3d-29.699473974995325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9503cb3202a0d03d%3A0xf4904abc409bb6d5!2sCl%C3%ADnica%20Epitelis%20-%20Tratamento%20de%20Feridas%20e%20Podiatria!5e0!3m2!1spt-BR!2sbr!4v1699568444959!5m2!1spt-BR!2sbr"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</form>





<?php
require_once './shared/footer.php';
?>