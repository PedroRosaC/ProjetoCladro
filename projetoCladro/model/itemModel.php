<?php

require_once 'conexaoMysql.php';

class itemModel {

    protected $id;
    protected $nome;
    protected $data_validade;
    protected $reutilizavel;
    protected $valor;
    protected $Quantidade;

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

    public function getQuantidade() {
        return $this->Quantidade;
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

    public function setQuantidade($Quantidade): void {
        $this->Quantidade = $Quantidade;
    }

    public function update() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        $sql = 'UPDATE item SET '
                . 'nome="' . $this->nome . '",'
                . 'data_validade="' . $this->data_validade . '",'
                . 'reutilizavel="' . $this->reutilizavel . '",'
                . 'valor="' . $this->valor . '",'
                . 'Quantidade="' . $this->Quantidade . '",'
                . 'WHERE id = ' . $this->id;
        echo $sql;
        //header('location:../itemADM.php?cod=170');
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }

    public function insert() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'INSERT INTO item values'
                . '(0,"' . $this->nome . '",'
                . '"' . $this->data_validade . '",'
                . '"' . $this->reutilizavel . '",'
                . '"' . $this->valor . '",'
                . '"' . $this->Quantidade . '")';
        //Executar método de inserção
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }

    public function loadItem() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'SELECT * FROM item';
        //Executar método de consulta
        $resultList = $db->Consultar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $resultList;
    }

    public function loadByIdItem($id) {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'SELECT * FROM item WHERE id=' . $id;
        //Executar método de consulta
        $resultList = $db->Consultar($sql);
        if ($db->total == 1) {
            foreach ($resultList as $value) {
                $this->id = $value['id'];
                $this->nome = $value['nome'];
                $this->data_validade = $value['data_validade'];
                $this->reutilizavel = $value['reutilizavel'];
                $this->valor = $value['valor'];
                $this->Quantidade = $value['Quantidade'];
            }
        }
        //Desconectar do banco
        $db->Desconectar();
        return $this;
    }

}
