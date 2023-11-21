<?php

if ($_POST) {
    require_once '../model/solicitarConsultaModel.php';

    $consulta = new solicitarConsultaModel();
    $consulta->setData($_POST['data']);
    $consulta->setHora($_POST['hora']);
    $consulta->setServico($_POST['servico']);
    $consulta->setPaciente_id($_POST['paciente_id']);
    if (!empty($_POST['data']) && !empty($_POST['hora']) && !empty($_POST['servico'])) {
        $total = $consulta->insert();
        header('location:../solicitaRConsulta.php?cod=172');
    } else {
        header('location:../solicitarConsulta.php?cod=170');
    }
} else {
    header('location:../index.php');
}