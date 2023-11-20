<?php
require_once 'conexaoMysql.php';
class ganhosModel {
    protected $id;
    protected $valor;
    protected $consulta_id;
    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }
    public function getValor() {
        return $this->valor;
    }
    public function getConsulta_id() {
        return $this->consulta_id;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setValor($valor): void {
        $this->valor = $valor;
    }
    public function setConsulta_id($consulta_id): void {
        $this->consulta_id = $consulta_id;
    }
    }
