<?php
require_once '../model/pacienteModel.php';
if ($_POST) {
    $paciente = new pacienteModel;
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $idade = $_POST['idade'];
    $data_nasc = $_POST['data_nasc'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];


     if (
        !empty($_POST['email']) && !empty($_POST['nome']) &&
        !empty($_POST['senha']) && !empty($_POST['endereco']) &&
        !empty($_POST['idade']) && !empty($_POST['data_nasc']) && 
        !empty($_POST['rg']) && !empty($_POST['cpf'])
    ) {

        $paciente->insert();
        echo $email;
        }
    
}
