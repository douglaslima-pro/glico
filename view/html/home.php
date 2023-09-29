<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/font.css">
        <title>Glico - Home</title>
    </head>

    <body>
        
        <?php
            session_start();
            if(!isset($_SESSION["id_usuario"])){
                header("location:login.php?msg=Faça login!");
            }
        ?>

        <main>

            <aside></aside>

            <section>

                <nav>

                    <h1>Glico</h1>

                    <div class="opcoes-usuario"></div>

                </nav>

            </section>

        </main>

    </body>

</html>