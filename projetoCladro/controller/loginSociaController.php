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
        $socia->setEndereco($disponibilidade);
        $socia->setIdade($servico);
        $socia->update();
    } else {
    $socia->Autenticar($email,$senha); //retorna 0 ou 1  
    }
} else if ($_REQUEST) {
    if (isset($_REQUEST)) {
        require_once './model/sociaModel.php';
        @$id = $_REQUEST['id'];
        $socia = new pacienteModel();
        $socia ->loadById($id);
    }
}
function loadById($id) {
    //Importo raças model
    require_once './model/';
    //Crio um objeto do tipo raças
    $paciente = new pacienteModel();
    //Executa o método para carregar por id
    $paciente->loadById($id);
    return $paciente;
}
?>