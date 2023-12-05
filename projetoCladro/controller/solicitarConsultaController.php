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
       header('location:../solicitarConsulta.php?cod=170');
    } else {
        header('location:../solicitarConsulta.php?cod=173');
    }
} 
if ($_REQUEST) {
    if (isset($_REQUEST['cod']) && $_REQUEST['cod'] == 'aprov') {
        require_once '../model/solicitarConsultaModel.php';
        //Cria o objeto racas
        $solicitar = new solicitarConsultaModel();
        //Se o comando for par excluir
        if (isset($_REQUEST['id'])) {
            //configuro o id
            
            session_start();
            if ($_SESSION['user'] == 'socia') {
                require_once '../model/sociaModel.php';
                @$socia_id = $_SESSION['ADM'];
            }
            if ($_SESSION['user'] == 'atendente') {
                require_once '../model/atendenteModel.php';
                @$atendente_id = $_SESSION['ADM'];
                
            }
            $solicitar->setId($_REQUEST['id']);
            $solicitar->setData_aprov($_REQUEST['data_aprov']);
            @$solicitar->setSocia_id($socia_id);
            @$solicitar->setAtendente_id($atendente_id);
            //exclui em seguida
            $total = $solicitar->aprovar();
            if ($total == 1) {
                header('location:../solicitarConsulta.php?cod=170');
            } else {
                header('location:../solicitarConsulta.php?cod=171');
            }
        }
    }
}

