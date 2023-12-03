<?php

if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    @$nome = $_POST['nome'];
    @$endereco = $_POST['endereco'];
    @$idade = $_POST['idade'];
    @$data_nasc = $_POST['data_nasc'];
    @$rg = $_POST['rg'];
    @$cpf = $_POST['cpf'];
    require_once '../model/pacienteModel.php';
    $paciente = new pacienteModel();
    if (isset($_POST['id'])) {
        $paciente->setId($_POST['id']);
        $paciente->setEmail($email);
        $paciente->setNome($nome);
        $paciente->setSenha($senha);
        $paciente->setEndereco($endereco);
        $paciente->setIdade($idade);
        $paciente->setData_nasc($data_nasc);
        $paciente->setRg($rg);
        $paciente->setCpf($cpf);
        $paciente->update();
    } else {
        $paciente->Autenticar($email, $senha);
    }
} else if ($_REQUEST) {
    if (isset($_REQUEST)) {
        require_once './model/pacienteModel.php';
        @$id = $_REQUEST['id'];
        $paciente = new pacienteModel();
        $paciente->loadById($id);
    }
}

function loadById($id) {
    require_once './model/pacienteModel.php';
    $paciente = new pacienteModel();
    $paciente->loadById($id);
    return $paciente;
}

?>