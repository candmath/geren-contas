<?php
	session_start();
	require "../../modules/connect.php";
	if (!empty($_POST["senhaSeePassword"])){
		$senha = htmlspecialchars(filter_input(INPUT_POST, "senhaSeePassword"));
		$senhaAtual = $_SESSION["senha"];
		if ($senhaAtual != $senha){
			header("Location: ../../accounts.php?seepassword=1&navlink=1");
		} else {
			header("Location: ../../accounts.php?seepassword=2&navlink=1");	
		}
	}
?>