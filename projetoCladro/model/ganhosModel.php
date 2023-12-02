<?php

require_once 'conexaoMysql.php';

class ganhosModel {

    protected $id;
    protected $valor;
    protected $consulta_valor;
    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }
    public function getValor() {
        return $this->valor;
    }
    public function getConsulta_valor() {
        return $this->consulta_valor;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setValor($valor): void {
        $this->valor = $valor;
    }
    public function setConsulta_valor($consulta_valor): void {
        $this->consulta_valor = $consulta_valor;
    }
    public function insertganhoconsulta() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'INSERT INTO ganhos values'
                . '(0,"' . $this->valor . '",'
                . '"' . $this->consulta_valor . '")';
        //Executar método de inserção
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }
    
}
