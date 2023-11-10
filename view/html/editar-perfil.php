<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Glico - Editar perfil</title>
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../styles/pages/editar-perfil/editar-perfil.css">
        <script src="https://kit.fontawesome.com/22d8a23b47.js" crossorigin="anonymous"></script>
    </head>
    
    <?php
        // imports de script
        require_once "../../controller/alertMessage.php";

        // inicia a sessão
        session_start();
        
        // verifica se a sessão está ativa, caso contrário devolve para a tela de login
        if(!isset($_SESSION["id_usuario"])){
            $msg = alertMessage("alert--info","fa-info","O site informa","Faça login para entrar!");
            header("location:login.php?msg=$msg");
        }

        // mensagem de alerta
        if(isset($_GET["msg"])){
            $msg = unserialize(urldecode($_GET["msg"]));
        }
    ?>

    <body <?php if(isset($msg)){ ?> onload="mostrarAlerta('<?=$msg['alertClass']?>','<?=$msg['iconClass']?>','<?=$msg['title']?>','<?=$msg['text']?>')" <?php } ?>>
    
        <!--ALERTAS-->
        <div class="alerts alerts--bottom-left"><!--A ESTRUTURA HTML DO ALERTA ESTÁ DESCRITA DENTRO DO SCRIPT alert.js !--></div>
        
        <main class="l-flex l-full-height" id="main">

            <!--OVERLAY-->
            <section class="overlay-backdrop l-grid l-flex-center is-none">
                <div class="register-glucose" id="alterar-senha">
                    <span class="register-glucose__close-btn" onclick="fecharOverlay()">X</span>
                    <h2 class="register-glucose__title l-margin-right-1rem l-margin-bottom-2rem">Alterar senha</h2>
                    <form class="login__form" onsubmit="alterarSenha()">
                        <label for="senha-atual" class="login__label">
                            Senha atual
                            <div class="login__password-container l-flex l-flex-center" id="input-senha-atual">
                                <input type="password" class="login__input login__input--password" id="senha-atual" name="senha-atual" minlength="4" maxlength="30" required oninput="removeEspacosBrancos('senha-atual')">
                                <svg class="login__eye-icon login__eye-icon--closed" onclick="mostrarSenha('#senha-atual','#input-senha-atual .login__eye-icon--open','#input-senha-atual .login__eye-icon--closed')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                                <svg class="login__eye-icon login__eye-icon--open is-none" onclick="esconderSenha('#senha-atual','#input-senha-atual .login__eye-icon--closed','#input-senha-atual .login__eye-icon--open')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            </div>
                        </label>
                        <label for="senha-nova" class="login__label">
                            Senha nova
                            <div class="login__password-container l-flex l-flex-center" id="input-senha-nova">
                                <input type="password" class="login__input login__input--password" id="senha-nova" name="senha-nova" minlength="4" maxlength="30" required oninput="removeEspacosBrancos('senha-nova'),comparaSenhas('senha-nova','confirma-senha-nova','alterar-senha-submit')">
                                <svg class="login__eye-icon login__eye-icon--closed" onclick="mostrarSenha('#senha-nova','#input-senha-nova .login__eye-icon--open','#input-senha-nova .login__eye-icon--closed')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                                <svg class="login__eye-icon login__eye-icon--open is-none" onclick="esconderSenha('#senha-nova','#input-senha-nova .login__eye-icon--closed','#input-senha-nova .login__eye-icon--open')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            </div>
                        </label>
                        <label for="confirma-senha-nova" class="login__label">
                            Confirme a senha nova
                            <div class="login__password-container l-flex l-flex-center" id="input-confirma-senha-nova">
                                <input type="password" class="login__input login__input--password" id="confirma-senha-nova" minlength="4" maxlength="30" required oninput="removeEspacosBrancos('confirma-senha-nova'),comparaSenhas('senha-nova','confirma-senha-nova','alterar-senha-submit')">
                                <svg class="login__eye-icon login__eye-icon--closed" onclick="mostrarSenha('#confirma-senha-nova','#input-confirma-senha-nova .login__eye-icon--open','#input-confirma-senha-nova .login__eye-icon--closed')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                                <svg class="login__eye-icon login__eye-icon--open is-none" onclick="esconderSenha('#confirma-senha-nova','#input-confirma-senha-nova .login__eye-icon--closed','#input-confirma-senha-nova .login__eye-icon--open')" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            </div>
                        </label>
                        <p class="cadastro__aviso is-none" id="aviso-senhas">* As senhas não coincidem!</p>
                        <input class="register-glucose__submit register-glucose__submit--blue" id="alterar-senha-submit" type="submit" value="Salvar">
                    </form>
                </div>
            </section><!--FIM DO OVERLAY-->

            <!--BARRA LATERAL-->
            <aside class="sidebar" id="aside">
                <span class="sidebar--mobile__close-btn is-none">X</span>
                <nav class="sidebar__nav" id="nav">
                    <ul class="sidebar__list">
                        <li class="sidebar__list-item">
                            <a href="#" class="sidebar__link l-flex">
                                <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" height="1rem"
                                    viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z" />
                                </svg>
                                <h3 class="sidebar__guide">Relatórios</h3>
                            </a>
                        </li>
                        <li class="sidebar__list-item">
                            <a href="#" class="sidebar__link l-flex">
                                <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" height="1rem"
                                    viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z" />
                                </svg>
                                <h3 class="sidebar__guide">Controle diário</h3>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside><!--FIM DA BARRA LATERAL-->

            <!--CONTEÚDO PRINCIPAL DA PÁGINA-->
            <section class="content">

                <!--CABEÇALHO-->
                <header class="header" id="header">
                    <a href="#"><h1 class="header__logo">Glico</h1></a>
                    <div class="l-flex l-flex-center l-flex-gap-1rem">
                        <div class="header__user-container">
                            <img class="header__profile-picture" src="<?=$_SESSION["foto"]?>" alt="Foto de perfil do usuário" title="<?=$_SESSION["nome"]?>">
                            <nav class="user-options is-hidden">
                                <h4 class="user-options__username"><?=$_SESSION["usuario"]?></h4>
                                <ul class="user-options__list">
                                    <li class="user-options__list-item"><a href="editar-perfil.php" class="user-options__link">Editar perfil</a></li>
                                    <li class="user-options__list-item"><a href="../../controller/sair.php" class="user-options__link">Sair</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header__hamburger-btn l-flex l-flex-column">
                            <div class="header__hamburger-dash"></div>
                            <div class="header__hamburger-dash"></div>
                            <div class="header__hamburger-dash"></div>
                        </div>
                    </div>
                </header><!--FIM DO CABEÇALHO-->

                <!--CONTEÚDO PRINCIPAL DA SECTION-->
                <div class="content__main">

                    <p class="content__path">/<a class="content__path" href="home.php">home</a>/<span class="content__path--emphasis">editar perfil</span></p>

                    <section class="profile">

                        <div class="l-flex l-flex-gap-1rem l-flex-wrap">
                            <div class="profile__section l-flex-1">
                                <div class="profile__header">
                                    <p class="profile__header-title">Foto de perfil</p>
                                </div>
                                <div class="profile__container">
                                    <img class="profile__picture" src="<?=$_SESSION["foto"]?>" alt="Foto de perfil">
                                    <label class="profile__btn profile__btn--blue profile__btn--center" for="foto">Alterar foto</label>
                                    <input class="is-none" accept="image/*" id="foto" type="file" onchange="alterarFoto()">
                                </div>
                            </div>
                            <div class="profile__section l-flex-2">
                                <div class="profile__header">
                                    <p class="profile__header-title">Informações de acesso</p>
                                </div>
                                <div class="profile__container">
                                    <form class="profile__form" id="account-form" onsubmit="alterarDadosDeAcesso()">
                                        <label class="profile__label" for="email">E-mail</label>
                                        <input class="profile__input" type="email" name="email" id="email" maxlength="50" oninput="removeEspacosBrancos('email'),emailExiste('#account-form input[type=submit]')" disabled required value="<?=$_SESSION["email"]?>">
                                        <p class="cadastro__aviso is-none" id="aviso-email">* E-mail já está em uso!<br></p>
                                        <label class="profile__label" for="usuario">Nome de usuário</label>
                                        <input class="profile__input" disabled type="text" name="usuario" id="usuario" oninput="removeEspacosBrancos('usuario'),usuarioExiste('#account-form input[type=submit]')" maxlength="30" required value="<?=$_SESSION["usuario"]?>">
                                        <p class="cadastro__aviso is-none" id="aviso-usuario">* Nome de usuário já está em uso!<br></p>
                                        <button class="profile__btn profile__btn--edit" type="button" onclick="editarFormulario('#account-form .profile__actions-container')">Editar</button>
                                        <div class="profile__actions-container l-flex l-flex-gap-1rem is-none">
                                            <button class="profile__btn" type="button" onclick="fecharEdicao('#account-form .profile__actions-container')">Cancelar</button>
                                            <input class="profile__btn profile__btn--blue" type="submit" value="Salvar">
                                        </div>
                                        <button class="profile__btn profile__btn--red" type="button" onclick="abrirOverlay('alterar-senha')">Alterar senha</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="profile__section l-full-width">
                            <div class="profile__header">
                                <p class="profile__header-title">Dados pessoais</p>
                            </div>
                            <div class="profile__container">
                                <form class="profile__form" id="personal-data-form" onsubmit="alterarDadosPessoais()">
                                    <div class="l-flex l-flex-gap-1rem l-flex-wrap">
                                        <div class="l-flex-1">
                                            <label class="profile__label" for="nome">Nome completo</label>
                                            <input class="profile__input" type="text" id="nome" name="nome" maxlength="100" oninput="removeEspacosBrancos('nome')" disabled required value="<?=$_SESSION["nome"]?>">
                                            <label class="profile__label" for="cpf">CPF</label>
                                            <input class="profile__input" type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" maxlength="14" oninput="mascaraCPF('cpf'),colarFalse(),removeEspacosBrancos('cpf')" disabled value="<?=$_SESSION["cpf"]?>">
                                            <label class="profile__label" for="nascimento">Data de nascimento</label>
                                            <input class="profile__input" type="date" id="nascimento" name="nascimento" disabled value="<?=$_SESSION["data_nascimento"]?>">
                                        </div>
                                        <div class="l-flex-1">
                                            <label class="profile__label" for="sexo">Sexo</label>
                                            <select class="profile__input" id="sexo" name="sexo" disabled>
                                                <option value="" <?=$_SESSION["sexo"] == "" ? "selected" : "" ?>>Nenhum</option>
                                                <option value="M" <?=$_SESSION["sexo"] == "M" ? "selected" : "" ?>>Masculino</option>
                                                <option value="F" <?=$_SESSION["sexo"] == "F" ? "selected" : "" ?>>Feminino</option>
                                            </select>
                                            <label class="profile__label" for="peso">Peso (kg)</label>
                                            <input class="profile__input" type="number" id="peso" name="peso" disabled value="<?=$_SESSION["peso"]?>">
                                            <label class="profile__label" for="altura">Altura (m)</label>
                                            <input class="profile__input" type="number" id="altura" name="altura" step=".01" disabled value="<?=$_SESSION["altura"]?>">
                                        </div>
                                    </div>
                                    <button class="profile__btn profile__btn--edit" type="button" onclick="editarFormulario('#personal-data-form .profile__actions-container')">Editar</button>
                                    <div class="profile__actions-container l-flex l-flex-gap-1rem is-none">
                                        <button class="profile__btn" type="button" onclick="fecharEdicao('#personal-data-form .profile__actions-container')">Cancelar</button>
                                        <input class="profile__btn profile__btn--blue" type="submit" value="Salvar">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="profile__section l-full-width">
                            <div class="profile__header">
                                <p class="profile__header-title">Dados da diabetes</p>
                            </div>
                            <div class="profile__container">
                                <form class="profile__form" id="diabetes-form" onsubmit="alterarDiabetes()">
                                    <label class="profile__label" for="tipo-diabetes">Tipo de diabetes</label>
                                    <select class="profile__input" name="tipo-diabetes" id="tipo-diabetes" disabled>
                                        <option value="Nenhum" <?=$_SESSION["tipo_diabetes"] == "Nenhum" ? "selected" : "" ?>>Nenhum</option>
                                        <option value="Pré-diabetes" <?=$_SESSION["tipo_diabetes"] == "Pré-diabetes" ? "selected" : "" ?>>Pré-diabetes</option>
                                        <option value="Diabetes Mellitus Tipo 1" <?=$_SESSION["tipo_diabetes"] == "Diabetes Mellitus Tipo 1" ? "selected" : "" ?>>Diabetes Mellitus Tipo 1</option>
                                        <option value="Diabetes Mellitus Tipo 2" <?=$_SESSION["tipo_diabetes"] == "Diabetes Mellitus Tipo 2" ? "selected" : "" ?>>Diabetes Mellitus Tipo 2</option>
                                        <option value="Diabetes gestacional" <?=$_SESSION["tipo_diabetes"] == "Diabetes gestacional" ? "selected" : "" ?>>Diabetes gestacional</option>
                                    </select>
                                    <label class="profile__label" for="terapia">Terapia</label>
                                    <select class="profile__input" name="terapia" id="terapia" disabled>
                                        <option value="Nenhum" <?=$_SESSION["terapia"] == "Nenhum" ? "selected" : "" ?>>Nenhum</option>
                                        <option value="Insulina (caneta)" <?=$_SESSION["terapia"] == "Insulina (caneta)" ? "selected" : "" ?>>Insulina (caneta)</option>
                                        <option value="Insulina (seringa)" <?=$_SESSION["terapia"] == "Insulina (seringa)" ? "selected" : "" ?>>Insulina (seringa)</option>
                                        <option value="Insulina (bomba)" <?=$_SESSION["terapia"] == "Insulina (bomba)" ? "selected" : "" ?>>Insulina (bomba)</option>
                                        <option value="Medicação oral" <?=$_SESSION["terapia"] == "Medicação oral" ? "selected" : "" ?>>Medicação oral</option>
                                        <option value="Outro" <?=$_SESSION["terapia"] == "Outro" ? "selected" : "" ?>>Outro</option>
                                    </select>
                                    <label class="profile__label" for="data-diagnostico">Data do diagnóstico</label>
                                    <input class="profile__input" type="date" name="data-diagnostico" id="data-diagnostico" disabled value="<?=$_SESSION["data_diagnostico"]?>">
                                    <div class="l-flex l-flex-gap-1rem l-flex-wrap">
                                        <div class="l-flex-1">
                                            <label class="profile__label" for="meta-min">Meta mínima (mg/dL)</label>
                                            <input class="profile__input" type="number" name="meta-min" id="meta-min" step="1" disabled required value="<?=$_SESSION["meta_min"]?>">
                                        </div>
                                        <div class="l-flex-1">
                                            <label class="profile__label" for="meta-max">Meta máxima (mg/dL)</label>
                                            <input class="profile__input" type="number" name="meta-max" id="meta-max" step="1" disabled required value="<?=$_SESSION["meta_max"]?>">
                                        </div>
                                    </div>
                                    <button class="profile__btn profile__btn--edit" type="button" onclick="editarFormulario('#diabetes-form .profile__actions-container')">Editar</button>
                                    <div class="profile__actions-container l-flex l-flex-gap-1rem is-none">
                                        <button class="profile__btn" type="button" onclick="fecharEdicao('#diabetes-form .profile__actions-container')">Cancelar</button>
                                        <input class="profile__btn profile__btn--blue" type="submit" value="Salvar">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </section>

                </div><!--fim do content main-->

            </section>
        </main>

        <!--ÁREA DE SCRIPS EM JS-->
        <script src="../js/pages/editar-perfil/alterar-dados-de-acesso.js"></script>
        <script src="../js/pages/editar-perfil/alterar-dados-pessoais.js"></script>
        <script src="../js/pages/editar-perfil/alterar-diabetes.js"></script>
        <script src="../js/pages/editar-perfil/alterar-foto.js"></script>
        <script src="../js/pages/editar-perfil/alterar-senha.js"></script>
        <script src="../js/pages/editar-perfil/botao-editar.js"></script>
        <script src="../js/pages/editar-perfil/email-existe.js"></script>
        <script src="../js/pages/editar-perfil/usuario-existe.js"></script>
        <script src="../js/pages/cadastro/mascara-cpf.js"></script>
        <script src="../js/compara-senhas.js"></script>
        <script src="../js/mostrar-esconder-senha.js"></script>
        <script src="../js/remove-espacos-brancos.js"></script>
        <script src="../js/sidebar.js"></script>
        <script src="../js/user-options.js"></script>
        <script src="../js/alerta.js"></script>
        <script src="../js/overlay.js"></script>

    </body>

</html>