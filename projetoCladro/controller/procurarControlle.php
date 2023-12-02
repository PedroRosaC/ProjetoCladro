<?php
function loadAll0() {
    require_once './model/solicitarConsultaModel.php';
    $solicitar = new solicitarConsultaModel();
    $solicitarlist = $solicitar->loadAll0();
    return $solicitarlist;
}
function loadAll1S() {
    require_once './model/solicitarConsultaModel.php';
    $solicitar = new solicitarConsultaModel();
    $solicitarList = $solicitar->loadAll1S();
    return $solicitarList;
}
function loadAll1A() {
    require_once './model/solicitarConsultaModel.php';
    $solicitar = new solicitarConsultaModel();
    $solicitarList = $solicitar->loadAll1A();
    return $solicitarList;
}
