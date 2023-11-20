<?php
require_once './shared/header.php';
?>
<div class="entrar entrar2">
    <form method="POST" action="controller/consultaController.php">
        <h1>Criar Consulta:</h1>
        <h3>Data:</h3>
        <input type="date" name="data" id="data" class="input" placeholder="Insira data desejada">
        <h3>Hora:</h3>
        <input type="time" name="hora" id="hora" class="input" placeholder="Insira hora desejada">
        <h3>Seriço:</h3>
        <input type="text" name="servico" id="servico" class="input" placeholder="Insira o tipo de serviço">
        <h3>Valor:</h3>
        <input type="text" name="valor" id="valor" class="input" placeholder="Insira o valor da consulta">
        <h3>Qual paciente?</h3>
        <input type="text" name="nome" id="nome" class="input" placeholder="Insira o nome do paciente">
        <input type="submit" name="entrar" value="Entrar" class="submit">
    </form>
</div>
<?php
require_once './shared/footer.php';
?>