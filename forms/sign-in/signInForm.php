<?php
	session_start();
	require "../../modules/connect.php";
	if (!empty($_POST["email"]) || !empty($_POST["senha"]) || !empty($_POST["submitSignIn"]) || !empty($_POST["typeUser"])){

		$email = htmlspecialchars(filter_input(INPUT_POST, "email"));
		$senha = htmlspecialchars(filter_input(INPUT_POST, "senha"));

		$admin = $_POST["typeUser"];

		$query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

		$resultado = mysqli_query($link, $query);

    	if (mysqli_num_rows($resultado) == 0){

			header("Location: ../../sign-in.php?msg=1");

    	} else {

			setcookie("cookie_logado", 1, time()+60*10, "/");
        	$linha = mysqli_fetch_array($resultado);
        	$_SESSION["nome"] = $linha["nome"];
			$_SESSION["sobrenome"] = $linha["sobrenome"];
			$_SESSION["email"] = $linha["email"];
			$_SESSION["senha"] = $linha["senha"];
        	$_SESSION["prof-picture"] = $linha["link_img"];
			$_SESSION["tipo-usuario"] = $linha["tipo_user"];

			if (($_SESSION["tipo-usuario"] == 1) && empty($admin)){

				header("Location: ../../accounts.php?navlink=1&accstatus=2");

			} else if (($_SESSION["tipo-usuario"] == 2) && (!empty($admin))){

				// header("Location: ../../create-tip.php?accstatus=1");

			} else {

				header("Location: ../../sign-in.php?msg=1");

			}
    	}
	}
?>