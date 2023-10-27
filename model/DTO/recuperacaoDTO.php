<?php

class recuperacaoDTO{

    private $id_usuario;
    private $chave;

    public function __construct($id_usuario,$chave){
        $this->id_usuario = $id_usuario;
        $this->chave = $chave;
    }

    //GETTERS
    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function getChave(){
        return $this->chave;
    }

    //SETTERS
    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    
    public function setChave($chave){
        $this->chave = $chave;
    }
}

?>