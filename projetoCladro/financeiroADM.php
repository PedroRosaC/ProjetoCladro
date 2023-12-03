<?php
require_once './controller/autenticationController.php';
require_once './shared/header.php';
?>
<div class="tabela">
    <table>
        <?php
        require_once './controller/procurarControlle.php';
        $ganhosList = loadGanhos();
        echo '<tr>';
        echo '<th class="tabelaitens">Ganhos</th>';
        foreach ($ganhosList as $ganhos) {
            echo '<td class="tabelaitens">';
            echo 'R$' . $ganhos['valor'] . '';
            echo '</td>';
        }
        echo '</tr>';
        ?>
        <?php
        $despesasList = loadDespesas();
        echo '<tr>';
        echo '<th class="tabelaitens">Despesas</th>';
        foreach ($despesasList as $despesas) {
            echo '<td class="tabelaitens">';
            echo 'R$' . $despesas['valor_despesa'] . '';
            echo '</td>';
        }
        echo '</tr>';
        ?>
        <?php
        $faturamentoList = loadFaturamento();
        echo '<tr>';
        echo '<th class="tabelaitens">Faturamento</th>';
        foreach ($faturamentoList as $faturamento) {
            echo '<td class="tabelaitens">';
            echo 'R$' . $faturamento['valor_total'] . '';
            echo '</td>';
        }
        echo '</tr>';
        ?>
    </table>
</div>
<?php
require_once './shared/footer.php'
?>