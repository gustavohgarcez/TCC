<?php
    session_start();
	include_once ("../banco/manipuladados.php");
	$cadastra = new manipuladados();    

    //nº do pedido//
    $numero = $_POST['txtNumero'];

    //data de protocolo//
    $data = $_POST['txtData'];

    //tipo do pedido//
    $tipo = $_POST['txtTipo'];

    //cpf do cliente//
    $cpf = $_POST['txtCPF'];
    $cadastra->setTable("tb_pedido");
    $cpfFormatado = $cadastra->formatar_cpf_cnpj($cpf);

    //nome do cliente//
    $nome = $_POST['txtNome'];

    //etapa do pedido//
    $etapa = 'Análise';
    $cadastra->setTable("tb_etapa");
    $resultadoEtapa = $cadastra->getIdEtapaByNome($etapa);
    $idEtapa = 0;
    while($row = @mysqli_fetch_array($resultadoEtapa, MYSQLI_ASSOC)){
        $idEtapa = $row['id'];
    }

    //data de cadastro do pedido//
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y-m-d');
    
    //funcionário que cadastrou pedido//
    $nomeFuncionario = $_SESSION['funcionario'];
    $cadastra->setTable("tb_usuario");
    $resultado = $cadastra->getIdUsuarioByNome($nomeFuncionario);
    $id = 0;
    while($row = @mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $id = $row['id'];
    }

    //salvando no banco de dados//
    $cadastra->setTable("tb_pedido");
    $cadastra->setFields("numero,data,tipo,cpf,nome,etapa,funcionario,dataCadastro");
    $cadastra->setDados("'$numero','$data','$tipo','$cpfFormatado','$nome','$idEtapa','$id','$hoje'"); 
    $cadastra->insert();

    //exibe pedido cadastrado//
    $_SESSION["pedido"] = $numero;
    header("location: ../view/?secao=exibirPedido");
?>