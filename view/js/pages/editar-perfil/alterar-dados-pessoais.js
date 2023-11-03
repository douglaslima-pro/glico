function alterarDadosPessoais(){

    event.preventDefault();

    let nome = document.getElementById("nome").value;
    let cpf = document.getElementById("cpf").value;
    let data_nascimento = document.getElementById("nascimento").value;
    let sexo = document.getElementById("sexo").value;
    let peso = document.getElementById("peso").value;
    let altura = document.getElementById("altura").value;

    fecharEdicao("#personal-data-form .profile__actions-container");

    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/alterarDadosPessoais.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            console.log(xhr.response);
            let resposta = JSON.parse(xhr.response);
            if(resposta.status === true){
                mostrarAlerta("alert--success","fa-check","Sucesso","Dados alterados com sucesso!");
                document.getElementById("nome").value = nome;
                document.getElementById("cpf").value = cpf;
                document.getElementById("nascimento").value = data_nascimento;
                document.getElementById("sexo").value = sexo;
                document.getElementById("peso").value = peso;
                document.getElementById("altura").value = altura;
            }else{
                mostrarAlerta("alert--error","fa-xmark","Erro","Não foi possível alterar os dados!");
            }
        }
    };
    xhr.send(`nome=${nome}&cpf=${cpf}&data_nascimento=${data_nascimento}&sexo=${sexo}&peso=${peso}&altura=${altura}`);

}