<?php

require_once 'conexaoMysql.php';

class faturamentoModel {

    protected $id;
    protected $valor_total;
    protected $ganhos_id;
    protected $despesas_id;

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getValor_total() {
        return $this->valor_total;
    }

    public function getGanhos_id() {
        return $this->ganhos_id;
    }

    public function getDespesas_id() {
        return $this->despesas_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setValor_total($valor_total): void {
        $this->valor_total = $valor_total;
    }

    public function setGanhos_id($ganhos_id): void {
        $this->ganhos_id = $ganhos_id;
    }

    public function setDespesas_id($despesas_id): void {
        $this->despesas_id = $despesas_id;
    }

    public function loadFaturamento() {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT valor_total FROM faturamento';
        $resultList = $db->Consultar($sql);
        $db->Desconectar();
        return $resultList;
    }

    public function calcular($valor, $valor_d) {
        $db = new ConexaoMysql();
        $db->Conectar();
        $db0 = new ConexaoMysql();
        $db0->Conectar();
        $this->valor_total = $valor - $valor_d;
        $sql0= 'delete from faturamento where id';
        $sql = 'INSERT INTO faturamento values'
                . '(0,"' . $this->valor_total . '")';
        $db0->Executar($sql0);
        $db->Executar($sql);
        $db->Desconectar();
        return $db->total;
    }

}
