<?php
require_once './shared/header.php';
//require_once './controller/autenticationController.php';
?>
<header>
    <a href="index.php"><img src="img/logo.png" class="logo"></a>
    <ul class="menu">
        <li><b><a href="login.php">Entrar</a></b></li>
    </ul>
</header>
<div>

    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div style="background-color: white; border-radius: 15px; box-shadow: 0px 5px 20px #000; ">
                <div class="entrar">
                    <?php
                    $pg = isset($_REQUEST['pg']) ? $_REQUEST['pg'] : null;
                    if (isset($pg)) {
                        if ($pg == '1') {

                            require_once './controller/loginController.php';
                            $id = $_REQUEST['id'];
                            $pacienteObject = loadById($id);
                            echo '
                                   <form method="POST" action="controller/loginController.php">
                        <h3>E-mail:</h3>
                        <input type="hidden" name="id" value="' . @(isset($pacienteObject) ? $pacienteObject->getId($id) : '') . '" >
                        <input type="email" name="email" id="email" class="input" placeholder="Insira seu e-mail"
                        value="' . @(isset($pacienteObject) ? $pacienteObject->getEmail() : '') . '">
                        <h3>Nome:</h3>
                        <input type="text" name="nome" id="nome" class="input" placeholder="Nome do paciente"
                        value="' . @(isset($pacienteObject) ? $pacienteObject->getNome() : '') . '">
                        <h3>Senha:</h3>
                        <input type="password" name="senha" id="senha" class="input" placeholder="Senha"
                        value="' . @(isset($pacienteObject) ? $pacienteObject->getSenha() : '') . '">
                        <h3>Endereço:</h3>
                        <input type="text" name="endereco" id="endereco" class="input" placeholder="Endereço"
                        value="' . @(isset($pacienteObject) ? $pacienteObject->getEndereco() : '') . '">
                        <h3>Idade</h3>
                        <input type="number" name="idade" id="idade" class="input" placeholder="Idade"
                        value="' . @(isset($pacienteObject) ? $pacienteObject->getIdade() : '') . '">
                        <h3>Data de nascimento</h3>
                        <input type="date" style="color: white;  padding-left: 3%" name="data_nasc" id="data_nasc" class="input" placeholder="dd/mm/aaaa"
                        value="' . @(isset($pacienteObject) ? $pacienteObject->getData_nasc() : '') . '">
                        <h3>Rg:</h3>
                        <input type="text" name="rg" id="rg" class="input" placeholder="RG do paciente"
                        value="' . @(isset($pacienteObject) ? $pacienteObject->getRg() : '') . '">
                        <h3>CPF:</h3>
                        <input type="text" name="cpf" id="cpf" class="input" placeholder="CPF do paciente"
                        value="' . @(isset($pacienteObject) ? $pacienteObject->getCpf() : '') . '">
                        <br><br>
                        <input type="submit" name="entrar" value="Entrar" class="submit">
                        </form>';
                        }
                    } else {
                        echo '
                                <form method="POST" action="controller/cadastroController.php">
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
                        </form>';
                    }
                    ?>
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
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php
require_once './shared/footer.php';
?>