<?php

if ($_POST) {
    require_once '../model/faturamentoModel.php';
    $faturamento = new faturamentoModel();

    if (!empty($_POST['calcular'])) {
        $d = 0;
        $g = 0;
        require_once '../model/despesasModel.php';
        require_once '../model/ganhosModel.php';
        $despesas = new despesasModel();
        $ganhos = new ganhosModel();
        while ($d < 500) {
            $valor_d = 0;
            $valor_d = $valor_d + $despesas->getValor_despesa();
            $d++;
        }
        while ($g < 500) {
            $valor = 0;
            $valor = $valor + $ganhos->getConsulta_Valor();
            $g++;
        }
        $total = $faturamento->calcular($valor, $valor_d);
        header('location:../faturamentoADM.php?cod=170');
    } else {
        header('location:../faturamentoADM.php?cod=173');
    }
} else {
    header('location:../index.php');
}




