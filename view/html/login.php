<!DOCTYPE html>
<html class="l-table">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Glico</title>
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../styles/pages/login/login.css">
        <script src="https://kit.fontawesome.com/22d8a23b47.js" crossorigin="anonymous"></script>
    </head>

    <?php
        if(isset($_GET["msg"])){
            $msg = unserialize(urldecode($_GET["msg"]));
        }
    ?>

    <body class="l-table-cell" <?php if(isset($msg)){ ?> onload="mostrarAlerta('<?=$msg['alertClass']?>','<?=$msg['iconClass']?>','<?=$msg['title']?>','<?=$msg['text']?>')" <?php } ?>>

        <!--ALERTAS-->
        <div class="alerts"><!--A ESTRUTURA HTML DO ALERTA ESTÁ DESCRITA DENTRO DO SCRIPT alert.js !--></div>

        <!--ABRE UM FORMULÁRIO PARA RECUPERAR SENHA-->
        <div class="overlay-backdrop l-grid l-flex-center is-none">
            <form action="" class="recover-password-form" onsubmit="recuperarSenha('username2','verificar-btn')">
                <div class="recover-password-form__close-btn" onclick="fecharOverlay()">X</div>
                <h2 class="recover-password-form__title">Recuperar senha</h2>
                <p class="recover-password-form__text">Informe o e-mail ou nome de usuário associado à sua conta para alterar sua senha.</p>
                <label for="username2" class="recover-password-form__label">E-mail ou nome de usuário</label>
                <div class="recover-password-form__username-container l-flex l-flex-wrap">
                    <input type="text" class="recover-password-form__input" id="username2" name="email-usuario" maxlength="100" required>
                    <input type="submit" class="recover-password-form__btn" id="verificar-btn" value="Verificar">
                </div>
            </form>
        </div>

        <!--CÍRCULO VERMELHO DO FUNDO-->
        <div class="background-circle"></div>
        
        <!--CONTEÚDO DA PÁGINA-->
        <main class="l-flex l-flex-center l-flex-wrap l-flex-gap-3rem l-padding-3rem-1rem" id="main">

            <section class="description">
                <h1 class="description__title">Glico</h1>
                <p class="description__text">Glico é uma aplicação web para registro e monitoramento de dados de controle glicêmico para pessoas com <span>Diabetes</span>.</p>
                <a href="cadastro.php" class="description__cadastrar-link">Não possui cadastro?</a>
            </section>

            <section class="login">
                <h2 class="login__title">Faça login</h2>
                <form action="../../controller/realizarLogin.php" method="POST" class="login__form">
                    <label for="username" class="login__label">E-mail ou nome de usuário</label>
                    <input type="text" class="login__input" id="username" name="email-usuario" maxlength="100" required>
                    <label for="password" class="login__label">
                        Senha
                        <div class="login__password-container l-flex l-flex-center">
                            <input type="password" class="login__input login__input--password" id="password" name="senha" maxlength="30" required>
                            <svg class="login__eye-icon login__eye-icon--closed" onclick="mostrarSenha('.login__input--password','.login__eye-icon--open','.login__eye-icon--closed')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                            <svg class="login__eye-icon login__eye-icon--open is-none" onclick="esconderSenha('.login__input--password','.login__eye-icon--closed','.login__eye-icon--open')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        </div>
                    </label>
                    <a href="#" class="login__forgot-password" onclick="abrirOverlay()">Esqueceu sua senha?</a>
                    <input type="submit" class="login__btn" name="submit" value="ENTRAR">
                </form>
            </section>

        </main>

        <!--ÁREA DE SCRIPTS-->
        <script src="../js/pages/login/recuperar-senha.js"></script>
        <script src="../js/mostrar-esconder-senha.js"></script>
        <script src="../js/alerta.js"></script>
        <script src="../js/overlay.js"></script>

    </body>

</html>