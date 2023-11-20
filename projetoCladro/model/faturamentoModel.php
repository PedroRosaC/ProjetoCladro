<?php
require_once 'conexaoMysql.php';
class faturamentoModel{
    protected $id;
    protected $valor_total;
    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }
    public function getValor_total() {
        return $this->valor_total;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setValor_total($valor_total): void {
        $this->valor_total = $valor_total;
    }
}