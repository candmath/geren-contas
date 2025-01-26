<?php 
    session_start();
    if (empty($_COOKIE["cookie_logado"]) || empty($_SESSION["nome"])){
        header("Location: homepage.php?msg=1");
    }
?>
<html lang="pt-br">
    <head>
        <title>Contas - GerenContas</title>
        <?php
            require "modules/libraries.php";
        ?>
        <style>
            #addButton {
                margin-right: 10px;
            }
            #divAddButton {
                width: 100%;
                height: 45px;
            }
            #mainContent {
                margin-right: 10px; 
                margin-left: 10px; 
                margin-top: 0px;
            }
            #mainContent .col {
                margin-top: 0px;
            }
            .card-header .card-title {
                margin-bottom: 0px;
            }
            .card-text {
                margin-bottom: 10px;
            }
            #buttonsCard {
                margin-top: 5px;
            }
            #buttonsCard button {
                height: 40px;
            }
            .iconMargin {
                margin-right: 5px;
            }
            #textareaDesc {
                height: 100px;
            }
            #successText {
                border-style: none;
                margin-right: 5px;
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
        <!-- ADD BUTTON -->
        <div id="divAddButton">
            <button class="btn btn-outline-dark float-end" id="addButton" type="button" title="Adicionar conta" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i class="far fa-plus iconMargin"></i>Adicionar conta</button>
            <?php
                if (!empty($_GET["accstatus"])){
                    if ($_GET["accstatus"] == 1){
                        echo "<strong class='btn btn-outline-success float-end fw-bold' id='successText'>Conta criada com sucesso!</strong>";
                    }
                    if ($_GET["accstatus"] == 2){
                        echo "<strong class='btn btn-outline-success float-end fw-bold' id='successText'>Log-in efetuado com sucesso!</strong>";
                    }
                }
            ?>
        </div>
        <!-- MAIN - CARDS AREA -->
        <main class="row row-cols-1 row-cols-md-2 g-4" id="mainContent">
            <!-- CARD -->
            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h2 class="card-title specialFont">Nome do site</h2>
                        <h6 class="card-subtitle">emaildeexemplo@teste.com.br</h6>
                        <p class="card-text">Pequena descrição da utilização da conta desse site.</p>
                        <div id="buttonsCard">
                            <!-- BUTTONS -->
                            <button class="btn btn-outline-primary" type="button" title="Ver senha" data-bs-toggle="modal" data-bs-target="#seePasswordModal"><i class="far fa-key fa-fw iconMargin"></i>Ver senha</button>
                            <button class="btn btn-outline-primary"  type="button" title="Editar informações" data-bs-toggle="modal" data-bs-target="#editAccountModal"><i class="far fa-edit fa-fw"></i></button>         
                            <button class="btn btn-outline-danger" type="button" title="Excluir conta" data-bs-toggle="modal" data-bs-target="#deleteAccountModal"><i class="far fa-trash fa-fw"></i></button>   
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- SEE PASSWORD MODAL -->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="seePasswordModal" tabindex="-1" aria-labelledby="seePasswordModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="seePasswordModalLabel"><i class="far fa-key fa-fw iconMargin"></i>Ver senha de "Nome do site"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="seePasswordForm" method="post" action="forms/accounts/seePasswordForm.php">
                            <?php
                                if (empty($_GET["seepassword"])){
                                    echo "<p><strong>Senha: </strong><i>Confirme sua senha antes!</i></p>";
                                } else {
                                    if ($_GET["seepassword"] == 1){
                                        echo "<p><strong>Senha: </strong><span class='fw-bold text-danger'>Senha incorreta!</span></p>";
                                    } else if ($_GET["seepassword"] == 2){
                                        echo "<p><strong>Senha: </strong>".$_SESSION['senha']."</p>";
                                    }
                                }
                            ?>
                            <p>Para ver a senha dessa conta, confirme sua senha abaixo.</p>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" placeholder="Senha" required="required" name="senhaSeePassword" id="inputSeePassword" maxlength="20">
                                <label for="inputSeePassword"><i class="far fa-key fa-fw iconMargin"></i>Senha do GerenContas</label>
                            </div>  
                            <p>Após ter digitado sua senha, clique em "Ver senha".</p>
                            <div class="float-end">
                                <input class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" value="Cancelar">
                                <input class="btn btn-outline-primary" type="submit" value="Ver senha" name="submitSeePassword">
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- EDIT ACCOUNT MODAL -->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAccountModalLabel"><i class="far fa-edit fa-fw iconMargin"></i>Editar dados de "Nome do site"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Edite abaixo as informações dessa conta.</p>
                        <form name="editAccountForm" method="post" action="forms/accounts/editAccountForm.php">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" placeholder="Nome do site" name="nomeEdit" id="inputNameEdit" maxlength="20">
                                <label for="inputNameEdit"><i class="far fa-globe fa-fw iconMargin"></i>Nome do site</label>
                            </div>          
                            <div class="form-floating mb-3">
                                <input class="form-control" type="email" placeholder="E-mail" name="emailEdit" id="inputEmailEdit" maxlength="100">
                                <label for="inputEmailEdit"><i class="far fa-envelope fa-fw iconMargin"></i>E-mail</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="textareaDescEdit" placeholder="Pequena descrição da utilização dessa conta" name="descEdit" maxlength="100"></textarea>
                                <label for="textareaDescEdit"><i class="far fa-info-circle fa-fw iconMargin"></i>Descrição</label>
                            </div>
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="password" placeholder="Nova senha" name="senhaEdit" id="inputPasswordEdit" maxlength="20">
                                        <label for="inputPasswordEdit"><i class="far fa-key fa-fw iconMargin"></i>Nova senha</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="password" placeholder="Repetir nova senha" name="repetirSenhaEdit" id="inputPassword2Edit" maxlength="20">
                                        <label for="inputPassword2Edit"><i class="far fa-key fa-fw iconMargin"></i>Repetir nova senha</label>
                                    </div>
                                </div>
                            </div> 
                            <p><strong>Obs.:</strong> para não alterar um campo, basta não modificá-lo.</p>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" placeholder="Senha do GerenContas" name="senhaConta" id="inputPassword3Edit" required="required" maxlength="20">
                                <label for="inputPassword3Edit"><i class="far fa-key fa-fw iconMargin"></i>Senha do GerenContas</label>
                            </div> 
                            <p>Antes de confirmar a alteração dos dados dessa conta, confirme sua senha acima. Quando tiver feito as alterações desejadas, clique em "Confirmar alterações".</p>
                            <div class="float-end">
                                <input class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" value="Cancelar">
                                <input class="btn btn-outline-primary" type="submit" value="Confirmar alterações" name="submitEdit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- DELETE ACCOUNT MODAL -->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel"><i class="far fa-trash fa-fw iconMargin"></i>Excluir dados de "Nome do site"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Para excluir essa conta, confirme sua senha:</p>
                        <form name="deleteAccountForm" method="post" action="forms/accounts/deleteAccountForm.php">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" placeholder="Senha" required="required" name="senhaDelete" id="inputPasswordDelete" maxlength="20">
                                <label for="inputPasswordDelete"><i class="far fa-key fa-fw iconMargin"></i>Senha do GerenContas</label>
                            </div> 
                            <p>Você realmente deseja excluir as informações de "Nome do site"? Você <strong>não</strong> poderá recuperá-las posteriormente! Caso queira continuar a exclusão dessa conta, clique em "Confirmar exclusão".</p>   
                            <div class="float-end">
                                <input class="btn btn-outline-primary" data-bs-dismiss="modal" type="button" value="Cancelar">
                                <input class="btn btn-outline-danger" type="submit" value="Confirmar exclusão" name="submitDelete">
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>     
        <!-- ADD ACCOUNT MODAL -->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAccountModalLabel"><i class="far fa-plus fa-fw iconMargin"></i>Adicionar dados do site</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="addAccountForm" method="post" action="forms/accounts/addAccountForm.php">
                            <p>Digite abaixo as informações da conta que você deseja adicionar.</p>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" placeholder="Nome do site" required="required" name="nomeAdd" id="inputName" maxlength="20">
                                <label for="inputName"><i class="far fa-globe fa-fw iconMargin"></i>Nome do site</label>
                            </div>          
                            <div class="form-floating mb-3">
                                <input class="form-control" type="email" placeholder="E-mail" required="required" name="emailAdd" id="inputEmail" maxlength="100">
                                <label for="inputEmail"><i class="far fa-envelope fa-fw iconMargin"></i>E-mail</label>
                            </div>                                                 
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="textareaDesc" placeholder="Pequena descrição da utilização dessa conta" name="descAdd" maxlength="100"></textarea>
                                <label for="textareaDesc"><i class="far fa-info-circle fa-fw iconMargin"></i>Descrição</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" placeholder="Senha" name="senhaAdd" id="inputPassword" maxlength="20">
                                <label for="inputPassword"><i class="far fa-key fa-fw iconMargin"></i>Senha do site</label>
                            </div> 
                            <p>Quando tiver terminado, clique em "Adicionar informações".</p>
                            <div class="float-end">
                                <input class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" value="Cancelar">
                                <input class="btn btn-outline-danger" type="reset" value="Limpar informações">
                                <input class="btn btn-outline-primary" type="submit" value="Adicionar informações" name="submitAdd">     
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            require "modules/footer.php";           
        ?>
    </body>
</html>