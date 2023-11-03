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
        require_once "../../model/DAO/usuarioDAO.php";

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

        // objetos DAO da página
        $usuarioDAO = new usuarioDAO();
        $usuario = $usuarioDAO->pesquisarUsuario($_SESSION["id_usuario"]);
    ?>

    <body <?php if(isset($msg)){ ?> onload="mostrarAlerta('<?=$msg['alertClass']?>','<?=$msg['iconClass']?>','<?=$msg['title']?>','<?=$msg['text']?>')" <?php } ?>>
    
        <!--ALERTAS-->
        <div class="alerts alerts--bottom-left"><!--A ESTRUTURA HTML DO ALERTA ESTÁ DESCRITA DENTRO DO SCRIPT alert.js !--></div>
        
        <main class="l-flex l-full-height" id="main">

            <!--OVERLAY-->
            <section class="overlay-backdrop l-grid l-flex-center is-none"></section><!--FIM DO OVERLAY-->

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
                            <img class="header__profile-picture" src="<?=$usuario["foto"]?>" alt="Foto de perfil do usuário" title="<?=$usuario["nome"]?>">
                            <nav class="user-options is-hidden">
                                <h4 class="user-options__username"><?=$usuario["usuario"]?></h4>
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
                                    <img class="profile__picture" src="<?=$usuario["foto"]?>" alt="Foto de perfil">
                                    <label class="profile__btn profile__btn--blue profile__btn--center" for="foto">Alterar foto</label>
                                    <input class="is-none" id="foto" type="file">
                                </div>
                            </div>
                            <div class="profile__section l-flex-2">
                                <div class="profile__header">
                                    <p class="profile__header-title">Informações de acesso</p>
                                </div>
                                <div class="profile__container">
                                    <form class="profile__form" id="account-form">
                                        <label class="profile__label" for="email">E-mail</label>
                                        <input class="profile__input" type="email" name="email" id="email" maxlength="50" oninput="removeEspacosBrancos('email')" disabled required value="<?=$usuario["email"]?>">
                                        <label class="profile__label" for="usuario">Nome de usuário</label>
                                        <input class="profile__input" disabled type="text" name="usuario" id="usuario" oninput="removeEspacosBrancos('usuario')" maxlength="30" required value="<?=$usuario["usuario"]?>">
                                        <button class="profile__btn profile__btn--edit" type="button" onclick="editarFormulario('#account-form .profile__actions-container')">Editar</button>
                                        <div class="profile__actions-container l-flex l-flex-gap-1rem is-none">
                                            <button class="profile__btn" type="button" onclick="fecharEdicao('#account-form .profile__actions-container')">Cancelar</button>
                                            <input class="profile__btn profile__btn--blue" type="submit" value="Salvar">
                                        </div>
                                        <button class="profile__btn profile__btn--red" type="button">Alterar senha</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="profile__section l-full-width">
                            <div class="profile__header">
                                <p class="profile__header-title">Dados pessoais</p>
                            </div>
                            <div class="profile__container">
                                <form class="profile__form" id="personal-data-form">
                                    <div class="l-flex l-flex-gap-1rem l-flex-wrap">
                                        <div class="l-flex-1">
                                            <label class="profile__label" for="nome">Nome completo</label>
                                            <input class="profile__input" type="text" id="nome" name="nome" maxlength="100" oninput="removeEspacosBrancos('nome')" disabled required value="<?=$usuario["nome"]?>">
                                            <label class="profile__label" for="cpf">CPF</label>
                                            <input class="profile__input" type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" maxlength="14" oninput="mascaraCPF('cpf'),colarFalse(),removeEspacosBrancos('cpf')" disabled value="<?=$usuario["cpf"]?>">
                                            <label class="profile__label" for="nascimento">Data de nascimento</label>
                                            <input class="profile__input" type="date" id="nascimento" name="nascimento" disabled value="<?=$usuario["data_nascimento"]?>">
                                        </div>
                                        <div class="l-flex-1">
                                            <label class="profile__label" for="sexo">Sexo</label>
                                            <select class="profile__input" id="sexo" name="sexo" disabled>
                                                <option value="N">Nenhum</option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                            </select>
                                            <label class="profile__label" for="peso">Peso (kg)</label>
                                            <input class="profile__input" type="number" id="peso" name="peso" disabled value="<?=$usuario["peso"]?>">
                                            <label class="profile__label" for="altura">Altura (m)</label>
                                            <input class="profile__input" type="number" id="altura" name="altura" step=".01" disabled value="<?=$usuario["altura"]?>">
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
                                <form class="profile__form" id="diabetes-form">
                                    <label class="profile__label" for="diabetes">Tipo de diabetes</label>
                                    <select class="profile__input" name="diabetes" id="diabetes" disabled>
                                        <option value="Nenhum">Nenhum</option>
                                        <option value="Pré-diabetes">Pré-diabetes</option>
                                        <option value="Diabetes Mellitus Tipo 1">Diabetes Mellitus Tipo 1</option>
                                        <option value="Diabetes Mellitus Tipo 2">Diabetes Mellitus Tipo 2</option>
                                        <option value="Diabetes gestacional">Diabetes gestacional</option>
                                    </select>
                                    <label class="profile__label" for="terapia">Terapia</label>
                                    <select class="profile__input" name="terapia" id="terapia" disabled>
                                        <option value="Nenhum">Nenhum</option>
                                        <option value="Insulina (caneta)">Insulina (caneta)</option>
                                        <option value="Insulina (seringa)">Insulina (seringa)</option>
                                        <option value="Insulina (bomba)">Insulina (bomba)</option>
                                        <option value="Medicação oral">Medicação oral</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                    <label class="profile__label" for="diagnostico">Data do diagnóstico</label>
                                    <input class="profile__input" type="date" name="diagnostico" id="diagnostico" disabled value="<?=$usuario["data_diagnostico"]?>">
                                    <div class="l-flex l-flex-gap-1rem l-flex-wrap">
                                        <div class="l-flex-1">
                                            <label class="profile__label" for="meta-min">Meta mínima (mg/dL)</label>
                                            <input class="profile__input" type="number" name="meta-min" id="meta-min" step="1" disabled required value="<?=$usuario["meta_min"]?>">
                                        </div>
                                        <div class="l-flex-1">
                                            <label class="profile__label" for="meta-max">Meta máxima (mg/dL)</label>
                                            <input class="profile__input" type="number" name="meta-max" id="meta-max" step="1" disabled required value="<?=$usuario["meta_max"]?>">
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
        <script src="../js/pages/editar-perfil/botao-editar.js"></script>
        <script src="../js/pages/cadastro/mascara-cpf.js"></script>
        <script src="../js/remove-espacos-brancos.js"></script>
        <script src="../js/sidebar.js"></script>
        <script src="../js/user-options.js"></script>
        <script src="../js/alerta.js"></script>
        <script src="../js/overlay.js"></script>

    </body>

</html>