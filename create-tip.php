<?php
    session_start();
?> 
<html>
    <head>
        <?php
            require "modules/libraries.php";
        ?>
        <title>Administrador - GerenContas</title>
        <style>
            /* CARDS */
            .buttonNotification {
                margin-top: 5px;
            }
            .buttonNotification i {
                margin-right: 5px;
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
            /* MAIN */
            #mainContent {
                margin-right: 10px; 
                margin-left: 10px;
            }
            /* ADD BUTTON */
            #addButton {
                margin-right: 10px;
            }
            #divAddButton {
                width: 100%;
                height: 45px;
                margin-bottom: 20px;
            }
            #successText {
                border-style: none;
                margin-right: 5px;
            }
            /* ICON MARGIN */
            .iconMargin {
                margin-right: 5px;
            }
        </style>
    </head>
    <body>
        <?php
            require "modules/admin-navbar.php";
        ?>
        <div id="divAddButton">
            <button class="btn btn-outline-dark float-end" id="addButton" type="button" title="Adicionar dica" data-bs-toggle="modal" data-bs-target="#addTipModal"><i class="far fa-plus iconMargin"></i>Adicionar dica</button>
            <?php
                if (!empty($_GET["accstatus"])){
                    if ($_GET["accstatus"] == 1){
                        echo "<strong class='btn btn-outline-success float-end fw-bold' id='successText'>Log-in efetuado com sucesso!</strong>";
                    }
                }
            ?>
        </div>
        <main class="row row-cols-1 row-cols-md-2 g-4" id="mainContent">
            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <h5 class="card-title">Título da notícia</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/wallpaper.jpg" class="img-fluid imgTip" alt="Imagem de topo de notícia">
                        <p class="card-text">Descrição dessa sugestão. Nesse texto vai ser explicado um breve contexto da notícia, tendo algum fato importante como destaque.</p>
                        <a class="btn btn-outline-primary buttonNotification" data-bs-toggle="modal" data-bs-target="#editTipModal" title="Editar dica"><i class="far fa-edit fa-fw"></i>Editar dica</a> 
                        <a class="btn btn-outline-danger buttonNotification" data-bs-toggle="modal" data-bs-target="#deleteTipModal" title="Excluir dica"><i class="far fa-trash fa-fw"></i>Excluir dica</a>                    
                    </div>
                </div>
            </div>
            <!-- EDIT TIP MODAL -->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="editTipModal" tabindex="-1" aria-labelledby="editTipModalLabel">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editTipModalLabel"><i class="far fa-edit fa-fw iconMargin"></i>Editar dica</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="editTipForm" method="post" action="forms/create-tip/editTipForm.php" enctype="multipart/form-data">
                                <p>Para editar as informações dessa dica, altere os campos abaixo.</p>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Título" name="tituloEditTip" id="inputTituloEditTip" maxlength="30">
                                    <label for="inputTituloEditTip"><i class="far fa-lightbulb fa-fw iconMargin"></i>Título da dica</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Link da notícia" name="linkNoticiaEditTip" id="inputLinkNoticiaEditTip" maxlength="300">
                                    <label for="inputLinkNoticiaEditTip"><i class="far fa-link fa-fw iconMargin"></i>Link da notícia</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Link para acessar o site" name="linkSiteEditTip" id="inputLinkSiteEditTip" maxlength="300">
                                    <label for="inputLinkSiteEditTip"><i class="far fa-link fa-fw iconMargin"></i>Link para acessar o site</label>
                                </div> 
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputFileEditTip" title="Trocar foto de destaque da dica"><i class="far fa-camera fa-fw"></i></label>
                                    <input type="file" class="form-control" id="inputFileEditTip" name="fotoPerfilEditTip">
                                </div>  
                                <p>Após ter feito as alterações desejadas, clique em "Confirmar alterações".</p>
                                <div class="float-end">
                                    <input class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" value="Cancelar">
                                    <input class="btn btn-outline-primary" type="submit" value="Confirmar alterações" name="submitEditTip">
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--DELETE TIP MODAL -->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="deleteTipModal" tabindex="-1" aria-labelledby="deleteTipModalLabel">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteTipModalLabel"><i class="far fa-trash fa-fw iconMargin"></i>Excluir dica</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="deleteTipForm" method="post" action="forms/create-tip/deleteTipForm.php">
                                <p>Para deletar essa notícia, confirme sua senha abaixo.</p>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="password" placeholder="Senha" required="required" name="senhaDeleteTip" id="inputSenhaDeleteTip" maxlength="20">
                                    <label for="inputSenhaDeleteTip"><i class="far fa-key fa-fw iconMargin"></i>Senha do GerenContas</label>
                                </div>  
                                <p>Após ter digitado sua senha, clique em "Confirmar exclusão".</p>
                                <div class="float-end">
                                    <input class="btn btn-outline-primary" data-bs-dismiss="modal" type="button" value="Cancelar">
                                    <input class="btn btn-outline-danger" type="submit" value="Confirmar exclusão" name="submitDeleteTip">
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADD TIP MODAL -->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addTipModal" tabindex="-1" aria-labelledby="addTipModalLabel">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTipModalLabel"><i class="far fa-plus fa-fw iconMargin"></i>Adicionar dica</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="addTipForm" method="post" action="forms/create-tip/addTipForm.php" enctype="multipart/form-data">
                                <p>Para adicionar uma dica para a comunidade ver, primeiro você precisa adicionar as seguintes informações.</p>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Título" required="required" name="tituloAddTip" id="inputTituloAddTip" maxlength="30">
                                    <label for="inputTituloAddTip"><i class="far fa-lightbulb fa-fw iconMargin"></i>Título da dica</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Link da notícia" required="required" name="linkNoticiaAddTip" id="inputLinkNoticiaAddTip" maxlength="300">
                                    <label for="inputLinkNoticiaAddTip"><i class="far fa-link fa-fw iconMargin"></i>Link da notícia</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Link para acessar o site" required="required" name="linkSiteAddTip" id="inputLinkSiteAddTip" maxlength="300">
                                    <label for="inputLinkSiteAddTip"><i class="far fa-link fa-fw iconMargin"></i>Link para acessar o site</label>
                                </div> 
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputFileAddTip" title="Trocar foto de destaque da notícia"><i class="far fa-camera fa-fw"></i></label>
                                    <input type="file" class="form-control" id="inputFileAddTip" name="fotoNoticiaAddTip">
                                </div> 
                                <p>Após ter informado as informações da dica, clique em "Adicionar informações".</p>
                                <div class="float-end">
                                    <input class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" value="Cancelar">
                                    <input class="btn btn-outline-danger" type="reset" value="Limpar alterações">
                                    <input class="btn btn-outline-primary" type="submit" value="Adicionar informações" name="submitAddTip">
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <?php
        require "modules/footer.php";
    ?>
</html>
