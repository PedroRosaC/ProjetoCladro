<?php
require_once 'conexaoMysql.php';
class itemModel {
    protected $id;
    protected $nome;
    protected $data_validade;
    protected $reutilizavel;
    protected $valor;
    protected $estoque_id;
    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getData_validade() {
        return $this->data_validade;
    }
    public function getReutilizavel() {
        return $this->reutilizavel;
    }
    public function getValor() {
        return $this->valor;
    }
    public function getEstoque_id() {
        return $this->estoque_id;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setNome($nome): void {
        $this->nome = $nome;
    }
    public function setData_validade($data_validade): void {
        $this->data_validade = $data_validade;
    }
    public function setReutilizavel($reutilizavel): void {
        $this->reutilizavel = $reutilizavel;
    }
    public function setValor($valor): void {
        $this->valor = $valor;
    }
    public function setEstoque_id($estoque_id): void {
        $this->estoque_id = $estoque_id;
    }
}