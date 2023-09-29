<?php

require_once "DB/conexãoBD.php";

class usuarioDAO{

    private static $conn;

    public function __construct(){
        self::$conn = conexaoBD::criarConexao();
    }

    public function cadastrarUsuario($usuarioDTO){
        try{
            $sql = "INSERT INTO usuario(nome,usuario,email,senha,data_nascimento,data_cadastro,cpf) VALUES(?,?,?,?,?,?,?)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$usuarioDTO->getNome());
            $stmt->bindValue(2,$usuarioDTO->getUsuario());
            $stmt->bindValue(3,$usuarioDTO->getEmail());
            $stmt->bindValue(4,$usuarioDTO->getSenha());
            $stmt->bindValue(5,$usuarioDTO->getData_nascimento());
            $stmt->bindValue(6,$usuarioDTO->getData_cadastro());
            $stmt->bindValue(7,$usuarioDTO->getCpf());
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function realizarLogin($usuarioDTO){
        try{
            $sql = "SELECT * FROM usuario WHERE email = ? OR usuario = ? AND situacao = 1";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$usuarioDTO->getEmail());
            $stmt->bindValue(2,$usuarioDTO->getUsuario());
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            //VALIDA A SENHA COMPARANDO COM O HASH DO BANCO
            if(password_verify($usuarioDTO->getSenha(),$retorno["senha"])){
                return $retorno;
            }else{
                unset($retorno);
                return NULL;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //Verifica se o e-mail que o usuário inseriu existe e se existir retorna true
    public function emailExiste($email){
        try{
            $sql = "SELECT * FROM usuario WHERE email = ?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$email);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            if($retorno == NULL || empty($retorno) || $retorno == 0){
                return false;
            }else{
                return true;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function usuarioExiste($usuario){
        try{
            $sql = "SELECT * FROM usuario WHERE usuario = ?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$usuario);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            if($retorno == NULL || empty($retorno) || $retorno == 0){
                return false;
            }else{
                return true;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}
?>