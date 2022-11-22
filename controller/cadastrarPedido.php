<?php
    session_start();
	include_once ("../banco/manipuladados.php");
	$cadastra = new manipuladados();    

    $numero = $_POST['txtNumero'];
    $data = $_POST['txtData'];
    $tipo = $_POST['txtTipo'];
    $cpf = $_POST['txtCPF'];
    $nome = $_POST['txtNome'];

    $cadastra->setTable("tb_pedido");
    $cadastra->setFields("numero,data,tipo,cpf,nome, etapa");
    $cadastra->setDados("'$numero','$data','$tipo','$cpf','$nome', 'Análise'"); 
    $cadastra->insert();

    

    //echo '<script>alert("'.$cadastra->getStatus().'");</script>';
    //echo"<h1>O pedido cadastrado é: Numero: ".$numero." Data: ".$data." Tipo: ".$tipo." CPF: ".$cpf." Nome: ".$nome.".</h1>";
    //echo'<script>location.href="../view/?secao=exibirPedido";</script>';
    $_SESSION["pedido"] = $numero;
    header("location: ../view/?secao=exibirPedido");
?>

<?php
    /*$nome=$_POST['txtNome'];
    echo"<h1> o nome digitado é: " .$nome. " </h1>";
    echo '<script>alert("Pedido cadastrado com Sucesso!");</script>';	
	echo "<script>location = '../view/index.php?secao=home';</script>";
    
    <form class="form-horizontal align" method="POST" action="../controller/vercadastro.php">
        <input type="hidden" id="custId" name="custId" value="$numero">
    </form>*/
?>