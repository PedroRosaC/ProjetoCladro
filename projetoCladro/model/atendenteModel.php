<?php
class atendenteModel
{
    protected $id;
    protected $funcao;
    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFuncao()
    {
        return $this->funcao;
    }

    

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setFuncao($funcao): void
    {
        $this->funcao = $funcao;
    }

    
}
