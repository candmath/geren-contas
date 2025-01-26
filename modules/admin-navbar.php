<!-- CSS -->
<style>
    .navbar-brand {
        font-family: 'Oswald', sans-serif;
    }
    #profilePicture {
        width: 30px; 
        height: 30px;
        margin-left: 5px;
    }
    .navbar-text {
        margin-right: 5px;
    }
    .nav-item-icon {
        margin-right: 5px;
    }
    #navBar {
        margin-bottom: 10px;
    }
    .nav-item .nav-link span {
        margin-left: 5px;
    }
    .dropdown-toggle {
        margin: 0px;
        padding: 0px;
    }
    #websiteName {
        margin-right: 7.5px;
    }
</style>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" id="navBar">
    <div class="container-fluid">
        <!-- BRAND -->
        <a class="navbar-brand" href="homepage.php" title="Acessar página principal" id="websiteName">GerenContas</a>
        <!-- TOGGLE BUTTON -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" title="Acessar menu de navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- NAV ITEMS -->
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if (!empty($_GET["navlink"])){ if ($_GET["navlink"] == 1){ echo "active"; } } ?>" href="create-tip.php?navlink=1" title="Acessar dicas"><i class="far fa-lightbulb fa-fw nav-item-icon"></i>Criação de Dicas</a>
                </li>
            </ul>
            <!-- PROFILE PICTURE AND TEXT -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Abrir menu de opções">
                        <?php
                            echo $_SESSION["nome"]." ".$_SESSION["sobrenome"];
                        ?> 
                        <img src="<?php echo "profile-pictures/current_img".$_SESSION["nome"]; ?>" id="profilePicture" class="rounded-pill" alt="Foto de perfil do Usuário">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item <?php if (!empty($_GET["navlink"])){ if ($_GET["navlink"] == 4){ echo "active"; } } ?>" href="admin-settings.php" title="Abrir configurações"><i class="far fa-cog nav-item-icon fa-fw"></i>Configurações</a></li>
                        <li><a class="dropdown-item" href="modules/disconnect.php" title="Sair do site"><i class="far fa-sign-out nav-item-icon fa-fw"></i>Sair</a></li>
                    </ul>
                </li>
            </ul>  
        </div>
    </div>
</nav>