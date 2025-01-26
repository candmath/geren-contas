<html lang="pt-br">
    <head>
        <title>Cadastrar - GerenContas</title>
        <?php
            require "modules/libraries.php";
        ?>
        <style>
            .specialFont {
                font-family: 'Oswald', sans-serif;    
            }
            #signUpButton i {
                margin-right: 5px;
            }
            #signUpButtonDiv {
                margin-top: 15px;
            }
            #linkSignIn {
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
            #end {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <main id="mainContent">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="specialFont"><i class="far fa-user-plus fa-fw marginIcon"></i>Cadastro</h1>
                    <p>Para cadastrar uma nova conta, preencha algumas informações abaixo.
                    <?php
                        if (!empty($_GET["msg"])){
                            if ($_GET["msg"] == 1){
                                echo "<span class='fw-bold text-danger'>Senha não digitada corretamente!</span>";
                            } else if ($_GET["msg"] == 2){
                                echo "<span class='fw-bold text-danger'>Esse e-mail já está cadastrado!</span>";
                            }
                        }
                    ?>
                    </p>
                    <form name="signUpForm" method="post" action="forms/sign-up/signUpForm.php" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Nome" required="required" name="nome" id="inputName" maxlength="50">
                                    <label for="inputName"><i class="far fa-id-card fa-fw marginIcon"></i>Nome</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Sobrenome" required="required" name="sobrenome" id="inputSobrenome" maxlength="50">
                                    <label for="inputSobrenome"><i class="far fa-id-card fa-fw marginIcon"></i>Sobrenome</label>
                                </div>
                            </div>
                        </div>         
                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" placeholder="E-mail" required="required" name="email" id="inputEmail" maxlength="100">
                            <label for="inputEmail"><i class="far fa-envelope fa-fw marginIcon"></i>E-mail</label>
                        </div> 
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="password" placeholder="Senha" required="required" name="senha" id="inputPassword" maxlength="20">
                                    <label for="inputPassword"><i class="far fa-key fa-fw marginIcon"></i>Senha</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="password" placeholder="Repetir senha" required="required" name="repetirSenha" id="inputRepeatPassword" maxlength="20">
                                    <label for="inputRepeatPassword"><i class="far fa-key fa-fw marginIcon"></i>Repetir senha</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputFile" title="Trocar foto de usuário"><i class="far fa-camera fa-fw"></i></label>
                            <input type="file" class="form-control" name="fotoPerfilInputFile">
                        </div>
                        <div>
                            <p>Quando tiver terminado de inserir suas informações, clique em "Confirmar cadastro" para criar sua conta.</p>
                            <input class="btn btn-outline-primary float-end" id="signUpButton" type="submit" value="Confirmar cadastro" title="Efetuar cadastro" name="submitSignUp">                   
                            <a href="sign-in.php" id="linkSignIn" class="btn btn-outline-dark float-end">Entrar</a>
                        </div>
                    </form>   
                </div>
            </div>
        </main>
    </body>
</html>