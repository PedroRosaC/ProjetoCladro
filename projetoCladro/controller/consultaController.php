<?php
if ($_POST) {
    require_once '../model/consultaModel.php';
    $consulta = new consultaModel();
    $consulta->setData($_POST['data']);
    $consulta->setHora($_POST['hora']);
    $consulta->setServico($_POST['servico']);
    $consulta->setValor($_POST['valor']);
    $consulta->setPaciente_nome($_POST['nome']);
    $consulta->setEstoque($_POST['estoque']);
    if (!empty($_POST['data']) && !empty($_POST['hora']) && !empty($_POST['servico']) && !empty($_POST['valor']) && !empty($_POST['nome'])) {
        $total = $consulta->insert();
        require_once '../model/ganhosModel.php';
        $ganhos = new ganhosModel();
        $ganhos->setValor($_POST['valor']);
        $ganhos->setConsulta_valor($_POST['valor']);
        $ganhos-> insertganhoconsulta();
       header('location:../consultaADM.php?cod=170');
    } else {
        header('location:../consultaADM.php?cod=173');
    }
} else {
    header('location:../index.php');
}