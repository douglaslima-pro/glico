<?php

class glicoseDTO{
    
    private $id_glicose;
    private $id_usuario;
    private $valor;
    private $data;
    private $hora;
    private $condicao;
    private $comentario;

    public function __construct($valor,$data,$hora,$id_usuario){
        $this->valor = $valor;
        $this->data = $data;
        $this->hora = $hora;
        $this->id_usuario = $id_usuario;
    }

    //GETTERS
    public function getId_glicose()
    {
        return $this->id_glicose;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function getCondicao()
    {
        return $this->condicao;
    }

    public function getComentario()
    {
        return $this->comentario;
    }
    
    //SETTERS
    public function setId_glicose($id_glicose)
    {
        $this->id_glicose = $id_glicose;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function setCondicao($condicao)
    {
        $this->condicao = $condicao;
    }

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }
}

?>