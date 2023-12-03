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
<div class="tabela">
    <table>
        <tr>
            <th class="tabelaitens">Item</th>
            <th class="tabelaitens">Data de validade</th>
            <th class="tabelaitens">Valor</th>
            <th class="tabelaitens">Quantidade</th>
            <th class="tabelaitens"></th>
        </tr>
        <?php
        require_once './controller/procurarControlle.php';
        $itemList = loadItem();
        foreach ($itemList as $item) {
            echo '<tr>';
            echo '<td class="tabelaitens">';
            echo $item['nome'];
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo $item['data_validade'];
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo 'R$' . $item['valor'] . '';
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo $item['Quantidade'];
            echo '</td>';
            echo '<td class="tabelaitens">';
                echo '<a class="btn btn-success" href="ItemADM.php?'
                . 'cod=update&&id=' . $item['id'] .'">Alterar item</a>';
                echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
<?php
require_once './shared/footer.php';
?>