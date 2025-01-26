<?php
    session_start();
    if (empty($_COOKIE["cookie_logado"]) || empty($_SESSION["nome"])){
        header("Location: homepage.php?msg=1");
    }
?>
<html lang="pt-br">
    <head>
        <title>Dicas - GerenContas</title>
        <?php
            require "modules/libraries.php";
        ?>
        <style>
            .buttonNotification {
                margin-top: 5px;
            }
            .buttonNotification i {
                margin-right: 5px;
            }
            #mainContent {
                margin-right: 10px; 
                margin-left: 10px;
            }
            .card-header .card-title {
                margin-bottom: 0px;
            }
            .card-title i {
                margin-right: 5px;
                margin-bottom: 0px;
            }
            .card-text {
                margin-top: 0px;
                margin-bottom: 0px;
            }
            .imgTip {
                margin-bottom: 5px;
            }
            .specialFont {
                font-family: 'Oswald', sans-serif;
            }
        </style>
    </head>
    <body>
        <?php
            require "modules/navbar.php";
        ?>
        <!-- MAIN - NOTIFICATIONS AREA -->
        <main id="mainContent">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h2 class="specialFont">Título da dica</h2>
                            <img src="img/wallpaper.jpg" class="img-fluid imgTip" alt="Imagem de topo de notícia">
                            <p class="card-text">Descrição dessa sugestão. Nesse texto vai ser explicado um breve contexto da notícia, tendo algum fato importante como destaque.</p>
                            <a class="btn btn-outline-primary buttonNotification" title="Ver notícia"><i class="far fa-newspaper fa-fw"></i>Ver notícia</a>
                            <a class="btn btn-outline-primary buttonNotification" title="Acessar site"><i class="far fa-external-link fa-fw"></i>Acessar "nome do site"</a>                     
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
            require "modules/footer.php";
        ?>
    </body>
</html>