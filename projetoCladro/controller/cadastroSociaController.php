<?php

if ($_POST) {
    require_once '../model/sociaModel.php';
    $socia = new sociaModel();
    $socia->setEmail($_POST['email']);
    $socia->setNome($_POST['nome']);
    $socia->setSenha($_POST['senha']);
    $socia->setDisponibilidade($_POST['disponibilidade']);
    $socia->setServicos($_POST['servicos']);
    if (!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['disponibilidade']) && !empty($_POST['servicos'])) {
        $total = $socia->insert();
        header('location:../cadastro.php?cod=172');
    } else {
        header('location:../cadastro.php?cod=170');
    }
} else {
    header('location:../index.php');
}