<?php
require_once './shared/header.php';
//require_once './controller/autenticationController.php';
?>
<header>
    <a href="index.php"><img src="img/epitelisLogo.png" class="logo"></a>
    <ul class="menu">
        <li><a href="login.php">Entrar</a></li>
    </ul>
</header>
<div>
    <form method="POST" action="controller/cadastroController.php">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div style="background-color: white; border-radius: 15px; box-shadow: 0px 5px 20px #000; ">
                    <div class="entrar">
                        <h3>E-mail:</h3>
                        <input type="email" name="email" id="email" class="input" placeholder="Insira seu e-mail">
                        <h3>Nome:</h3>
                        <input type="text" name="nome" id="nome" class="input" placeholder="Nome do paciente">
                        <h3>Senha:</h3>
                        <input type="password" name="senha" id="senha" class="input" placeholder="Senha">
                        <h3>Endereço:</h3>
                        <input type="text" name="endereco" id="endereco" class="input" placeholder="Endereço">
                        <h3>Idade</h3>
                        <input type="number" name="idade" id="idade" class="input" placeholder="Idade">
                        <h3>Data de nascimento</h3>
                        <input type="date" style="color: white;  padding-left: 3%" name="data_nasc" id="data_nasc" class="input" placeholder="dd/mm/aaaa">
                        <h3>Rg:</h3>
                        <input type="text" name="rg" id="rg" class="input" placeholder="RG do paciente">
                        <h3>CPF:</h3>
                        <input type="text" name="cpf" id="cpf" class="input" placeholder="CPF do paciente">
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
                            }if ($cod == '172') {
                                echo ('<br><div class="alert alert-success">');
                                echo ('FOI PORRA.');
                                echo ('</div>');
                            }
                        }
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
</div>
<?php
require_once './shared/footer.php';
?>