<?php

if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    @$nome = $_POST['nome'];
    @$funcao= $_POST['funcao'];
    require_once '../model/atendenteModel.php';
    $atendente = new atendenteModel();
    if (isset($_POST['id'])) {
        $atendente->setId($_POST['id']);
        $atendente->setEmail($email);
        $atendente->setNome($nome);
        $atendente->setSenha($senha);
        $atendente->setFuncao($funcao);
        $atendente->update();
    } else {
        $atendente->Autenticar($email, $senha);
    }
} else if ($_REQUEST) {
    if (isset($_REQUEST)) {
        require_once './model/atendenteModel.php';
        @$id = $_REQUEST['id'];
        $atendente = new atendenteModel();
        $socia->loadById($id);
    }
}

function loadById($id) {
    require_once './model/atendenteModel.php';
    $paciente = new pacienteModel();
    $paciente->loadById($id);
    return $paciente;
}

?>