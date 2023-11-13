<?php
require_once './shared/header.php'
?>
<header>

    <a href="index.php"><img src="img/logo.png" class="logo"></a>

    <ul class="menu">
        <li>
            <b><a href="cadastro.php?pg=1&&id=<?php
                @session_start();
                echo @$_SESSION['id'];
                ?>">Alterar Cadastro</a></b>
        </li>
        <li><b><a href="cadastro.php">Cadastrar</a></b></li>
    </ul>
</header>
<div class="entrar">
    <p>AABATATA</p>
</div>
<?php
echo '<form method = "POST" action = "controller/loginPacienteController.php">';
echo '<div class = "entrar">';
echo '<h3>E-mail:</h3>';
echo '<input type = "email" name = "email" id = "email" class = "input" placeholder = "Insira seu e-mail">';
echo '<h3>Senha:</h3>';
echo ' <input type = "password" name = "senha" id = "senha" class = "input" placeholder = "Senha">';
echo '<input type = "submit" name = "entrar" value = "Entrar" class = "submit">';
echo '<div class = "d-grid">';
@$cod = $_REQUEST['cod'];
if (isset($cod)) {
    if ($cod == '171') {
        echo ('<br><div class = "alert alert-danger">');
        echo ('Verifique usuário ou senha.');
        echo ('</div>');
    }
}
echo '</div>';
echo '</div> </form>';
?>
<?php
require_once './shared/footer.php'
?>