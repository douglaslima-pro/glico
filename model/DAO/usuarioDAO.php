<?php

require_once "DB/conn.php";

class usuarioDAO{

    private static $conn;

    public function __construct(){
        self::$conn = conexaoBD::criarConexao();
    }

    public function cadastrarUsuario($usuarioDTO){
        try{
            $sql = "INSERT INTO usuario(nome,usuario,email,senha,data_nascimento,cpf) VALUES(?,?,?,?,NULLIF(?,''),NULLIF(?,''))";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$usuarioDTO->getNome());
            $stmt->bindValue(2,$usuarioDTO->getUsuario());
            $stmt->bindValue(3,$usuarioDTO->getEmail());
            $stmt->bindValue(4,$usuarioDTO->getSenha());
            $stmt->bindValue(5,$usuarioDTO->getData_nascimento());
            $stmt->bindValue(6,$usuarioDTO->getCpf());
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function realizarLogin($usuarioDTO){
        try{
            $sql = "SELECT u.*,d.*
                    FROM usuario u
                    INNER JOIN diabetes d ON
                    u.id_usuario = d.id_usuario
                    WHERE u.email = ? OR u.usuario = ? AND u.situacao = 1";
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

    public function pesquisarUsuarioPeloEmailUsuario($emailusuario){
        try{
            $sql = "SELECT * FROM usuario WHERE email =? OR usuario = ?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$emailusuario);
            $stmt->bindValue(2,$emailusuario);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //Verifica se o e-mail que o usuário inseriu existe e se existir retorna true
    public function emailExiste($email){
        try{
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":email",$email);
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
            $sql = "SELECT * FROM usuario WHERE usuario = :usuario";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":usuario",$usuario);
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

    public function alterarSenha($id_usuario,$senha){
        try{
            $sql = "UPDATE usuario SET senha = :senha
                    WHERE id_usuario = :id_usuario";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":id_usuario",$id_usuario);
            $stmt->bindParam(":senha",$senha);
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function pesquisarUsuario($id_usuario){
        try{
            $sql = "SELECT u.*,d.*
                    FROM usuario u
                    INNER JOIN diabetes d ON
                    u.id_usuario = d.id_usuario
                    WHERE u.id_usuario = :id_usuario";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":id_usuario",$id_usuario);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function alterarDadosDeAcesso($usuarioDTO){
        try{
            $sql = "UPDATE usuario
                    SET email=?,usuario=?
                    WHERE id_usuario=?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$usuarioDTO->getEmail());
            $stmt->bindValue(2,$usuarioDTO->getUsuario());
            $stmt->bindValue(3,$usuarioDTO->getId_usuario());
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function alterarDadosPessoais($usuarioDTO){
        try{
            $sql = "UPDATE usuario
                    SET nome=?,cpf=NULLIF(?,''),data_nascimento=NULLIF(?,''),sexo=NULLIF(?,''),peso=NULLIF(?,''),altura=NULLIF(?,'')
                    WHERE id_usuario=?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$usuarioDTO->getNome());
            $stmt->bindValue(2,$usuarioDTO->getCpf());
            $stmt->bindValue(3,$usuarioDTO->getData_nascimento());
            $stmt->bindValue(4,$usuarioDTO->getSexo());
            $stmt->bindValue(5,$usuarioDTO->getPeso());
            $stmt->bindValue(6,$usuarioDTO->getAltura());
            $stmt->bindValue(7,$usuarioDTO->getId_usuario());
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}
?>