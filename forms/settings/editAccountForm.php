<?php

	session_start();
	require "../../modules/connect.php";

	if (!empty($_POST["nome"]) || !empty($_POST["sobrenome"]) || !empty($_POST["email"]) || !empty($_POST["senha"]) || !empty($_POST["fotoPerfilEdit"]) || !empty($_POST["submitPerfilEdit"])){

		$nome = htmlspecialchars(filter_input(INPUT_POST, "nome"));
		$sobrenome = htmlspecialchars(filter_input(INPUT_POST, "sobrenome"));
		$email = htmlspecialchars(filter_input(INPUT_POST, "email"));
		$senha = htmlspecialchars(filter_input(INPUT_POST, "senha"));
		$user_img = $_FILES["fotoPerfilEdit"]["name"];

		$emailAtual = $_SESSION["email"];
		$senhaAtual = $_SESSION["senha"];
		$nomeAtual = $_SESSION["nome"];

		$query = "SELECT * FROM usuarios WHERE email = '$email' AND '$nomeAtual' != nome";
		$resultado = mysqli_query($link, $query);

		if ($senhaAtual == $senha){

			if ((mysqli_num_rows($resultado) >= 1)){

				header("Location: ../../settings.php?msg=3&navlink=3");

			} else {

				echo "CERTO!";
				$_SESSION["nome"] = $nome;
				$_SESSION["sobrenome"] = $sobrenome;

				rename("../../profile-pictures/".$emailAtual."current_img", "../../profile-pictures/".$email."current_img");
			
				$_SESSION["email"] = $email;

				if (!empty($user_img)){

					$r = move_uploaded_file($_FILES["fotoPerfilEdit"]["tmp_name"], "../../profile-pictures/".$_SESSION['email']."current_img");

				}

				$img_end = "profile-pictures/".$_SESSION['email']."current_img";

				$_SESSION["prof-picture"] = $img_end;

				$update = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', link_img = '$img_end', email = '$email' WHERE nome = '$nomeAtual' ";
				mysqli_query($link, $update);

				header("Location: ../../settings.php?msg=2&navlink=3");

			}

		} else {

			header("Location: ../../settings.php?msg=1&navlink=3");

		}

	
	}	
?>