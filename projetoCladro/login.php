<?php
require_once './shared/header.php'
?>
<header>
    <a href="index.php"><img src="img/epitelisLogo.png" class="logo"></a>
    <ul class="menu">
        <li><a href="cadastro.php">Cadastrar</a></li>
    </ul>
</header>


<div>
    <form method="POST" action="controller/loginController.php">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div style="background-color: white; border-radius: 15px; box-shadow: 0px 5px 20px #000;">
                    <div class="entrar">
                        <h3>E-mail:</h3>
                        <input type="email" name="email" id="email" class="input" placeholder="Insira seu e-mail">
                        <h3>Senha:</h3>
                        <input type="password" name="senha" id="senha" class="input" placeholder="Senha">
                        <br><br>
                        <input type="submit" name="entrar" value="Entrar" class="submit">
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
</div>
<br><br><br><br><br><br>
<?php
require_once './shared/footer.php'
?>