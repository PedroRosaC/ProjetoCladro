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
<?php

@$cod = $_REQUEST['cod'];
if ($cod == 'update') {
    require_once './controller/procurarControlle.php';
    require_once './model/itemModel.php';
    $id = $_REQUEST['id'];
    $itemObject = loadByIdItem($id);
    echo '<div class = "entrar entrar2">
    <form method = "POST" action = "controller/itemController.php">
    <input type="hidden" name="id" value="'.$id.'" >
    <h1>Criar Item:</h1>
    <h3>Nome:</h3>
    <input type = "text" name = "nome" id = "nome" class = "input" value="' . (isset($itemObject) ? $itemObject->getNome() : '') . '">
    <h3>Data de Validade:</h3>
    <input type = "date" name = "data_validade" id = "data_validade" class = "input" value="' . (isset($itemObject) ? $itemObject->getData_validade() : '') . '">
    <label><input type = "checkbox" name = "reutilizavel" id = "reutilizavel" class = "input" value="' . (isset($itemObject) ? $itemObject->getReutilizavel() : '') . '">É Reutilizável?</label>
    <h3>Valor:</h3>
    <input type = "text" name = "valor" id = "valor" class = "input" value="' . (isset($itemObject) ? $itemObject->getValor() : '') . '">
    <h3>Qual a quantidade disponível?</h3>
    <input type = "number" name = "Quantidade" id = "Quantidade" class = "input" value="' . (isset($itemObject) ? $itemObject->getQuantidade() : '') . '">
    <input type = "submit" name = "entrar" value = "Entrar" class = "submit">
    </form>
    </div>';
} else {
    echo '<div class = "entrar entrar2">
    <form method = "POST" action = "controller/itemController.php">
    <h1>Criar Item:</h1>
    <h3>Nome:</h3>
    <input type = "text" name = "nome" id = "nome" class = "input" placeholder = "Insira o nome do Item">
    <h3>Data de Validade:</h3>
    <input type = "date" name = "data_validade" id = "data_validade" class = "input" placeholder = "Insira a data de validade">
    <label><input type = "checkbox" name = "reutilizavel" id = "reutilizavel" class = "input" value = "s">É Reutilizável?</label>
    <h3>Valor:</h3>
    <input type = "text" name = "valor" id = "valor" class = "input" placeholder = "Insira o valor da consulta">
    <h3>Qual a quantidade disponível?</h3>
    <input type = "number" name = "Quantidade" id = "Quantidade" class = "input" placeholder = "Insira a quantidade disponível">
    <input type = "submit" name = "entrar" value = "Entrar" class = "submit">
    </form>
    </div>';
}
?>
<?php

require_once './shared/footer.php';
?>