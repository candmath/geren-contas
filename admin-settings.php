<?php 
    session_start();
    if (empty($_COOKIE["cookie_logado"]) || empty($_SESSION["nome"])){
        header("Location: homepage.php?msg=1");
    }
?>
<html lang="pt-br">
    <head>
        <title>Configurações - GerenContas</title>
        <?php
            require "modules/libraries.php";
        ?>
        <style>
            #profilePictureSettings {
                width: 150px;
                height: 150px;
                margin-right: 10.5px;
            }
            #clearfixContainerAccountSettings p {
                margin-bottom: 2.5px;
                margin-top: 2.5px;
            }
            #clearfixContainerAccountSettings .buttonAboutAccount {
                margin-top: 5px;
            }
            #mainContent {
                margin-right: 10px; 
                margin-left: 10px;
            }
            .card-title i {
                margin-right: 5px;
                margin-bottom: 0px;
            }
            .card-text i {
                margin-right: 5px;
            }
            .card-text {
                margin-bottom: 5px;
            }
            .buttonAboutAccount i {
                margin-right: 5px;
            }
            .card-header .card-title {
                margin-bottom: 0px;
            }
            .card-body #buttonSettingsAccount button {
                margin-top: 5px;
            }
            .keyIcon {
                margin-right: 5px;
            }
        </style>
    </head>
    <body>
        <?php
            require "modules/admin-navbar.php";
        ?>
        <!-- MAIN - SETTINGS AREA -->
        <main class="row row-cols-1 row-cols-md-1 g-4" id="mainContent">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title"><i class="far fa-user-cog"></i>Configurações do Perfil</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (!empty($_GET["msg"])){
                            if ($_GET["msg"] == 1){
                                echo "<p class='card-text'>Veja e edite configurações de seu perfil aqui.<span class='fw-bold text-danger'> Senha não digitada corretamente!</span></p>";
                            } else if ($_GET["msg"] == 2){
                                echo "<p class='card-text'>Veja e edite configurações de seu perfil aqui.<span class='fw-bold text-success'> Alterações feitas com sucesso!</span></p>";
                            }
                        } else {
                            echo "<p class='card-text'>Veja e edite configurações de seu perfil aqui.</p>";
                        }
                        
                        ?>
                        </p>
                        <div id="clearfixContainerAccountSettings" class="clearfix">
                            <img id="profilePictureSettings" src="<?php echo "profile-pictures/current_img".$_SESSION["nome"]; ?>" class="rounded-circle float-start" alt="Foto do usuário">
                            <p class="card-text"><i class="far fa-id-card fa-fw keyIcon"></i><strong>Nome do administrador: </strong><?php echo $_SESSION["nome"]." ".$_SESSION["sobrenome"]; ?></p>
                            <p class="card-text"><i class="far fa-envelope fa-fw keyIcon"></i><strong>E-mail: </strong><?php echo $_SESSION["email"]; ?></p>
                        </div>
                        <div id="buttonSettingsAccount">
                            <button class="btn btn-outline-primary buttonAboutAccount" type="button" title="Editar informações do perfil" data-bs-toggle="modal" data-bs-target="#editPerfilModal"><i class="far fa-user-edit"></i>Editar perfil</button>
                            <button class="btn btn-outline-primary buttonAboutAccount" type="button" title="Editar senha do perfil" data-bs-toggle="modal" data-bs-target="#editPasswordModal"><i class="far fa-key"></i>Editar senha</button>
                            <button class="btn btn-outline-danger buttonAboutAccount" type="button" title="Excluir perfil" data-bs-toggle="modal" data-bs-target="#deletePerfilModal"><i class="far fa-user-slash"></i>Excluir perfil</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>   
        <!-- EDIT PERFIL MODAL -->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  id="editPerfilModal" tabindex="-1" aria-labelledby="editPerfilModal">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="far fa-user-edit keyIcon"></i>Editar perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Edite os campos abaixo para alterar as informações de seu perfil.</p>
                        <form name="editAccountForm" method="post" action="forms/settings/editAccountForm.php" id="editForm" enctype="multipart/form-data">
                            <div class="row g-2"> 
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Novo nome" name="nome" id="inputNameEdit" maxlength="50" <?php if (!empty($_SESSION["nome"])){ echo "value=".$_SESSION["nome"]; } ?> > 
                                        <label for="inputNameEdit"><i class="far fa-id-card fa-fw keyIcon"></i>Nome</label>
                                    </div>  
                                </div> 
                                <div class="col-md">
                                    <div class="form-floating mb-3"> 
                                        <input class="form-control" type="text" placeholder="Novo sobrenome" name="sobrenome" id="inputSobrenomeEdit" maxlength="50" <?php if (!empty($_SESSION["sobrenome"])){ echo "value=".$_SESSION["sobrenome"]; } ?>>
                                        <label for="inputSobrenomeEdit"><i class="far fa-id-card fa-fw keyIcon"></i>Sobrenome</label>
                                    </div>
                                </div>
                            </div>      
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="email" placeholder="Novo e-mail" name="email" id="inputEmailEdit" maxlength="100" <?php if (!empty($_SESSION["email"])){ echo "value=".$_SESSION["email"]; } ?>>
                                    <label for="inputEmailEdit"><i class="far fa-envelope fa-fw keyIcon"></i>E-mail</label>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputFileEdit" title="Trocar foto de usuário"><i class="far fa-camera fa-fw"></i></label>
                                    <input type="file" class="form-control" id="inputFileEdit" name="fotoPerfilEdit">
                                </div> 
                                <p><strong>Obs.:</strong> para não alterar um campo, basta não modificá-lo.</p>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="password" placeholder="Senha" name="senha" id="inputPasswordEdit" required="required" maxlength="20">
                                    <label for="inputPasswordEdit"><i class="far fa-key fa-fw keyIcon"></i>Senha do GerenContas</label>
                                </div>
                                <p>Antes de confirmar, digite sua senha acima para garantirmos que é você que está fazendo as alterações. Quando tiver terminado, clique no botão de "Confirmar alterações".</p>
                                <div class="float-end">
                                    <input class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" value="Cancelar">
                                    <input class="btn btn-outline-primary" type="submit" value="Confirmar alterações" name="submitPerfilEdit">
                                </div>
                            </form>
                        </div>                                    
                    </div>
                </div>
            </div>
            <!-- DELETE PERFIL MODAL -->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="deletePerfilModal" tabindex="-1" aria-labelledby="deletePerfilModal">
                <div class="modal-dialog modal-dialog-centered">  
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title align-middle"><i class="far fa-user-slash fa-fw keyIcon"></i>Excluir perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Você realmente deseja excluir sua conta? Você irá perder todos os dados registrados no site, e <strong>não</strong> poderá recuperá-los. Esse processo não pode ser desfeito.</p>
                            <form name="deleteAccountForm" method="post" action="forms/settings/deleteAccountForm.php">
                                <div class="form-floating mb-3 zeroMargin">
                                    <input class="form-control" type="password" placeholder="Senha" required="required" name="senhaDelete" id="inputPasswordDelete" maxlength="20">
                                    <label for="inputPasswordDelete"><i class="far fa-key fa-fw keyIcon"></i>Senha do GerenContas</label>
                                </div> 
                                <p>Se você tiver certeza que quer excluir sua conta, digite sua senha acima e clique em "Confirmar exclusão".</p>
                                <div class="float-end">   
                                    <input class="btn btn-outline-primary" data-bs-dismiss="modal" type="button" value="Cancelar">
                                    <input class="btn btn-outline-danger" type="submit" value="Confirmar exclusão" name="submitDeletePerfil">
                                </div>
                            </form>
                        </div>                                   
                    </div>
                </div>
            </div>
            <!-- EDIT PASSWORD -->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="editPasswordModal" tabindex="-1" aria-labelledby="editPasswordModal">
                <div class="modal-dialog modal-dialog-centered">  
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title align-middle"><i class="far fa-key fa-fw keyIcon"></i>Editar senha</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">    
                            <form name="editPasswordForm" method="post" action="forms/settings/editPasswordForm.php">
                                <p>Para trocar de senha, digite sua senha atual para poder realizar a operação.</p>
                                <div class="form-floating mb-3 zeroMargin">
                                    <input class="form-control" type="password" placeholder="Senha atual" required="required" name="senhaAtual" id="inputPassword" maxlength="20">
                                    <label for="inputPassword"><i class="far fa-key fa-fw keyIcon"></i>Senha atual do GerenContas</label>
                                </div> 
                                <p>Informe abaixo sua nova senha:</p>
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                        <input class="form-control" type="password" placeholder="Nova senha" required="required" name="novaSenha" id="inputPassword2" maxlength="20">
                                            <label for="inputPassword2"><i class="far fa-key fa-fw keyIcon"></i>Nova senha</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-3 zeroMargin">
                                            <input class="form-control" type="password" placeholder="Repetir nova senha" required="required" name="repetirNovaSenha" id="inputPassword3" maxlength="20">
                                            <label for="inputPassword3"><i class="far fa-key fa-fw keyIcon"></i>Repetir nova senha</label>
                                        </div>
                                    </div>
                                </div>
                                <p>Para confirmar o processo de edição de senha, clique em "Confirmar" abaixo.</p>
                                <div class="float-end">   
                                    <input class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" value="Cancelar">
                                    <input class="btn btn-outline-primary" type="submit" value="Confirmar" name="submitEditPassword">
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