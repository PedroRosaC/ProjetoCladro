<?php

require_once 'conexaoMysql.php';

class solicitarConsultaModel {

    protected $id;
    protected $data;
    protected $hora;
    protected $servico;
    protected $paciente_id;

    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }
    public function getData() {
        return $this->data;
    }
    public function getHora() {
        return $this->hora;
    }
    public function getServico() {
        return $this->servico;
    }
    public function getPaciente_id() {
        return $this->paciente_id;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setData($data): void {
        $this->data = $data;
    }
    public function setHora($hora): void {
        $this->hora = $hora;
    }
    public function setServico($servico): void {
        $this->servico = $servico;
    }
    public function setPaciente_id($paciente_id): void {
        $this->paciente_id = $paciente_id;
    }
    public function insert() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        @session_start();
        $this->paciente_id = $_SESSION['id'];
        $sql = 'INSERT INTO consulta values'
                . '(0,"' . $this->data . '",'
                . '"' . $this->hora . '",'
                . '"' . $this->servico . '",'
                . '"' . $this->paciente_id . '")';
        //Executar método de inserção
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }
    public function delete() {
//Criar um objeto de conexão
        $db = new ConexaoMysql();
//Abrir conexão com banco de dados
        $db->Conectar();
        $sql = 'DELETE FROM paciente WHERE id=' . $this->id;
//Executar método de inserção
        $db->Executar($sql);
//Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }

}
