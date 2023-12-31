<?php

class conexaoBD{
    
    //variável que armazena a conexão do BD (instância de BD)
    private static $instance;

    //método estático que conecta o PHP com o MySQL
    public static function criarConexao(){
        try{

            //Cria um objeto PDO
            //Pode ser necessário passar a PORTA como parâmetro, caso contrário dá erro de ACESSO NEGADO
            self::$instance = new PDO("mysql:host=localhost;port=3306;dbname=glico;charset=utf8","root","");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return self::$instance;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>