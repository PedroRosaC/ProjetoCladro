<?php
require_once 'conexaoMysql.php';
class despesasModel {
    protected $id;
    protected $valor_despesa;
    protected $descricao;
    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }
    public function getValor_despesa() {
        return $this->valor_despesa;
    }
    public function getDescricao() {
        return $this->item_id;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setValor_despesa($valor_despesa): void {
        $this->valor_despesa = $valor_despesa;
    }
    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }
    public function insert() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'INSERT INTO despesas values'
                . '(0,"' . $this->valor_despesa . '",'
                . '"' . $this->descricao . '")';
        //Executar método de inserção
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }
    public function loadDespesas() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'SELECT valor_despesa FROM despesas';
        //Executar método de consulta
        $resultList = $db->Consultar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $resultList;
    }

    }

