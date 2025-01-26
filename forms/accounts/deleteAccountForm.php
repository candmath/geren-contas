<?php
	require "../../modules/connect.php";
	if (!empty($_POST["senhaDelete"]) && !empty($_POST["submitDelete"])){

		$senha = htmlspecialchars(filter_input(INPUT_POST, "senhaDelete"));

		$insert = "INSERT INTO accounts_deleteaccount (senha) VALUES ('$senha');";

		mysqli_query($link, $insert);

		header("Location: ../../accounts.php?");
	}
?>