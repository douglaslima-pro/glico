<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/font.css">
        <link rel="stylesheet" href="../css/aviso-na-tela.css">
        <link rel="stylesheet" href="../css/home.css">
        <title>Glico - Home</title>
    </head>

    <body onload="aviso('<?php if(isset($_GET['msg'])){echo $_GET['msg'];}else{echo null;}?>')">
        
        <?php
            session_start();
            //se o usuário NÃO estiver logado, ele é mandado para a página de login
            if(!isset($_SESSION["id_usuario"])){
                header("location:login.php?msg=erro:<b>Erro</b><br>Faça login!");
            }
        ?>

        <!--MENSAGEM DE AVISO QUE SURGE NO TOPO DA TELA-->
        <div class="aviso-na-tela" id="sucesso" onclick="fechaAviso()">
            <svg class="success-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
            <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
            <svg class="info-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 192 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M48 80a48 48 0 1 1 96 0A48 48 0 1 1 48 80zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z"/></svg>
            <p id="mensagem"></p>
        </div>

        <main>

            <section class="tela-registrar-glicemia">
                <div class="transparent-background"></div>
                <div class="registrar-glicemia-form-container">
                    <span class="fechar-btn">X</span>
                    <h2>Registrar glicemia</h2>
                    <p>Preencha os campos obrigatórios e clique em "Registrar".</p>
                    <form action="" class="registrar-glicemia-form">
                        <div>
                            <label for="condicao">Condição</label>
                            <select name="condicao" id="condicao">
                                <option value="">Nenhum</option>
                                <option value="Jejum">Jejum</option>
                                <option value="Antes da refeição">Antes da refeição</option>
                                <option value="2h após a refeição">2h após a refeição</option>
                                <option value="Antes de dormir">Antes de dormir</option>
                            </select>
                        </div>

                        <p>Você pode editar a data e a hora do registro.</p>

                        <div class="input-data-hora-container">
                            <div class="input-data-container">
                                <label for="data">Data</label>
                                <input type="date" id="data" name="data" required>
                            </div>
                            <div class="input-hora-container">
                                <label for="hora">Hora</label>
                                <input type="time" id="hora" name="hora" required>
                            </div>
                        </div>

                        <div>
                            <label for="comentario">Comentário</label>
                            <textarea name="comentario" id="comentario" rows="5" maxlength="500" placeholder="Exemplo: Apliquei 20ui de insulina fixa e comi uma maçã (120g)."></textarea>
                        </div>

                        <div class="input-valor-container">
                            <label for="valor">Valor:</label>
                            <input type="number" id="valor" name="valor" required> mg/dL
                        </div>

                        <input type="submit" value="Registrar">
                    </form>
                </div>
            </section>

            <!--BARRA LATERAL COM LINKS PARA OUTRAS PÁGINAS DO SITE-->
            <aside>
                <nav>
                    <ul>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/></svg>
                                <h3>Relatórios</h3>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg>
                                <h3>Controle diário</h3>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!--CONTEÚDO PRINCIPAL DA PÁGINA-->
            <section class="conteudo-principal">
                <header>
                    <h1>Glico</h1>
                    <div class="user-options-container">
                        <div class="profile-picture-container" id="esconde-user-options">
                            <img src="<?=$_SESSION['foto']?>" alt="Foto de perfil do usuário" class="profile-picture" title="<?=$_SESSION['nome']?>">
                            <nav class="user-options">
                                <h4><?=explode(" ",$_SESSION['usuario'])[0]?></h4>
                                <ul>
                                    <li><a href="perfil.php">Editar perfil</a></li>
                                    <li><a href="../../controller/sair.php">Sair</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="hamburguer-btn">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </header><!--fim do cabeçalho-->

                <!--CONTEÚDO PRINCIPAL DA SECTION-->
                <div class="conteudo-principal-container">

                    <div class="registrar-glicemia-card">
                        <h3>Que tal,<br>
                        registrar a sua glicemia <span>agora</span>?</h3>
                        <p>Última glicemia registrada: 167 mg/dL</p>
                        <div class="registrar-btn-container">
                            <button class="registrar-btn">Registrar glicemia</button>
                        </div>
                    </div>

                    <div class="dados-importantes-container">
                        <div class="topico">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"/></svg>
                            <h2>Dados importantes (últimos 30 dias)</h2>
                        </div>
                        <div class="dados-importantes-cards">
                            <div class="card">
                                <p>Glicemia média</p>
                                <span>176 mg/dL</span>
                            </div>
                            <div class="card">
                                <p>Hipoglicemias</p>
                                <span>7%</span>
                            </div>
                            <div class="card">
                                <p>Hiperglicemias</p>
                                <span>15%</span>
                            </div>
                        </div>
                    </div>

                    <div class="historico-glicemias-container">
                        <div class="topico">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            <h2>Histórico de glicemias</h2>
                        </div>
                        <div class="tableless">
                            <div class="tableless-th">
                                <div class="tableless-td visualizar">Visualizar</div>
                                <div class="tableless-td valor">Valor (mg/dL)</div>
                                <div class="tableless-td data">Data</div>
                                <div class="tableless-td hora">Hora</div>
                                <div class="tableless-td condicao">Condição</div>
                                <div class="tableless-td comentario">Comentário</div>
                            </div>
                            <div class="tableless-tr" id="glicemia01">
                                <div class="tableless-td visualizar">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 480h48c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224H144c-11.4 0-21.9 6-27.6 15.9L48 357.1V96c0-8.8 7.2-16 16-16H181.5c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8H416c8.8 0 16 7.2 16 16v32h48V160c0-35.3-28.7-64-64-64H298.5c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H87.7 384z"/></svg>
                                </div>
                                <div class="tableless-td valor">167</div>
                                <div class="tableless-td data">11/01/2023</div>
                                <div class="tableless-td hora">09:27</div>
                                <div class="tableless-td condicao"><span>Antes da refeição</span></div>
                                <div class="tableless-td comentario">Eu apliquei 10ui de insulina ultrarrápida. Comi um pão e tomei uma chícara de café</div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </main><!--fim do main-->

        <!--ÁREA DE SCRIPS EM JS-->
        <script src="../js/aviso-na-tela.js"></script>
        <script>
            let profilePictureContainer = document.querySelector(".profile-picture-container");
            let profilePicture = document.querySelector(".profile-picture");
            let userOptions = document.querySelector(".user-options");

            //Esconde as opções de usuário quando clica fora
            window.addEventListener('click', () => {
                if(!profilePictureContainer.contains(event.target)){
                    profilePictureContainer.id = "esconde-user-options";
                    console.log("clique fora");
                }
            });

            //Esconde as opções de usuário quando gira o scroll da section
            document.querySelector("main > section").onscroll = () => {
                profilePictureContainer.id = "esconde-user-options";
                console.log("scrolling...");
            };

            //mostra e esconde as opções de usuário quando clica na foto de perfil
            profilePicture.addEventListener('click', () => {
                if(profilePictureContainer.id == "esconde-user-options"){
                    profilePictureContainer.id = "mostra-user-options";
                }else{
                    profilePictureContainer.id = "esconde-user-options";
                }
            });

        </script>

    </body>

</html>