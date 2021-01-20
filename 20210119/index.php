<?php
	session_start();

	include "conteudo.php";	

	if(isset($_SESSION["cpf"])){

		if ((time() - $_SESSION["entrada"]) >= 60){
			session_destroy();
			header("location: form_login.html");
		}else{
			$_SESSION["entrada"] = time();
		}

		$titulo = "Entrada";
		$conteudos = array();
		$conteudos[0] = "<p>Olá, ".$_SESSION['email'].".</p>";
		$conteudos[1] = "<p>Seu tipo é ".$_SESSION['tipo'].".</p>";
		$conteudos[2] = "<p>Seja bem vindo ao sistema</p>";
		$conteudos[3] = "<p><a href='logout.php'>Sair</a></p><br>";
		$conteudos[4] = "<a href='requisicao.php'>Teste Requisição</a>";
		exibir($titulo, $conteudos);
	}else {
		session_destroy();
		header("location: form_login.html");
	}
?>