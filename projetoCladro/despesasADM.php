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
    }if (isset($cod)) {
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
    }if ($cod == '173') {
        echo ('<br><div class="alert alert-danger">');
        echo ('Verifique os dados e tente novamente!');
        echo ('</div>');
    }
}
echo '</div>';
echo '</div>';
?>
<div class="entrar entrar2">
    <form method="POST" action="controller/despesasController.php">
        <h1>Criar Despesa:</h1>
        <h3>valor:</h3>
        <input type="text" name="valor" id="valor" class="input" placeholder="Insira o valor da despesa">
        <h3>Descrição da despesa:</h3>
        <textarea name="descricao" id="descricao" class="input" placeholder="Insira uma descrição"></textarea>
        <input type="submit" name="entrar" value="Entrar" class="submit">
    </form>
</div>
<?php
require_once './shared/footer.php';
?>