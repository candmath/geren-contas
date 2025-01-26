<?php
	session_start();
	require "../../modules/connect.php";

    if (!empty($_POST["tituloEditTip"]) || !empty($_POST["linkNoticiaEditTip"]) || !empty($_POST["linkSiteEditTip"]) || !empty($_POST["fotoNoticiaEditTip"])  || !empty($_POST["submitEditTip"])){

        $titulo = htmlspecialchars(filter_input(INPUT_POST, "tituloEditTip"));
        $linkNoticia = htmlspecialchars(filter_input(INPUT_POST, "linkNoticiaEditTip"));
        $linkSite = htmlspecialchars(filter_input(INPUT_POST, "linkSiteEditTip"));


    }

?>