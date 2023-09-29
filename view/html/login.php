<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/font.css">
        <title>Glico</title>
    </head>

    <body>

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

        <div class="background-circle"></div>
        
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
                            <div class="icone-senha" onclick="mostraEscondeSenha('.input-senha')"></div>
                        </div>
                    </label>
                    <div class="esqueceu-senha">
                        <a href="#">Esqueceu sua senha?</a>
                    </div>
                    <div class="login-btn-container">
                        <input type="submit" name="submit" value="ENTRAR" class="login-btn">
                    </div>
                </form>
            </section>

        </main>
        
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