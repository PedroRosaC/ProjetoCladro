<?php
require_once './shared/header.php'
?>
<header>

    <a href="index.php"><img src="img/logo.png" class="logo"></a>

    <ul class="menu">
        <li>
            <b><a href="cadastro.php?pg=1&&id=<?php
                                                @session_start();
                                                echo $_SESSION['id'];
                                                ?>">Alterar Cadastro</a></b>
        </li>
        <li><b><a href="cadastro.php">Cadastrar</a></b></li>
    </ul>
</header>

<form method="POST" action="controller/loginController.php">
    <div class="entrar">
        <h3>E-mail:</h3>
        <input type="email" name="email" id="email" class="input" placeholder="Insira seu e-mail">
        <h3>Senha:</h3>
        <input type="password" name="senha" id="senha" class="input" placeholder="Senha">
        <br><br>
        <input type="submit" name="entrar" value="Entrar" class="submit">
        <?php
        echo '<div class="d-grid">';
        @$cod = $_REQUEST['cod'];
        if (isset($cod)) {
            if ($cod == '171') {
                echo ('<br><div class="alert alert-danger">');
                echo ('Verifique usuário ou senha.');
                echo ('</div>');
            }
        }
        echo '</div>';
        ?>
    </div>
</form>
<br><br><br><br><br><br>
<?php
require_once './shared/footer.php'
?>