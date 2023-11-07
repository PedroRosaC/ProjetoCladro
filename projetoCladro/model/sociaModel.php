<?php

class sociaModel
{
    protected $id;
    protected $disponibilidade;
    protected $servicos;
    public function __construct()
    {
    }
    public function getId()
    {
        return $this->id;
    }

    public function getDisponibilidade()
    {
        return $this->disponibilidade;
    }

    public function getServicos()
    {
        return $this->servicos;
    }

    
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setDisponibilidade($disponibilidade): void
    {
        $this->disponibilidade = $disponibilidade;
    }

    public function setServicos($servicos): void
    {
        $this->servicos = $servicos;
    }
}
