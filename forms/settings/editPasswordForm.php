<?php
	session_start();
	require "../../modules/connect.php";
	if (!empty($_POST["senhaAtual"]) && !empty($_POST["novaSenha"]) && !empty($_POST["repetirNovaSenha"]) && !empty($_POST["submitEditPassword"])){
		$senhaAtual = htmlspecialchars(filter_input(INPUT_POST, "senhaAtual"));
		$novaSenha = htmlspecialchars(filter_input(INPUT_POST, "novaSenha"));
		$repetirNovaSenha = htmlspecialchars(filter_input(INPUT_POST, "repetirNovaSenha"));
		$senhaSession = $_SESSION["senha"];

		if (($senhaAtual != $senhaSession) || ($novaSenha != $repetirNovaSenha)){
			header("Location: ../../settings.php?msg=1&navlink=3");
		} else {
			$update = "UPDATE usuarios SET senha = '$novaSenha' WHERE senha = '$senhaSession'";
			mysqli_query($link, $update);

			$_SESSION["senha"] = $novaSenha;

			header("Location: ../../settings.php?msg=2&navlink=3");
		}	
	}
?>