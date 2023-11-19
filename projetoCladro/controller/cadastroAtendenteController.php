<?php

if ($_POST) {
    require_once '../model/atendenteModel.php';
    $atendente = new atendenteModel();
    $atendente->setEmail($_POST['email']);
    $atendente->setNome($_POST['nome']);
    $atendente->setSenha($_POST['senha']);
    $atendente->setFuncao($_POST['funcao']);
    if (!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['funcao'])) {
        $total = $atendente->insert();
        header('location:../cadastro.php?cod=172');
    } else {
        header('location:../cadastro.php?cod=170');
    }
} else {
    header('location:../index.php');
} 