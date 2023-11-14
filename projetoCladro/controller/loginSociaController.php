<?php
if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    @$nome = $_POST['nome'];
    @$disponibilidade =$_POST['disponibilidade'];
    @$servico =$_POST['servico'];
    require_once '../model/sociaModel.php';
    $socia = new sociaModel();
    if(isset($_POST['id'])){
        $socia->setId($_POST['id']);
        $socia->setEmail($email);
        $socia->setNome($nome);
        $socia->setSenha($senha);
        $socia->setDisponibilidade($disponibilidade);
        $socia->setServicos($servico);
        $socia->update();
    } else {
    $socia->Autenticar($email,$senha); //retorna 0 ou 1  
    }
} else if ($_REQUEST) {
    if (isset($_REQUEST)) {
        require_once './model/sociaModel.php';
        @$id = $_REQUEST['id'];
        $socia = new sociaModel();
        $socia ->loadById($id);
    }
}
function loadById($id) {
    require_once './model/sociaModel.php';
    $paciente = new pacienteModel();
    $paciente->loadById($id);
    return $paciente;
}
?>