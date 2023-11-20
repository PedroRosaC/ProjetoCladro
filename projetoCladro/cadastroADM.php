<?php
require_once './shared/header.php';
?>
<?php
if ($_REQUEST) {
    @$tipo = $_POST['tipo'];
    $pg = isset($_REQUEST['pg']) ? $_REQUEST['pg'] : null;
    if (isset($pg)) {
        if ($pg == '1') {
            require_once './controller/loginPacienteController.php';
            $id = $_REQUEST['id'];
            $pacienteObject = loadById($id);
            echo '<div class="entrar entrar2">
                        <form method="POST" action="controller/loginPacienteController.php">
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
                        </form>
                        </div>';
        }
    } else {
        if ($tipo == 'paciente') {
            echo '<div class="entrar entrar2">
          <form method="POST" action="controller/cadastroPacienteController.php">
          <h1>Cadastrar</h1>
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
          </form>
        </div>';
        }
        if ($tipo == 'socia') {
            echo '<div class="entrar entrar2">
                  <form method="POST" action="controller/cadastroSociaController.php">
                  <h1>Cadastrar</h1>
                  <h3>E-mail:</h3>
                  <input type="email" name="email" id="email" class="input" placeholder="Insira seu e-mail">
                  <h3>Nome:</h3>
                  <input type="text" name="nome" id="nome" class="input" placeholder="Insira seu Nome">
                  <h3>Senha:</h3>
                  <input type="password" name="senha" id="senha" class="input" placeholder="Insira sua Senha">
                  <h3>Disponibilidade:</h3>
                  <input type="text" name="disponibilidade" id="disponibilidade" class="input" placeholder="Insira sua disponibilidade">
                  <h3>Serviços</h3>
                  <input type="text" name="servicos" id="servicos" class="input" placeholder="Insira seus serviços">
                  <input type="submit" name="entrar" value="Entrar" class="submit">
                  </form>
                  </div>';
        }
        if ($tipo == 'atendente') {
            echo '<div class="entrar entrar2">
                  <form method="POST" action="controller/cadastroAtendenteController.php">
                  <h1>Cadastrar</h1>
                  <h3>E-mail:</h3>
                  <input type="email" name="email" id="email" class="input" placeholder="Insira seu e-mail">
                  <h3>Nome:</h3>
                  <input type="text" name="nome" id="nome" class="input" placeholder="Insira seu Nome">
                  <h3>Senha:</h3>
                  <input type="password" name="senha" id="senha" class="input" placeholder="Insira sua Senha">
                  <h3>Função:</h3>
                  <input type="text" name="funcao" id="funcao" class="input" placeholder="Insira sua funcao">
                  <input type="submit" name="entrar" value="Entrar" class="submit">
                  </form>
                  </div>';
        }
    }
} else {
    echo '<form method="POST" action="cadastroADM.php">
        <div class="entrar">
        <h2>Que tipo de usuário é você?</h2>
        <label><input class="form-check-input" type="radio" value="atendente" name="tipo" id="atendente"> Atendente</label><br>
        <label><input class="form-check-input" type="radio" value="socia" name="tipo" id="socia"> Socia</label><br>
        <label><input class="form-check-input" type="radio" value="paciente" name="tipo" id="paciente"> Paciente</label><br>
        <input type="submit" class="submit">
        </div>
        </form>';
}
?>
<?php

echo '<div style="
    margin: 30px auto;
    width: 350px;
    align-content: center;">';
echo '<div class="d-grid">';
@$cod = $_REQUEST['cod'];
if (isset($cod)) {
    if ($cod == '170') {
        echo ('<br><div class="alert alert-danger">');
        echo ('Dados não inseridos.');
        echo ('</div>');
    }
    if ($cod == '172') {
        echo ('<br><div class="alert alert-success">');
        echo ('Dados inseridos com sucesso');
        echo ('</div>');
    }
}
echo '</div>';
echo '</div>';
?>
<?php
require_once './shared/footer.php';
?>