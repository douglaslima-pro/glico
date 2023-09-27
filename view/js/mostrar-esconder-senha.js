function mostraEscondeSenha(inputContainerSelector){
    
    inputContainer = document.querySelector(inputContainerSelector);
    input = document.querySelector(inputContainerSelector+" input");
    
    if(inputContainer.id == "esconde-senha"){
        inputContainer.id = "mostra-senha";
        input.type = "text";
    }else{
        inputContainer.id = "esconde-senha";
        input.type = "password";
    }

}