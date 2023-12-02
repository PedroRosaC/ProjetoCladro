<?php

require_once 'conexaoMysql.php';

class consultaModel {

    protected $id;
    protected $data;
    protected $hora;
    protected $servico;
    protected $valor;
    protected $estoque;
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

    public function getEstoque() {
        return $this->estoque;
    }

    public function getPaciente_nome() {
        return $this->paciente_nome;
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

    public function setEstoque($estoque): void {
        $this->estoque = $estoque;
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
                . '(0,"' . $this->data . '",'
                . '"' . $this->hora . '",'
                . '"' . $this->servico . '",'
                . '"' . $this->valor . '",'
                . '"' . $this->estoque . '",'
                . '"' . $this->paciente_nome . '")';
        //Executar método de inserção
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }

    public function loadById($id) {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'SELECT * FROM consulta where id =' . $id;
        //Executar método de consulta
        $resultList = $db->Consultar($sql);
        //Verifica se retornou um registro da base de dados
        if ($db->total == 1) {
            //Se retornou preenche as propriedades de raça
            foreach ($resultList as $value) {
                $this->id = $value['id'];
                $this->data = $value['data'];
                $this->hora = $value['hora'];
                $this->servico = $value['servico'];
                $this->valor = $value['valor'];
                $this->estoque = $value['estoque'];
                $this->paciente_nome = $value['paciente_nome'];
            }
        }
        //Desconectar do banco
        $db->Desconectar();
        return $resultList;
    }

}
