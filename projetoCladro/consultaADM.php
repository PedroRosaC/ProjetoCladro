<?php
require_once './controller/autenticationController.php';
require_once './shared/header.php';
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
        echo ('<br><div class="alert alert-success">');
        echo ('Dados inseridos.');
        echo ('</div>');
    }
    if (isset($cod)) {
        if ($cod == '171') {
            echo ('<br><div class = "alert alert-danger">');
            echo ('Verifique usuário ou senha.');
            echo ('</div>');
        }
    }
    if ($cod == '172') {
        echo ('<br><div class="alert alert-danger">');
        echo ('Sua sessão expirou, entre novamente!');
        echo ('</div>');
    }
    if ($cod == '173') {
        echo ('<br><div class="alert alert-danger">');
        echo ('Verifique os dados e tente novamente!');
        echo ('</div>');
    }
}
echo '</div>';
echo '</div>';
?>
<div class="entrar entrar2">
    <form method="POST" action="controller/consultaController.php">
        <h1>Criar Consulta:</h1>
        <h3>Data:</h3>
        <input type="date" name="data" id="data" class="input" placeholder="Insira data desejada">
        <h3>Hora:</h3>
        <input type="time" name="hora" id="hora" class="input" placeholder="Insira hora desejada">
        <h3>Serviço:</h3>
        <select class="input" name="servico" id="servico">
            <option value="">Serviço</option>
            <option value="Podologia">Podologia</option>
            <option value="coisarada">coisarada</option>
            <option value="ferimentos">ferimentos</option>
            <option value="lesões">lesões</option>
        </select>
        <h3>Valor:</h3>
        <input type="text" name="valor" id="valor" class="input" placeholder="Insira o valor da consulta">
        <h3>Estoque Usado?</h3>
        <input type="checkbox" name="estoque" id="estoque" style="width: 20px; height: 20px;" value="1">
        <h3>Qual paciente?</h3>
        <input type="text" name="nome" id="nome" class="input" placeholder="Insira o nome do paciente">
        <input type="submit" name="entrar" value="Entrar" class="submit">
    </form>
</div>
<?php
require_once './shared/footer.php';
?>