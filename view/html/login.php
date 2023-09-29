<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/font.css">
        <link rel="stylesheet" href="../css/aviso-na-tela.css">
        <link rel="stylesheet" href="../css/login.css">
        <title>Glico</title>
    </head>

    <body onload="aviso('<?php if(isset($_GET['msg'])){echo $_GET['msg'];}else{echo null;}?>')">

        <!--MENSAGEM DE AVISO QUE SURGE NO TOPO DA TELA-->
        <div class="aviso-na-tela" id="sucesso" onclick="fechaAviso()">
                <svg class="success-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                <svg class="info-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 192 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M48 80a48 48 0 1 1 96 0A48 48 0 1 1 48 80zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z"/></svg>
                <p id="mensagem"></p>
        </div>

        <!--PROMPT QUE ABRE PARA RECUPERAR SENHA-->
        <div class="prompt-recuperar-senha">
            <div class="background-prompt"></div>
            <form action="../../controller/recuperarSenha.php" method="POST" class="recuperar-senha-form">
                <div class="fechar-btn">X</div>
                <h2>Recuperar senha</h2>
                <p>Informe o e-mail ou nome de usuário associado à sua conta para alterar sua senha.</p>
                <label for="email-usuario2">E-mail ou nome de usuário</label>
                <div class="input-verificar-container">
                    <input type="text" id="email-usuario2" name="email-usuario" maxlength="100" required>
                    <input type="submit" value="Verificar" class="verificar-btn">
                </div>
            </form>
        </div>

        <!--CÍRCULO VERMELHO DE FUNDO-->
        <div class="background-circle"></div>
        
        <!--CONTEÚDO DA PÁGINA-->
        <main>
            <section class="descricao">
                <h1>Glico</h1>
                <p>Glico é uma aplicação web para registro e monitoramento de dados de controle glicêmico para pessoas com <span>Diabetes</span>.</p>
                <a href="cadastro.php">Não possui cadastro?</a>
            </section>

            <section class="login-container">
                <h2>Faça login</h2>
                <form action="../../controller/realizarLogin.php" method="POST">
                    <label for="email-usuario">E-mail ou nome de usuário</label>
                    <input type="text" id="email-usuario" name="email-usuario" maxlength="100" required>
                    <label for="senha">
                        Senha
                        <div class="input-senha" id="esconde-senha">
                            <input type="password" id="senha" name="senha" maxlength="30" required>
                            <svg class="icone-senha olho-fechado" onclick="mostraEscondeSenha('.input-senha')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                            <svg class="icone-senha olho-aberto" onclick="mostraEscondeSenha('.input-senha')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        </div>
                    </label>
                    <div class="esqueceu-senha">
                        <a href="#">Esqueceu sua senha?</a>
                    </div>
                    <div class="login-btn-container" onclick="teste()">
                        <input type="submit" name="submit" value="ENTRAR" class="login-btn">
                    </div>
                </form>
            </section>
        </main>

        <!--ÁREA DE ÁUDIOS-->
        <audio id="audio-notificacao" preload="auto"> 
            <source src="../audio/notificacao.mp3" type="audio/mp3">
            Seu navegador não suporta a reprodução de áudio.
        </audio>

        <!--ÁREA DE SCRIPTS EM JS-->
        <script src="../js/aviso-na-tela.js"></script>
        <script src="../js/mostrar-esconder-senha.js"></script>
        <script>
            //ABRE O PROMPT RECUPERAR SENHA QUANDO CLICA EM "ESQUECEU SUA SENHA?"
            promptRecuperarSenha = document.querySelector(".prompt-recuperar-senha");
            
            esqueceuSenhaBTN = document.querySelector(".esqueceu-senha");
            esqueceuSenhaBTN.addEventListener('click',() => {
                promptRecuperarSenha.style = "display: flex";
            });

            backgroundPrompt = document.querySelector(".background-prompt");
            backgroundPrompt.addEventListener('click', () => {
                promptRecuperarSenha.style = "display: none";
            });
            
            fecharPromptBTN = document.querySelector(".fechar-btn");
            fecharPromptBTN.addEventListener('click', () => {
                promptRecuperarSenha.style = "display: none";
            });
        </script>

    </body>

</html>