<?php
require_once 'conexaoMysql.php';
class despesasmodel {
    protected $id;
    protected $valor_despesa;
    protected $item_id;
    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }
    public function getValor_despesa() {
        return $this->valor_despesa;
    }
    public function getItem_id() {
        return $this->item_id;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setValor_despesa($valor_despesa): void {
        $this->valor_despesa = $valor_despesa;
    }
    public function setItem_id($item_id): void {
        $this->item_id = $item_id;
    }
}

