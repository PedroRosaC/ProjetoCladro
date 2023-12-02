<?php

require_once 'conexaoMysql.php';

class solicitarConsultaModel {

    protected $id;
    protected $data;
    protected $hora;
    protected $servico;
    protected $paciente_id;
    protected $data_aprov;
    protected $situacao;
    protected $socia_id;
    protected $atendente_id;

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

    public function getData_aprov() {
        return $this->data_aprov;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getSocia_id() {
        return $this->socia_id;
    }

    public function getAtendente_id() {
        return $this->atendente_id;
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

    public function setData_aprov($data_aprov): void {
        $this->data_aprov = $data_aprov;
    }

    public function setSituacao($situacao): void {
        $this->situacao = $situacao;
    }

    public function setSocia_id($socia_id): void {
        $this->socia_id = $socia_id;
    }

    public function setAtendente_id($atendente_id): void {
        $this->atendente_id = $atendente_id;
    }

    public function insert() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $this->situacao = 0;
        $sql = 'INSERT INTO solicitarconsulta (id,paciente_id,data,hora,servico,situacao)values'
                . '(0,"' . $this->paciente_id . '",'
                . '"' . $this->data . '",'
                . '"' . $this->hora . '",'
                . '"' . $this->servico . '",'
                . '' . $this->situacao . ')';
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

    public function loadAll0() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'SELECT sc.id, p.nome,sc.data, sc.hora, sc. servico FROM epitelis.solicitarconsulta sc
                inner join epitelis.paciente p on sc.paciente_id = p.id where situacao = 0';
        //Executar método de consulta
        $resultList = $db->Consultar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $resultList;
    }

    public function aprovar() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        if (isset($this->atendente_id)) {
            @$this->socia_id = 'null';
        }
        else if (isset($this->socia_id)) {
            @$this->atendente_id = 'null';
        }
        $sql = 'UPDATE solicitarconsulta SET '
                . 'data_aprov = "' . $this->data_aprov . '" ,'
                . 'situacao = 1, '
                 . 'socia_id = ' . $this->socia_id . ', '
                . 'atendente_id = ' . $this->atendente_id . ''
                . ' WHERE id = ' . $this->id;
        //Executar método de consulta1
        echo $sql;
        $db->Executar($sql);
        $db->Desconectar();
        return $db->total;
    }

    public function loadAll1S() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'SELECT sc.id, p.nome,sc.data, sc.hora, sc.servico,s.nome,sc.data_aprov FROM epitelis.solicitarconsulta sc
                inner join epitelis.paciente p on sc.paciente_id = p.id
                inner join epitelis.socia s on sc.socia_id = s.id
                where situacao = 1';
        //Executar método de consulta
        $resultList = $db->Consultar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $resultList;
    }

    public function loadAll1A() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'SELECT sc.id, p.nome,sc.data, sc.hora, sc.servico, a.nome, sc.data_aprov FROM epitelis.solicitarconsulta sc
                inner join epitelis.paciente p on sc.paciente_id = p.id
                inner join epitelis.atendente a on sc.atendente_id = a.id
                where situacao = 1';
        //Executar método de consulta
        $resultList = $db->Consultar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $resultList;
    }

}
