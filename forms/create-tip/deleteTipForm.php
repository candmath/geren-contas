<?php
	session_start();
	require "../../modules/connect.php";

    if (!empty($_POST["senhaDeleteTip"]) && !empty($_POST["submitDeleteTip"])){

        $senha = htmlspecialchars(filter_input(INPUT_POST, "senhaDeleteTip"))

    }

?>