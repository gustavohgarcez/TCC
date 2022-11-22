<?php
	include_once ("../banco/manipuladados.php");
	$manipula = new manipuladados();
	//verifica se a variável foi iniciada
	if (IsSet($_COOKIE["nome_usuario"]))
	 $nome_usuario = $_COOKIE["nome_usuario"];
	 
	if (IsSet($_COOKIE["senha_usuario"]))
	 $senha_usuario = $_COOKIE["senha_usuario"];

	if (!(empty($nome_usuario) or empty($senha_usuario))){
		$linhas = $manipula->validarLogin($nome_usuario,$senha_usuario);
		if($linhas == 0){
			setcookie("nome_usuario");
			setcookie("senha_usuario");
			header("location: login.php");
			exit;		
		}
	}else{
		header("location: login.php");
		exit;	 
	}
?>