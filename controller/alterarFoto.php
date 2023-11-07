<?php

session_start();

require_once "../model/DAO/usuarioDAO.php";

$foto = $_FILES["picture"];
$nomeArquivo = $foto["name"];
$extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));
$extensoes = ["png","jpeg","jpg","gif"];
if(in_array($extensao,$extensoes)){
    $novoNomeArquivo = uniqid(mt_rand(),true).".".$extensao;
    echo $novoNomeArquivo;
    echo "<br>";
    $src = "../img/users/$novoNomeArquivo"; //src da foto
    $from = $foto["tmp_name"]; //nome temporário do arquivo enviado
    $to = "../view/img/users/$novoNomeArquivo"; //diretório onde o arquivo vai ficar
    $erro = $foto["error"];
    if($erro > 0){
        $resposta = array (
            "status" => false,
            "msg" => array(
                "alertClass" => "alert--error",
                "iconClass" => "fa-xmark",
                "title" => "Erro",
                "text" => $erro
            )
        );
    }else{
        if(move_uploaded_file($from,$to)){
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO->alterarFoto($_SESSION["id_usuario"],$src);
            if($retorno != NULL && !empty($retorno)){
                $resposta = array (
                    "status" => true,
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
                        "text" => "Ocorreu um problema. Tente novamente mais tarde!"
                    )
                );
            }
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
    }
}else{
    $resposta = array (
        "status" => false,
        "msg" => array(
            "alertClass" => "alert--info",
            "iconClass" => "fa-info",
            "title" => "O site informa",
            "text" => "Insira uma foto com extensão: png, jpeg, jpg ou gif!"
        )
    );
}

echo json_encode($resposta);

?>