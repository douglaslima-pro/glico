var inputValues = {
    formulario: ["account-form","personal-data-form","diabetes-form"],
    values: [[],[],[]]
};

function editarFormulario(selector){
    console.log(inputValues);
    //variáveis
    let form = selector.split(" ")[0].replace("#","");
    let acoesForm = document.querySelector(selector);
    let editarBtn = document.querySelector(`#${form} .profile__btn--edit`);
    let inputs = document.querySelectorAll(`#${form} .profile__input`);

    //ações
    for(i=0;i<3;i++){
        if(inputValues.formulario[i] == form){
            inputValues.values[inputValues.formulario.indexOf(form)].splice(0);
            for(j=0;j<inputs.length;j++){
                inputValues.values[inputValues.formulario.indexOf(form)].push(inputs[j].value);
            }
        }
    }
    for(i=0;i<inputs.length;i++){
        inputs[i].disabled = false;
    }
    acoesForm.classList.remove("is-none");
    editarBtn.classList.add("is-none");

}

function fecharEdicao(selector){
    //variáveis
    let form = selector.split(" ")[0].replace("#","");
    let acoesForm = document.querySelector(selector);
    let editarBtn = document.querySelector(`${selector.split(" ")[0]} .profile__btn--edit`);
    let inputs = document.querySelectorAll(`${selector.split(" ")[0]} .profile__input`);

    //ações
    for(i=0;i<3;i++){
        if(inputValues.formulario[i] == form){
            for(j=0;j<inputs.length;j++){
                inputs[j].value = inputValues.values[inputValues.formulario.indexOf(form)][j];
            }
        }
    }
    for(i=0;i<inputs.length;i++){
        inputs[i].disabled = true;
    }
    acoesForm.classList.add("is-none");
    editarBtn.classList.remove("is-none");

}