function excluirGlicose(id_glicose,id_usuario){

    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/excluirGlicose.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            if(xhr.responseText == "true"){
                cancelarConfirmacao();
                fecharOverlay();
                mostrarAlerta("alert--success","fa-check","Sucesso","A glicemia foi excluída com sucesso!");
                atualizaPaginaHome(id_usuario);
            }else{
                mostrarAlerta("alert--error","fa-xmark","Erro","Não foi possível excluir a glicemia!");
            }
        }
    };
    xhr.send(`id_glicose=${id_glicose}`);
}