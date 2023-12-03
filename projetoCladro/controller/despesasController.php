<?php

if ($_POST) {
    require_once '../model/despesasModel.php';
    $despesas = new despesasModel();
    $despesas->setValor_despesa($_POST['valor']);
    $despesas->setDescricao($_POST['descricao']);
    if (!empty($_POST['valor']) && !empty($_POST['descricao'])) {
        $total = $despesas->insert();        
        header('location:../despesasADM.php?cod=170');
    } else {
        header('location:../despesasADM.php?cod=173');
    }
} else {
    header('location:../index.php');
}