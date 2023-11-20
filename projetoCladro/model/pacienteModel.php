<?php

require_once 'conexaoMysql.php';

class pacienteModel {

    protected $id;
    protected $email;
    protected $nome;
    protected $senha;
    protected $endereco;
    protected $idade;
    protected $data_nasc;
    protected $rg;
    protected $cpf;
    public function getId() {
        return $this->id;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function getIdade() {
        return $this->idade;
    }
    public function getData_nasc() {
        return $this->data_nasc;
    }
    public function getRg() {
        return $this->rg;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setEmail($email): void {
        $this->email = $email;
    }
    public function setNome($nome): void {
        $this->nome = $nome;
    }
    public function setSenha($senha): void {
        $this->senha = $senha;
    }
    public function setEndereco($endereco): void {
        $this->endereco = $endereco;
    }
    public function setIdade($idade): void {
        $this->idade = $idade;
    }
    public function setData_nasc($data_nasc): void {
        $this->data_nasc = $data_nasc;
    }
    public function setRg($rg): void {
        $this->rg = $rg;
    }
    public function setCpf($cpf): void {
        $this->cpf = $cpf;
    }
    public function __construct() {
        
    }
    public function Autenticar($email, $senha) {
        $sql = 'SELECT * FROM paciente where email = "' . $email . '" and senha = "' . md5($senha) . '" ';
        $db = new ConexaoMysql();
        $db->Conectar();
        $resultList = $db->Consultar($sql);
        $total =$db->total;
        if ($total==1) {
            foreach ($resultList as $data) {
                $this->id = $data['id'];
                $this->email = $data['email'];
            }
            @session_start();
            $_SESSION['user'] = 'pct';
            $_SESSION['id'] = $this->id;
            $_SESSION['login'] = $this->email;
            header('location:../index.php');
        } else {
            header('location:../login.php?cod=171');
        }
        $db->Desconectar();
        return $resultList;
    }
    public function loadById($id) {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $sql = 'SELECT * FROM paciente where id =' . $id;
        //Executar método de consulta
        $resultList = $db->Consultar($sql);
        //Verifica se retornou um registro da base de dados
        if ($db->total == 1) {
            //Se retornou preenche as propriedades de raça
            foreach ($resultList as $value) {
                $this->id = $value['id'];
                $this->email = $value['email'];
                $this->nome = $value['nome'];
                $this->senha = $value['senha'];
                $this->endereco = $value['endereco'];
                $this->idade = $value['idade'];
                $this->data_nasc = $value['data_nasc'];
                $this->rg = $value['rg'];
                $this->cpf = $value['cpf'];
            }
        }
        //Desconectar do banco
        $db->Desconectar();
        return $resultList;
    }
    public function insert() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        $this-> senha = md5($this->senha);
        $sql = 'INSERT INTO paciente values'
                . '(0,"' . $this->email . '",'
                . '"' . $this->nome . '",'
                . '"' . $this->senha . '",'
                . '"' . $this->endereco . '",'
                . '"' . $this->idade . '",'
                . '"' . $this->data_nasc . '",'
                . '"' . $this->rg . '",'
                . '"' . $this->cpf . '")';
        //Executar método de inserção
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }
    public function update() {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        $sql = 'UPDATE paciente SET '
                . 'email="' . $this->email . '",'
                . 'nome="' . $this->nome . '",'
                . 'senha="' .  md5($this->senha) . '",'
                . 'endereco="' . $this->endereco . '",'
                . 'idade="' . $this->idade . '",'
                . 'data_nasc="' . $this->data_nasc . '",'
                . 'rg="' . $this->rg . '",'
                . 'cpf ="' . $this->cpf . '"'
                . 'WHERE id = ' . $this->id;
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
