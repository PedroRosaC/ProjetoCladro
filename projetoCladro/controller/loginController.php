<?php
require_once '../model/pacienteModel.php';


if ($_POST) {
    //@$lembrar = $_POST['lembrar'];
    $paciente = new pacienteModel();
    $paciente->Autenticar();
} 
else {
    header('location:../index.php');
}
?>
