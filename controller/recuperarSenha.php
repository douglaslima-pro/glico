 <?php

ob_start(); //ativa o buffer da saída

require_once "enviarEmail.php";
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/recuperacaoDTO.php";
require_once "../model/DAO/recuperacaoDAO.php";

$emailUsuario = $_POST["emailusuario"];
$usuarioDAO = new usuarioDAO();

if($usuarioDAO->emailExiste($emailUsuario) || $usuarioDAO->usuarioExiste($emailUsuario)){
    
    $usuario = $usuarioDAO->pesquisarUsuarioPeloEmailUsuario($emailUsuario);

    $chave = sha1(uniqid(mt_rand(),true));

    $recuperacaoDTO = new recuperacaoDTO($usuario["id_usuario"],$chave);
    $recuperacaoDAO = new recuperacaoDAO();
    $recuperacaoDAO->registrarRecuperacao($recuperacaoDTO);

    $primeiroNome = explode(" ",$usuario["nome"])[0];
    $id_usuario = $usuario["id_usuario"];
    $assunto = "Link para alterar a senha";
    $mensagem = "
    <html lang=\"pt-BR\">
    <head>
        <meta charset=\"UTF-8\">
        <style type=\"text/css\">
            .title {
                color: #8C4B45;
                margin: 3rem 0;
                text-align: center;
            }
            .greeting {
                margin: 1rem 0;
            }
            .text {
                font-size: 16px;
                font-weight: 400;
                margin: 1rem 0;
            }
            .text--small {
                font-size: 12px;
                margin: 3rem 0;
            }
            .link--black {
                color: black;
            }
            * {
                font-family: \"Open sans\", sans-serif;
            }
        </style>
    </head>
    <body>
        <h1 class=\"title\">Glico</h1>

        <strong class=\"greeting\">Olá, $primeiroNome</strong>

        <p class=\"text\">Aparentemente você solicitou recuperar a senha. Para isso basta entrar no link: <a class=\"link\" href=\"http://localhost/douglas/glico/view/html/alterar-senha.php?id_usuario=$id_usuario&chave=$chave\">http://localhost/douglas/glico/view/html/alterar-senha.php?id_usuario=$id_usuario&chave=$chave</a></p>

        <p class=\"text text--small\">Obs.: Qualquer problema de acesso basta enviar um e-mail para <a class=\"link link--black\" href=\"mailto:glico-diabetes@outlook.com\">glico-diabetes@outlook.com</a></p>
    </body>
    </html>";

    enviarEmail($usuario["email"],$usuario["nome"],$assunto,$mensagem);

    ob_end_clean(); //limpa o buffer da saída
    
    $response = array(
        "status" => true
    );

    echo json_encode($response);

}else{
    ob_end_clean(); //limpa o buffer da saída
    
    $response = array(
        "status" => false
    );

    echo json_encode($response);

}

?>