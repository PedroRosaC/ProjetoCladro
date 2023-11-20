<?php
require_once 'conexaoMysql.php';
class consultaModel {
    protected $id;
    protected $data;
    protected $hora;
    protected $servico;
    protected $valor;
    protected $paciente_nome;
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
    public function getValor() {
        return $this->valor;
    }
    public function getPaciente_nome() {
        return $this->paciente_;
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
    public function setValor($valor): void {
        $this->valor = $valor;
    }
    public function setPaciente_nome($paciente_nome): void {
        $this->paciente_nome = $paciente_nome;
    }
        public function insert() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'INSERT INTO consulta values'
                . '(0,"' . $this->data. '",'
                . '"' . $this->hora . '",'
                . '"' . $this->servico . '",'
                . '"' . $this->valor . '",'
                . '"' . $this->paciente_nome .'")';
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
