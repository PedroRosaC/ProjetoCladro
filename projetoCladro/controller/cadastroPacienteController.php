<?php

if ($_POST) {
    require_once '../model/pacienteModel.php';
    $paciente = new pacienteModel();
    $paciente->setEmail($_POST['email']);
    $paciente->setNome($_POST['nome']);
    $paciente->setSenha($_POST['senha']);
    $paciente->setEndereco($_POST['endereco']);
    $paciente->setIdade($_POST['idade']);
    $paciente->setData_nasc($_POST['data_nasc']);
    $paciente->setRg($_POST['rg']);
    $paciente->setCpf($_POST['cpf']);
    if (!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['endereco']) && !empty($_POST['idade']) && !empty($_POST['data_nasc']) && !empty($_POST['rg']) && !empty($_POST['cpf'])) {
        $total = $paciente->insert();
        header('location:../cadastroADM.php?cod=170');
    } else {
        header('location:../cadastroADM.php?cod=173');
    }
} else {
    header('location:../index.php');
}