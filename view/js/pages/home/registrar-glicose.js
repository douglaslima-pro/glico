function registrarGlicose(id_usuario){
    //prevent submit event
    event.preventDefault();

    let valor = document.getElementById("valor").value;
    let data = document.getElementById("data").value;
    let hora = document.getElementById("hora").value;
    let comentario = document.getElementById("comentario").value;
    let condicao = document.getElementById("condicao").value;

    //clear inputs
    document.getElementById("valor").value = "";
    document.getElementById("data").value = "";
    document.getElementById("hora").value = "";
    document.getElementById("comentario").value = "";
    document.querySelector("#condicao > option:not(#condicao-default)").selected = false;
    document.getElementById("condicao-default").selected = true;
    
    //fecha o overlay-backdrop
    fecharOverlay();

    let xhr = new XMLHttpRequest();
    xhr.open("POST","../../controller/registrarGlicose.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            if(xhr.responseText == "true"){
                mostrarAlerta("alert--success","fa-check","Sucesso","Glicemia registrada com sucesso!");
                atualizaPaginaHome(id_usuario);
            }else{
                mostrarAlerta("alert--error","fa-xmark","Erro","Erro ao registrar glicemia!");
            }
        }
    };
    xhr.send(`valor=${valor}&data=${data}&hora=${hora}&comentario=${comentario}&condicao=${condicao}&idusuario=${id_usuario}`);
}

function atualizaPaginaHome(id_usuario){
    let limite = document.getElementById("quantidade-registros").value;
    ultimaGlicose(id_usuario);
    pesquisarGlicoses(id_usuario,limite,1);
}