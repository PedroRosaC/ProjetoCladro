<?php
require_once 'conexaoMysql.php';
class sociaModel {

    protected $id;
    protected $email;
    protected $nome;
    protected $senha;
    protected $disponibilidade;
    protected $servicos;

    public function __construct() {
        
    }
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
    public function getDisponibilidade() {
        return $this->disponibilidade;
    }
    public function getServicos() {
        return $this->servicos;
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
    public function setDisponibilidade($disponibilidade): void {
        $this->disponibilidade = $disponibilidade;
    }
    public function setServicos($servicos): void {
        $this->servicos = $servicos;
    }
    public function Autenticar($email, $senha) {
        $sql = 'SELECT * FROM socia where email = "' . $email . '" and senha = "' . $senha . '" ';
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
            $_SESSION['user'] = 'socia';
            $_SESSION['ADM'] = $this->id;
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
        $sql = 'SELECT * FROM socia where id =' . $id;
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
                $this->disponibilidade = $value['disponibilidade'];
                $this->servicos = $value['servicos'];
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
        $sql = 'INSERT INTO socia values'
                . '(0,"' . $this->email . '",'
                . '"' . $this->nome . '",'
                . '"' . $this->senha . '",'
                . '"' . $this->disponibilidade . '",'
                . '"' . $this->servicos . '")';
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
        $sql = 'UPDATE socia SET '
                . 'email="' . $this->email . '",'
                . 'nome="' . $this->nome . '",'
                . 'senha="' .  md5($this->senha) . '",'
                . 'endereco="' . $this->disponibilidade . '",'
                . 'idade="' . $this->servicos . '",'
                . 'WHERE id = ' . $this->id;
        //Executar método de inserção
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }
}
