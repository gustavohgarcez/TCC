<?php
	session_start();
	include_once ("../banco/manipuladados.php");
	$manipula = new manipuladados();
	
	$login = $_POST['txtNome'];
    $password = $_POST['txtSenha'];
	$linhas = $manipula->validarLogin($login,$password); 

	$_SESSION['funcionario']=$login;

	if($linhas == 0){
		echo '<script>alert("Usuário ou Senha incorreto(s), revise os dados e tente novamente!");</script>';	
		echo "<script>location = 'login.php';</script>";
	}else{
		
		setcookie("nome_usuario",$login);
        setcookie("senha_usuario",$password);
        header("location: index.php");
		
	}
?>