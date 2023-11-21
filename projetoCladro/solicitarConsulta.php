<?php
require_once './shared/header.php';
?>
<div class="entrar entrar2">
    <form method="POST" action="controller/solicitarConsultaController.php">
        <h1>Informações da Consulta:</h1>
        <input type="hidden" name="id" value="id" id="id" class="input" >
        <h3>Data:</h3>
        <input type="date" name="data" id="data" class="input" placeholder="Insira data desejada">
        <h3>Hora:</h3>
        <input type="time" name="hora" id="hora" class="input" placeholder="Insira hora desejada">
        <h3>Seriço:</h3>
        <input type="text" name="servico" id="servico" class="input" placeholder="Insira o tipo de serviço">
        <input type="hidden" name="paciente_id" value="<?php
        //session_start();
        echo (isset($_SESSION['id']) ? $_SESSION['id'] : '');
        ?>">
        <input type="submit" name="entrar" value="Entrar" class="submit">
    </form>
</div>
<?php
require_once './shared/footer.php';
?>
