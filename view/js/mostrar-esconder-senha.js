function mostrarSenha(passwordInputSelector, openEyeSelector, closedEyeSelector){
    
    passwordInput = document.querySelector(passwordInputSelector);
    openEye = document.querySelector(openEyeSelector);
    closedEye = document.querySelector(closedEyeSelector);

    passwordInput.type = 'text';
    openEye.classList.remove('is-none');
    closedEye.classList.add('is-none');
}

function esconderSenha(passwordInputSelector, closedEyeSelector, openEyeSelector){
    
    passwordInput = document.querySelector(passwordInputSelector);
    closedEye = document.querySelector(closedEyeSelector);
    openEye = document.querySelector(openEyeSelector);

    passwordInput.type = 'password';
    closedEye.classList.remove('is-none');
    openEye.classList.add('is-none');
}