<?php
	require "../../modules/connect.php";
	if (!empty($_POST["nomeEdit"]) || !empty($_POST["emailEdit"]) || !empty($_POST["senhaEdit"]) || !empty($_POST["descEdit"]) || !empty($_POST["senhaEdit"]) || !empty($_POST["repetirSenhaEdit"]) || !empty($_POST["senhaConta"]) || !empty($_POST["submitEdit"])){
		$nome = htmlspecialchars(filter_input(INPUT_POST, "nomeEdit"));
		$email = htmlspecialchars(filter_input(INPUT_POST, "emailEdit"));;
		$desc = htmlspecialchars(filter_input(INPUT_POST, "descEdit"));		
		$senha = htmlspecialchars(filter_input(INPUT_POST, "senhaEdit"));
		$repetirSenha = htmlspecialchars(filter_input(INPUT_POST, "repetirSenhaEdit"));
		$senhaGC = htmlspecialchars(filter_input(INPUT_POST, "senhaConta"));

		$nomeOrigial = $nome;

		$query = "SELECT * from sites WHERE '$nomeOriginal' = nomeSite";
		$resultado = mysqli_query($link, $query);
    	if (mysqli_num_rows($resultado) >= 1){
			$linha = mysqli_fetch_array($resultado);
			$contaNome = $linha["nomeSite"];
		}

		$update = "UPDATE usuarios SET senha = '$novaSenha' WHERE senha = '$senhaSession'";
		mysqli_query($link, $update);

		$insert = "INSERT INTO sites (nomeSite, email, descricao, senha, repetirSenha, senhaGC) VALUES ('$nome', '$email', '$desc', '$senha', '$repetirSenha', '$senhaGC');";

		mysqli_query($link, $insert);

		header("Location: ../../accounts.php?");
	}
?>