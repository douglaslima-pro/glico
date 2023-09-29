<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/font.css">
        <link rel="stylesheet" href="../css/cadastro.css">
        <title>Glico - Cadastro</title>
    </head>

    <body>

        <main>
            <section>
                <div class="descricao">
                    <h1>Glico</h1>
                    <p>O Glico fornece insights úteis para tomar decisões no tratamento da sua diabetes.</p>
                    <p>Descubra um jeito fácil de manter o controle da sua glicemia!</p>
                </div>
            </section>

            <aside>

                <a href="login.php">Voltar para login</a>

                <form action="../../controller/cadastrarUsuario.php" method="POST" class="cadastro-form">

                    <h2>Cadastre-se</h2>

                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" maxlength="60" required>

                    <div class="cpf-nascimento-container flex-input-container">
                        <div class="input-cpf">    
                            <label for="cpf">CPF (opcional)</label>
                            <input type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" oninput="mascaraCPF('cpf')">
                        </div>
                        <div class="input-nascimento">
                            <label for="nascimento">Data de nascimento</label>
                            <input type="date" id="nascimento" name="data_nascimento">
                        </div>
                    </div>

                    <h3>Informações de acesso</h3>

                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" maxlength="100" required>
                    <!--Em uma implementação futura, o sistema deve verificar de forma assíncrona se o endereço de e-mail já está em uso-->
                    <span class="aviso-email-em-uso" hidden>* E-mail já está em uso!</span>
                    
                    <label for="usuario">Nome de usuário</label>
                    <input type="usuario" id="usuario" name="usuario" maxlength="30" required>
                    <!--Em uma implementação futura, o sistema deve verificar de forma assíncrona se o nome de usuário já existe no banco de dados-->
                    <span class="aviso-usuario-existe" hidden>* Nome de usuário já está em uso!</span>
                    
                    <div class="senha-container">
                        <div class="flex-input-container">   
                            <label for="senha" class="label-senha">
                                Senha *
                                <div class="input-senha input-senha-container" id="esconde-senha">
                                    <input type="password" id="senha" name="senha" minlength="4" maxlength="30" onkeyup="comparaSenhas('senha','confirma-senha','cadastrar-btn')" required>
                                    <div class="icone-senha" onclick="mostraEscondeSenha('.input-senha-container')"></div>
                                </div>
                            </label>
                            <label for="confirma-senha" class="label-confirma-senha">
                                Confirme a senha *
                                <div class="input-senha input-confirma-senha-container" id="esconde-senha">
                                    <input type="password" id="confirma-senha" minlength="4" maxlength="30" onkeyup="comparaSenhas('senha','confirma-senha','cadastrar-btn')" required>
                                    <div class="icone-senha" onclick="mostraEscondeSenha('.input-confirma-senha-container')"></div>
                                </div>
                            </label>
                        </div>
                        <span class="aviso-senhas-nao-coincidem">* As senhas não coincidem!</span>
                    </div>

                    <div class="submit-container">
                        <input type="submit" name="submit" id="cadastrar-btn" value="CADASTRAR-SE" class="cadastrar-btn">
                    </div>
                </form>
            </aside>
        </main>

        <script src="../js/mascara-cpf.js"></script>
        <script src="../js/compara-senhas.js"></script>
        <script src="../js/mostrar-esconder-senha.js"></script>
        
    </body>

</html>