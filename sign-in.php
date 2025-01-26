<html lang="pt-br">
    <head>
        <title>Entrar - GerenContas</title>
        <?php
            require "modules/libraries.php";
        ?>
        <style>
         
            .specialFont {
                font-family: 'Oswald', sans-serif;    
            }
            #signInButton i {
                margin-right: 5px;
            }
            #signInButtonDiv {
                margin-top: 15px;
            }
            #linkSignUp {
                margin-right: 5px;
            }
            #mainContent {
                margin: 50px;
            }
            .marginIcon {
                margin-right: 5px;
            }
            .specialFont a {
                color: black;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <main id="mainContent">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="specialFont"><i class="far fa-sign-in fa-fw marginIcon"></i>Entrar</h1>
                    <p>Para entrar, preencha algumas informações abaixo.
                    <?php 
                        if (!empty($_GET["msg"])){ 
                            echo "<span class='fw-bold text-danger'> E-mail ou senha inválidos!</span>"; 
                        } 
                    ?>
                    </p>
                    <form name="signInForm" method="post" action="forms/sign-in/signInForm.php">
                        <div class="form-floating mb-3">
                            <input id="inputEmail" class="form-control" placeholder="E-mail" type="email" required="required" name="email" maxlength="100">
                            <label for="inputEmail"><i class="far fa-envelope fa-fw marginIcon"></i>E-mail</label>
                        </div> 
                        <div class="form-floating mb-3">
                            <input id="inputPassword" class="form-control" placeholder="Senha" type="password" required="required" name="senha" maxlength="20">
                            <label for="inputPassword"><i class="far fa-key fa-fw marginIcon"></i>Senha</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="flexCheckDefault" name="typeUser">
                            <label class="form-check-label" for="flexCheckDefault"><i class="far fa-user-cog fa-fw marginIcon"></i><strong>[WIP]: </strong>O usuário que está acessando administra o sistema?</label>
                        </div>
                        <input class="btn btn-outline-primary float-end" id="signInButton" type="submit" value="Entrar" name="submitSignIn">
                            <a id="linkSignUp" class="btn btn-outline-dark float-end" href="sign-up.php">Criar conta</a>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>