<?php

if ($_POST) {
    require_once '../model/faturamentoModel.php';
    $faturamento = new faturamentoModel();

    if (!empty($_POST['calcular'])) {
        require_once '../model/despesasModel.php';
        require_once '../model/ganhosModel.php';
        $despesas = new despesasModel();
        $ganhos = new ganhosModel();
        $despesasList = $despesas->loadDespesas();
        $ganhosList=$ganhos->loadGanhos();
        $valor = 0;
        $valor_d = 0;
        foreach ($despesasList as $d){
            $valor_d+=$d['valor_despesa'];
        }
        foreach ($ganhosList as $g){
            $valor+=$g['valor'];
        }
        echo $valor;
        echo '<br>';
        echo $valor_d;
        $total = $faturamento->calcular($valor, $valor_d);
        header('location:../faturamentoADM.php?cod=170');
        echo $total;
    } else {
        header('location:../faturamentoADM.php?cod=173');
    }
} else {
    header('location:../index.php');
}




