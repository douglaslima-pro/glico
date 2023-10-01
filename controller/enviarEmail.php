<?php

//IMPORTA A NAMESPACE "PHPMailer\PHPMailer" COM OS PRINCIPAIS MÉTODOS PARA ENVIAR E-MAIL 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//IMPORTA O ARQUIVO "autoload.php" DO COMPOSER
require "../vendor/autoload.php";

function enviarEmail($destinario,$nome,$assunto,$corpo){

    //cria o objeto PHPMailer
    $mail = new PHPMailer(true); //Passa true como parâmetro para habilitar exceções
    
    try{

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP(); //O protocolo a ser usado é SMTP
        $mail->Host = "smtp.office365.com"; //Declara o servidor de e-mail para enviar a mensagem
        $mail->SMTPAuth = true; //Configura autenticação como true
        $mail->Username = "glico-diabetes@outlook.com"; //E-mail para autenticar o SMTP
        $mail->Password = "Di@betes133"; //Senha para autenticar o SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Habilita criptografia STARTTLS
        $mail->Port = 587; //Configura a porta SMTP
    
        //Recipientes
        $mail->setFrom("glico-diabetes@outlook.com","Glico"); //remetente da mensagem
        $mail->addAddress($destinario,$nome); //destinatário da mensagem
    
        //Conteúdo da mensagem
        $mail->isHTML(true); //mensagem no formato HTML
        $mail->Subject = $assunto; //assunto da mensagem
        $mail->CharSet = $mail::CHARSET_UTF8; // charset utf-8
        $mail->Body = $corpo; //corpo da mensagem em formato HTML
        $mail->AltBody = $corpo; //corpo da mensagem para clientes de e-mail que não suportam formato HTML

        $mail->send();

    }catch(Exception $e){
        echo $e->errorMessage();
    }catch(\Exception $e){
        echo $e->getMessage();
    }

}

?>