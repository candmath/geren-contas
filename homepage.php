<html lang="pt-br">
<head>
    <title>Início - GerenContas</title>
    <?php
        require "modules/libraries.php";
    ?>
    <style>
        .containerWallpaper {
            position: relative;
            text-align: center;
            color: white;
        }
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #loginButtons a {
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        #loginButtons a i {
            margin-right: 5px;
        } 
        #aboutButton {
            border-style: none;
            margin-top: 10px;
        }
        #aboutButton i {
            margin-right: 5px;
        }
        #about {
            margin-top: 10px;
            margin-left: 10px;
            margin-right: 10px;
        }
        #wallpaper {
            filter: blur(3px);
            width: 100%;
            height: 100%;
        }
        .specialFont {
            font-family: 'Oswald', sans-serif;
        }
        .text-center {
            margin-bottom: 0px;
        }
        .clearfix i {
            margin-right: 5px; 
        }
        .clearfix p {
            font-size: 18px;
        }
        .card-header .card-title {
            margin-bottom: 0px;
        }
        #zero {
            margin-bottom: 0px;
        }
        </style>
    </head>
    <body>
        <!-- IMG AND CENTERED TEXT -->
        <div class="containerWallpaper">
            <img src="img/wallpaper.jpg" id="wallpaper" alt="Imagem de floresta">
            <div class="centered">
                <h1 class="text-center specialFont">GerenContas</h1>
                <span class="display-6">Um site para todas as suas contas.</span><br>
                <div id="loginButtons">
                    <a href="sign-in.php" class="btn btn-outline-light" title="Entrar"><i class="far fa-sign-in fa-fw"></i>Entrar</a>
                    <a href="sign-up.php" class="btn btn-outline-light" title="Criar conta"><i class="far fa-user-plus fa-fw"></i>Cadastrar</a>
                </div>
                <?php
                    if (!empty($_GET["msg"])){
                        if ($_GET["msg"] == 1){
                            echo "<p class='fw-bold text-danger' id='zero'>Sessão inválida!</p>";
                        } else if ($_GET["msg"] == 2){
                            echo "<p class='fw-bold text-success' id='zero'>Exclusão de conta feita com sucesso!</p>";
                        } else {
                            echo "<p class='fw-bold text-success' id='zero'>Log-out feito com sucesso!</p>";
                        }
                    }
                ?>
                <a href="#aboutProject" id="aboutButton" class="btn btn-outline-light" title="Saiba mais"><i class="far fa-info-circle fa-fw"></i>Clique aqui para saber mais sobre o site</a>
            </div>
        </div>
        <div id="about">       
            <div class="row row-cols-1 row-cols-md-2 g-4" id="aboutProject">
                <div class="col-sm-6">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <h2 class="specialFont"><i class="far fa-question fa-fw"></i>O que é o nosso site?</h2>
                                <p class="card-text">O <strong>GerenContas</strong> é um site para internet focado em organizar as contas que os usuários criam na internet nos dias atuais, e também para ajudá-los na utilização dessas contas.</p>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <h2 class="specialFont"><i class="far fa-tasks fa-fw"></i>Quais são os objetivos do site?</h2>
                                <p class="card-text">- Oferecer para os usuários um meio para poder visualizar suas contas da internet;<br>- Ajudá-lo à melhor utilizar essas contas, através de dicas criadas pelos administradores.</p>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow h-100"> 
                        <div class="card-body">
                            <div class="clearfix">
                                <h2 class="specialFont"><i class="far fa-archive fa-fw"></i>Organize suas contas com a Biblioteca</h2>
                                <p class="card-text">Através do simples layout do site, o usuário vai poder visualizar suas contas de maneira fácil e rápida, podendo fazer alterações em um toque!</p>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <h2 class="specialFont"><i class="far fa-lightbulb fa-fw"></i>Tenha acesso as Dicas</h2>
                                <p class="card-text">Receba ajuda através de postagens feitas pelos administradores do site, contendo sugestões de configurações de segurança, novidades de atualizações e muito mais!</p>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            require "modules/footer.php";
        ?>
    </body>
</html>