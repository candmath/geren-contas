<?php
	session_start();
	require "../../modules/connect.php";
	if (!empty($_POST["nome"]) || !empty($_POST["sobrenome"]) || !empty($_POST["email"]) || !empty($_POST["senha"]) || !empty($_POST["repetirSenha"]) || !empty($_POST["fotoPerfilInputFile"]) || !empty($_POST["submitSignUp"])){

		$nome = htmlspecialchars(filter_input(INPUT_POST, "nome"));
		$sobrenome = htmlspecialchars(filter_input(INPUT_POST, "sobrenome"));
		$email = htmlspecialchars(filter_input(INPUT_POST, "email"));
		$senha = htmlspecialchars(filter_input(INPUT_POST, "senha"));
		$repetirSenha = htmlspecialchars(filter_input(INPUT_POST, "repetirSenha"));

			if (empty($_FILES["fotoPerfilInputFile"]["name"])){

				$from = "../../profile-pictures/default.png";
				$to = "../../profile-pictures/".$email."current_img";
				
				copy($from, $to);

				$up_img = "profile-pictures/".$email."current_img";
				
			} else {

				$r = move_uploaded_file($_FILES["fotoPerfilInputFile"]["tmp_name"], "../../profile-pictures/".$email."current_img");
				$up_img = "profile-pictures/".$email."current_img";

			}		

		if ($senha != $repetirSenha){

			header("Location: ../../sign-up.php?msg=1");

		} else {

			$query = "SELECT * FROM usuarios WHERE email = '$email'";
			$resultado2 = mysqli_query($link, $query);

			if (mysqli_num_rows($resultado2) >= 1){

				header("Location: ../../sign-up.php?msg=2");

			} else {
		
				$insert = "INSERT INTO usuarios (nome, sobrenome, email, senha, link_img, tipo_user) VALUES ('$nome', '$sobrenome', '$email', '$senha', '$up_img', 1);";
				$resultado = mysqli_query($link, $insert);
	
				$_SESSION["nome"] = $nome;
				$_SESSION["sobrenome"] = $sobrenome;
				$_SESSION["email"] = $email;
				$_SESSION["senha"] = $senha;
	
				if (!empty($up_img)){
					$_SESSION["prof-picture"] = $up_img;
				}
				
				setcookie("cookie_logado", 1, time()+60*10, "/");	
				header("Location: ../../accounts.php?navlink=1&accstatus=1");			

			}
			
		}	
	}
?>