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
function loadGanhos() {
    require_once './model/ganhosModel.php';
    $ganhos = new ganhosModel();
    $ganhosList = $ganhos->loadGanhos();
    return $ganhosList;
}
function loadDespesas() {
    require_once './model/despesasModel.php';
    $despesas = new despesasModel();
    $despesasList = $despesas->loadDespesas();
    return $despesasList;
}
function loadItem() {
    require_once './model/itemModel.php';
    $item = new itemModel();
    $itemList = $item->loadItem();
    return $itemList;
}
function loadByIdItem($id) {
   require_once './model/itemModel.php';
    $item = new itemModel();
    $item->loadByIdItem($id);
    return $item;
}
function loadFaturamento() {
    require_once './model/faturamentoModel.php';
    $faturamento = new faturamentoModel();
    $faturamentoList = $faturamento->loadFaturamento();
    return $faturamentoList;
}