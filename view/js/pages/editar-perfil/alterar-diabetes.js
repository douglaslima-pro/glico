function alterarDiabetes(){
    
    event.preventDefault();

    let tipo_diabetes = document.getElementById("tipo-diabetes").value;
    let terapia = document.getElementById("terapia").value;
    let data_diagnostico = document.getElementById("data-diagnostico").value;
    let meta_min = document.getElementById("meta-min").value;
    let meta_max = document.getElementById("meta-max").value;

    fecharEdicao("#diabetes-form .profile__actions-container");

    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/alterarDiabetes.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            console.log(xhr.response);
            let resposta = JSON.parse(xhr.response);
            if(resposta.status === true){
                mostrarAlerta("alert--success","fa-check","Sucesso","Dados alterados com sucesso!");
                document.getElementById("tipo-diabetes").value = tipo_diabetes;
                document.getElementById("terapia").value = terapia;
                document.getElementById("data-diagnostico").value = data_diagnostico;
                document.getElementById("meta-min").value = meta_min;
                document.getElementById("meta-max").value = meta_max;
            }else{
                mostrarAlerta("alert--error","fa-xmark","Erro","Não foi possível alterar os dados!");
            }
        }
    };
    xhr.send(`tipo_diabetes=${tipo_diabetes}&terapia=${terapia}&data_diagnostico=${data_diagnostico}&meta_min=${meta_min}&meta_max=${meta_max}`);

}