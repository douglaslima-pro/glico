<?php

class usuarioDTO{

    private $idusuario;
    private $nome;
    private $usuario;
    private $email;
    private $senha;
    private $sexo;
    private $peso;
    private $altura;
    private $data_nascimento;
    private $data_cadastro;
    private $perfil;
    private $situacao;
    private $foto;
    private $cpf;

    public function __construct($nome,$usuario,$email,$senha){
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->email = $email;
        $this->senha = $senha;
    }

    //GETTERS
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getPeso()
    {
        return $this->peso;
    }
 
    public function getAltura()
    {
        return $this->altura;
    }

    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }

    public function getData_cadastro()
    {
        return $this->data_cadastro;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    //SETTERS
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    public function setData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function setData_cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
}

?>