<?php

session_start();

require_once "../model/DAO/usuarioDAO.php";

if(isset($_FILES["foto"])){

    $foto = $_FILES["foto"];

    if($foto["error"] > 0){
        $resposta = array (
            "status" => false,
            "msg" => array(
                "alertClass" => "alert--error",
                "iconClass" => "fa-xmark",
                "title" => "Erro",
                "text" => $erro
            )
        );
        echo json_encode($resposta);
        exit(0);
    }

    $extensao = strtolower(pathinfo($foto["name"],PATHINFO_EXTENSION));
    $extensoes = ["png","jpeg","jpg","gif"];
    if(in_array($extensao,$extensoes) == false){
        $resposta = array (
            "status" => false,
            "msg" => array(
                "alertClass" => "alert--info",
                "iconClass" => "fa-info",
                "title" => "O site informa",
                "text" => "Insira uma foto com extensão: png, jpeg, jpg ou gif!"
            )
        );
        echo json_encode($resposta);
        exit(0);
    }

    $nomeArquivo = uniqid(mt_rand(),true).".".$extensao;
    $src = "../img/users/$nomeArquivo";
    $from = $foto["tmp_name"];
    $to = "../view/img/users/$nomeArquivo";
    if(move_uploaded_file($from,$to)){
        $usuarioDAO = new usuarioDAO();
        $retorno = $usuarioDAO->alterarFoto($_SESSION["id_usuario"],$src);
        //atualiza a sessão
        $_SESSION["foto"] = $src;
        //deleta a foto antiga do servidor
        $fotoAntiga = explode("/",$retorno);
        unlink("../view/img/users/".$fotoAntiga[sizeof($fotoAntiga)-1]);
        $resposta = array (
            "status" => true,
            "foto" => $src,
            "msg" => array(
                "alertClass" => "alert--success",
                "iconClass" => "fa-check",
                "title" => "Sucesso",
                "text" => "Foto alterada com sucesso!"
            )
        );
    }else{
        $resposta = array (
            "status" => false,
            "msg" => array(
                "alertClass" => "alert--error",
                "iconClass" => "fa-xmark",
                "title" => "Erro",
                "text" => "Não foi possível alterar a foto!"
            )
        );
    }

}else{
    $resposta = array (
        "status" => false,
        "msg" => array(
            "alertClass" => "alert--info",
            "iconClass" => "fa-info",
            "title" => "O site informa",
            "text" => "Nenhum arquivo foi enviado!"
        )
    );
}

echo json_encode($resposta);

?>