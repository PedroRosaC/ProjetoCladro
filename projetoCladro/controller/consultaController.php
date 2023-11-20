<?php
if ($_POST) {
    require_once '../model/consultaModel.php';
    $consulta = new consultaModel();
    $consulta->setData($_POST['data']);
    $consulta->setHora($_POST['hora']);
    $consulta->setServico($_POST['servico']);
    $consulta->setValor($_POST['valor']);
    $consulta->setPaciente_nome($_POST['nome']);
    if (!empty($_POST['data']) && !empty($_POST['hora']) && !empty($_POST['servico']) && !empty($_POST['valor']) && !empty($_POST['nome'])) {
        $total = $consulta->insert();
       header('location:../consultaADM.php?cod=172');
    } else {
        header('location:../consultaADM.php?cod=170');
    }
} else {
    header('location:../index.php');
}