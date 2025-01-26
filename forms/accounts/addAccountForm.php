<?php
	require "../../modules/connect.php";
	if (!empty($_POST["nomeAdd"]) || !empty($_POST["emailAdd"]) || !empty($_POST["senhaAdd"]) || !empty($_POST["descAdd"]) || !empty($_POST["submitAdd"])){

		$nome = htmlspecialchars(filter_input(INPUT_POST, "nomeAdd"));
		$email = htmlspecialchars(filter_input(INPUT_POST, "emailAdd"));
		$senha = htmlspecialchars(filter_input(INPUT_POST, "senhaAdd"));
		$desc = htmlspecialchars(filter_input(INPUT_POST, "descAdd"));
		
		$insert = "INSERT INTO sites (nomeSite, email, descricao, senha) VALUES ('$nome', '$email', '$desc', '$senha');";

		mysqli_query($link, $insert);

		header("Location: ../../accounts.php");
	}
?>