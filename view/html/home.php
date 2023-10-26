<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Glico - Home</title>
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../styles/pages/home/home.css">
        <script src="https://kit.fontawesome.com/22d8a23b47.js" crossorigin="anonymous"></script>
    </head>

    <?php
        // inicia a sessão
        session_start();

        // imports de script
        require_once "../../controller/alertMessage.php";
        require_once "../../model/DAO/glicoseDAO.php";

        // objetos DAO da página
        $glicoseDAO = new glicoseDAO();

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

    <body <?php if(isset($msg)){ ?> onload="mostrarAlerta('<?=$msg['alertClass']?>','<?=$msg['iconClass']?>','<?=$msg['title']?>','<?=$msg['text']?>')<?php } ?>">

        <!--ALERTAS-->
        <div class="alerts alerts--bottom-left"><!--A ESTRUTURA HTML DO ALERTA ESTÁ DESCRITA DENTRO DO SCRIPT alert.js !--></div>

        <!--PROMPT DE CONFIRMAÇÃO-->
        <div class="confirm is-none">
            <div class="confirm-modal">
                <h3 class="confirm-modal__title"></h3>
                <p class="confirm-modal__description"></p>
                <div class="confirm-modal__btn-container l-flex l-flex-wrap l-flex-justify-center l-flex-gap-1rem">
                    <button class="confirm-modal__btn confirm-modal__btn--cancel" onclick="cancelarConfirmacao()">Cancelar</button>
                    <button class="confirm-modal__btn confirm-modal__btn--red confirm-modal__btn--confirm">Sim, confirmar!</button>
                </div>
            </div>
        </div><!--fim do prompt de confirmação-->

        <main class="l-flex l-full-height">
            <!--OVERLAY-->
            <section class="overlay-backdrop l-grid l-flex-center is-none">
                <!--FORMULÁRIO DE REGISTRAR GLICEMIA-->
                <div class="register-glucose is-none" id="registrar-glicose">
                    <span class="register-glucose__close-btn" onclick="fecharOverlay()">X</span>
                    <h2 class="register-glucose__title">Registrar glicemia</h2>
                    <p class="register-glucose__text">* Preencha os campos obrigatórios e clique em "Registrar".</p>
                    <form action="" class="register-glucose__form" onsubmit="registrarGlicose(<?=$_SESSION['id_usuario']?>)">

                        <div class="register-glucose__input-container">
                            <label for="condicao" class="register-glucose__label">Condição:</label>
                            <select class="register-glucose__select" name="condicao" id="condicao">
                                <option value="Nenhum" id="condicao-default">Nenhum</option>
                                <option value="Jejum">Jejum</option>
                                <option value="Antes da refeição">Antes da refeição</option>
                                <option value="2h após a refeição">2h após a refeição</option>
                                <option value="Antes de dormir">Antes de dormir</option>
                            </select>
                        </div>

                        <div class="register-glucose__input-container l-flex l-flex-gap-1rem l-flex-wrap">
                            <div class="register-glucose__input-container--datetime l-flex l-flex-column l-flex-1">
                                <label for="data" class="register-glucose__label">Data</label>
                                <input type="date" class="register-glucose__input" id="data" name="data" required>
                            </div>
                            <div class="register-glucose__input-container--datetime l-flex l-flex-column l-flex-1">
                                <label for="hora" class="register-glucose__label">Hora</label>
                                <input type="time" class="register-glucose__input" id="hora" name="hora" required>
                            </div>
                        </div>
                        <p class="register-glucose__text">* Você pode mudar a data e a hora do registro!</p>

                        <div class="register-glucose__input-container">
                            <label for="comentario" class="register-glucose__label">Comentário</label>
                            <textarea name="comentario" class="register-glucose__textarea" id="comentario" rows="5" maxlength="500"
                                placeholder="Exemplo: Apliquei 20ui de insulina fixa e comi uma maçã (120g)." oninput="removeEspacosBrancos('comentario')"></textarea>
                        </div>

                        <div class="register-glucose__input-container">
                            <label for="valor" class="register-glucose__label">Valor*:</label>
                            <input type="number" class="register-glucose__input" id="valor" name="valor" required> mg/dL
                        </div>

                        <input type="submit" class="register-glucose__submit" value="Registrar">
                    </form>
                </div>
                <!--DETALHES DA GLICEMIA REGISTRADA-->
                <div class="register-glucose is-none" id="detalhes-glicose">
                    <span class="register-glucose__close-btn" onclick="fecharOverlay(),desabilitarComentario()">X</span>
                    <h2 class="register-glucose__title">Detalhes da glicemia</h2>
                    <p class="register-glucose__text" id="glicose-registrada-em"></p>
                    <div class="register-glucose__form">

                        <div class="register-glucose__input-container">
                            <p><span class="register-glucose__label">Condição: </span><span id="condicao-glicose"></span></p>
                        </div>

                        <div class="register-glucose__input-container l-flex l-flex-gap-1rem l-flex-wrap">
                            <div class="register-glucose__input-container--datetime l-flex l-flex-column l-flex-1">
                                <label class="register-glucose__label">Data</label>
                                <input type="date" class="register-glucose__input" id="data-glicose" disabled>
                            </div>
                            <div class="register-glucose__input-container--datetime l-flex l-flex-column l-flex-1">
                                <label class="register-glucose__label">Hora</label>
                                <input type="time" class="register-glucose__input" id="hora-glicose" disabled>
                            </div>
                        </div>

                        <form class="register-glucose__input-container" id="editar-glicose-form">
                            <label for="comentario-glicose" class="register-glucose__label">Comentário
                                <div class="register-glucose__comment">
                                    <textarea class="register-glucose__textarea register-glucose__textarea--no-border" id="comentario-glicose" rows="5" maxlength="500" oninput="removeEspacosBrancos('comentario-glicose')" disabled required></textarea>
                                    <div class="register-glucose__comment-actions l-flex l-flex-justify-end l-flex-gap-5px is-none">
                                        <button type="button" class="register-glucose__btn register-glucose__btn--grey" onclick="desabilitarComentario()">Cancelar</button>
                                        <button type="submit" class="register-glucose__submit register-glucose__submit--blue register-glucose__submit--small">Salvar</button>
                                    </div>
                                </div>
                            </label>
                            <span class="register-glucose__text register-glucose__text--clickable" id="editar-comentario" onclick="habilitarComentario()">Editar</span>
                        </form>         

                        <div class="register-glucose__input-container">
                            <p class="register-glucose__label">Valor:</p>
                            <p class="card__important card__important--grey"><span id="valor-glicose"></span> mg/dL</p>
                        </div>

                        <hr>

                        <button type="button" class="register-glucose__btn register-glucose__btn--red register-glucose__btn--align-center" id="excluir-glicose-btn">Excluir glicemia</button>
                    </div>
                </div>
            </section><!--FIM DA TELA REGISTRAR GLICOSE-->

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
                            <img class="header__profile-picture" src="<?=$_SESSION['foto']?>" alt="Foto de perfil do usuário" title="<?=$_SESSION['nome']?>">
                            <nav class="user-options is-hidden">
                                <h4 class="user-options__username"><?=$_SESSION['usuario']?></h4>
                                <ul class="user-options__list">
                                    <li class="user-options__list-item"><a href="perfil.php" class="user-options__link">Editar perfil</a></li>
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

                    <!--card registrar glicemia-->
                    <div class="card card--register">
                        <h3 class="card__title">Que tal,<br>
                            registrar a sua glicemia <span class="card__title--red">agora</span>?</h3>
                        <p class="card__description">Último registro:
                            <?php
                                $ultimaGlicose = $glicoseDAO->pesquisarUltimaGlicose($_SESSION["id_usuario"]);
                            ?>
                                <span id="last-glucose"><?=($ultimaGlicose == NULL || empty($ultimaGlicose)) ? "--" : $ultimaGlicose["valor"] ?></span>
                            mg/dL</p>
                        <button class="card__btn" onclick="abrirOverlay('registrar-glicose'),atualizaDataHora()">Registrar glicemia</button>
                    </div><!--fim do card registrar glicemia-->

                    <!--dados importantes-->
                    <div class="important-data">
                        <div class="topic">
                            <svg class="topic__icon" xmlns="http://www.w3.org/2000/svg" height="1rem"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z" />
                            </svg>
                            <h2 class="topic__title">Dados importantes (últimos 30 dias)</h2>
                        </div>
                        <div class="cards l-flex l-flex-wrap">
                            <div class="card l-flex-1">
                                <p class="card__description">Glicemia média</p>
                                <span class="card__important card__important--media">
                                    <?php
                                        echo $glicoseDAO->mediaGlicoses($_SESSION["id_usuario"]);
                                    ?> mg/dL
                                </span>
                            </div>
                            <div class="card l-flex-1">
                                <p class="card__description">Hipoglicemias</p>
                                <span class="card__important card__important--hipoglicemias">
                                    <?php
                                        echo str_replace(".",",",$glicoseDAO->calcularHipoglicemias($_SESSION["id_usuario"]));
                                    ?> %
                                </span>
                            </div>
                            <div class="card l-flex-1">
                                <p class="card__description">Hiperglicemias</p>
                                <span class="card__important card__important--hiperglicemias">
                                    <?php
                                        echo str_replace(".",",",$glicoseDAO->calcularHiperglicemias($_SESSION["id_usuario"]));
                                    ?> %
                                </span>
                            </div>
                        </div>
                    </div><!--fim do dados importantes-->

                    <!--histórico de glicoses-->
                    <div class="glucose-history">
                        <div class="topic">
                            <svg class="topic__icon" xmlns="http://www.w3.org/2000/svg" height="1rem"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            <h2 class="topic__title">Histórico de glicemias</h2>
                        </div>
                        <?php
                            $limite = 5;
                            $totalGlicoses = $glicoseDAO->contarGlicoses($_SESSION["id_usuario"])["count"];
                            $paginas = ceil($totalGlicoses/$limite);
                            $pagina = 1;
                            $inicio = $pagina*$limite-$limite;

                            $glicoses = $glicoseDAO->pesquisarGlicoses($_SESSION["id_usuario"],$limite,$inicio);
                        ?>

                            <div class="glucose-history__table-container <?=($glicoses == NULL || empty($glicoses)) ? 'is-none' : $qtdGlicoses = sizeof($glicoses)?>">
                                
                                <label for="quantidade-registros">
                                    Mostrar
                                    <select class="register-glucose__select" name="quantidade-registros" id="quantidade-registros">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                    registros
                                </label>

                                <div class="l-overflow-x-auto l-padding-3px l-margin-1rem-0">
                                <div class="glucose-history__table l-table">

                                    <div class="glucose-history__table-row l-table-row">
                                        <div class="glucose-history__table-cell glucose-history__table-cell--header glucose-history__table-cell--view l-table-cell">Visualizar</div>
                                        <div class="glucose-history__table-cell glucose-history__table-cell--header glucose-history__table-cell--value l-table-cell">Valor (mg/dL)</div>
                                        <div class="glucose-history__table-cell glucose-history__table-cell--header glucose-history__table-cell--date l-table-cell">Data</div>
                                        <div class="glucose-history__table-cell glucose-history__table-cell--header glucose-history__table-cell--time l-table-cell">Hora</div>
                                        <div class="glucose-history__table-cell glucose-history__table-cell--header glucose-history__table-cell--condition l-table-cell">Condição</div>
                                        <div class="glucose-history__table-cell glucose-history__table-cell--header glucose-history__table-cell--comment l-table-cell">Comentário</div>
                                    </div><!--fim do cabeçalho da tabela-->

                                    <div class="glucose-history__table-row-container l-table-row-group">
                                    <?php
                                        if($glicoses != NULL && !empty($glicoses) && $glicoses != 0){
                                            foreach($glicoses as $glicose):
                                    ?>
                                        <div id="glicose-<?=$glicose["id_glicose"]?>" class="glucose-history__table-row l-table-row">
                                            <div class="glucose-history__table-cell glucose-history__table-cell--view  l-table-cell">
                                                <div class="glucose-history__table-icon" onclick="visualizarGlicose(<?=$glicose['id_glicose']?>),abrirOverlay('detalhes-glicose')"></div>
                                            </div>
                                            <div class="glucose-history__table-cell glucose-history__table-cell--value l-table-cell"><?=$glicose["valor"]?></div>
                                            <div class="glucose-history__table-cell glucose-history__table-cell--date l-table-cell"><?=$glicose["data"]?></div>
                                            <div class="glucose-history__table-cell glucose-history__table-cell--time l-table-cell"><?=$glicose["hora"]?></div>
                                            <div class="glucose-history__table-cell glucose-history__table-cell--condition l-table-cell"><span><?=$glicose["condicao"]?></span></div>
                                            <div class="glucose-history__table-cell glucose-history__table-cell--comment l-table-cell"><?=($glicose["comentario"] == "" || str_replace(" ","",$glicose["comentario"]) == "") ? '--' : $glicose["comentario"]?></div>
                                        </div><!--fim da linha da tabela-->
                                    <?php
                                            endforeach;
                                        }
                                    ?>
                                    </div><!--fim do table row group-->

                                </div><!--fim da tabela-->
                                </div>

                                <div class="glucose-history__pagination l-flex l-flex-align-center l-flex-justify-end <?=($glicoses == NULL || empty($glicoses)) ? 'is-none' : ''?>">
                                    <button class="glucose-history__pagination-btn glucose-history__pagination-btn--start is-none" onclick="pesquisarGlicoses(<?=$_SESSION['id_usuario']?>,<?=$limite?>,1)">Início</button>
                                    <button class="glucose-history__pagination-btn glucose-history__pagination-btn--previous is-none" onclick="pesquisarGlicoses(<?=$_SESSION['id_usuario']?>,<?=$limite?>,<?=$pagina-1 < 1 ? 1 : $pagina-1?>)"><<</button>
                                    <span class="glucose-history__pagination-span"><?=($inicio+1)." - $qtdGlicoses de $totalGlicoses"?></span>
                                    <button class="glucose-history__pagination-btn glucose-history__pagination-btn--next <?=$pagina >= $paginas ? 'is-none' : ''?>" onclick="pesquisarGlicoses(<?=$_SESSION['id_usuario']?>,<?=$limite?>,<?=$pagina+1 > $paginas ? $paginas : $pagina+1?>)">>></button>
                                    <button class="glucose-history__pagination-btn glucose-history__pagination-btn--end <?=$pagina >= $paginas ? 'is-none' : ''?>" onclick="pesquisarGlicoses(<?=$_SESSION['id_usuario']?>,<?=$limite?>,<?=$paginas?>)">Fim</button>
                                </div>

                            </div><!--fim do glucose-history__table-container-->
                            
                            
                            <p id="glucoses-void" class="glucose-history__text <?=($glicoses != NULL && !empty($glicoses)) ? 'is-none' : ''?>">Nenhum registro encontrado!</p>
                    </div><!--fim do histórico de glicoses-->
                </div><!--fim do content main-->
            </section>
        </main>


        <!--ÁREA DE SCRIPS EM JS-->
        <script src="../js/pages/home/editar-comentario-glicose.js"></script>
        <script src="../js/pages/home/excluir-glicose.js"></script>
        <script src="../js/pages/home/visualizar-glicose.js"></script>
        <script src="../js/pages/home/registrar-glicose.js"></script>
        <script src="../js/pages/home/ultima-glicose.js"></script>
        <script src="../js/pages/home/exibir-dados-importantes.js"></script>
        <script src="../js/pages/home/pesquisar-glicoses.js"></script>
        <script src="../js/remove-espacos-brancos.js"></script>
        <script src="../js/sidebar.js"></script>
        <script src="../js/user-options.js"></script>
        <script src="../js/alerta.js"></script>
        <script src="../js/overlay.js"></script>
        <script src="../js/confirmacao.js"></script>
        <script>
            //FUNÇÃO QUE INSERE A DATA E HORA ATUAL NOS INPUTS
            function atualizaDataHora() {
                let inputData = document.getElementById("data");
                let inputHora = document.getElementById("hora");

                let agora = new Date();
                let dataLocal = agora.toLocaleDateString("pt-BR");

                let dia = dataLocal.split("/")[0];
                let mes = dataLocal.split("/")[1];
                let ano = dataLocal.split("/")[2];

                let data = `${ano}-${mes}-${dia}`;
                let hora = agora.toLocaleTimeString("pt-BR", { hour: "2-digit", minute: "2-digit" });

                inputData.value = data;
                inputHora.value = hora;
            }

            //MUDA A QUANTIDADE DE REGISTROS POR PÁGINA
            let select = document.getElementById("quantidade-registros");
            select.addEventListener("change",() => {
                pesquisarGlicoses(<?=$_SESSION["id_usuario"]?>,select.value,1);
            });

            //DESABILITA O COMENTÁRIO QUANDO FECHA O OVERLAY
            document.querySelector('.overlay-backdrop').addEventListener('click', () => {
                if(!document.getElementById("detalhes-glicose").contains(event.target)){
                    desabilitarComentario();
                }
            });
        </script>

    </body>

</html>