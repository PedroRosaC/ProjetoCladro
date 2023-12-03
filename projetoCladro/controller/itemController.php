<?php

if ($_POST) {
    require_once '../model/itemModel.php';
    $item = new itemModel();
    $item->setNome($_POST['nome']);
    $item->setData_validade($_POST['data_validade']);
    @$item->setReutilizavel($_POST['reutilizavel']);
    $item->setValor($_POST['valor']);
    $item->setQuantidade($_POST['Quantidade']);
    if (!empty($_POST['nome']) && !empty($_POST['data_validade']) && !empty($_POST['valor']) && !empty($_POST['Quantidade'])) {
        $total = $item->insert();
        header('location:../itemADM.php?cod=170');
    } else {
        header('location:../itemADM.php?cod=173');
    }
    if (isset($_POST['id'])) {
        $item->setId($_POST['id']);
        $item->setData_validade($_POST['data_validade']);
        @$item->setReutilizavel($_POST['reutilizavel']);
        $item->setValor($_POST['valor']);
        $item->setQuantidade($_POST['Quantidade']);
        $item->update();
    }
} else {
    header('location:../index.php');
}
