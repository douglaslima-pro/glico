<?php

class conexaoBD{
    
    //variável que armazena a conexão do BD (instância de BD)
    private static $instance;

    //método estático que conecta o PHP com o MySQL
    public static function criarConexao(){
        try{

            //Cria um objeto PDO
            self::$instance = new PDO("mysql:host=localhost;dbname=glico","root","");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return self::$instance;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>