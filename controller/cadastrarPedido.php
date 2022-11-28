<?php
    session_start();
	include_once ("../banco/manipuladados.php");
	$cadastra = new manipuladados();    

    $numero = $_POST['txtNumero'];
    $data = $_POST['txtData'];
    $tipo = $_POST['txtTipo'];
    $cpf = $_POST['txtCPF'];
    $nome = $_POST['txtNome'];
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y-m-d');
    $nomeFuncionario = $_SESSION['funcionario'];
    $cadastra->setTable("tb_usuario");
    $resultado = $cadastra->getIdUsuarioByNome($nomeFuncionario);
    $id = 0;

    while($row = @mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $id = $row['id'];
    }
    $cadastra->setTable("tb_pedido");
    $cadastra->setFields("numero,data,tipo,cpf,nome,etapa,funcionario,dataCadastro");
    $cadastra->setDados("'$numero','$data','$tipo','$cpf','$nome','Análise','$id','$hoje'"); 
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