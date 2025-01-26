<?php

	session_start();
	require "../../modules/connect.php";
	
	if (!empty($_POST["senhaDelete"]) && !empty($_POST["submitDeletePerfil"])){
		
		$senha = htmlspecialchars(filter_input(INPUT_POST, "senhaDelete"));
		$emailAtual = $_SESSION["email"];
		$senhaAtual = $_SESSION["senha"];

		if ($senha != $senhaAtual){

			header("Location: ../../settings.php?msg=1");

		} else {

			$delete = "DELETE FROM usuarios WHERE email = '$emailAtual'";
			mysqli_query($link, $delete);

			unlink("../../profile-pictures/".$_SESSION["email"]."current_img");

			header("Location: ../../homepage.php?msg=2");

		}
		
	}
?>