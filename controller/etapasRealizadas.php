<?php
    session_start();
	include_once ("../banco/manipuladados.php");
	$cadastra = new manipuladados();    

    //numero do pedido//
    $pedido = $_SESSION['pedido'];
    $cadastra->setTable("tb_pedido");
    $resultadoPedido = $cadastra->exibirCadastrado($pedido);
    while($rowPedido = @mysqli_fetch_array($resultadoPedido, MYSQLI_ASSOC)){
        $idPedido = $rowPedido['numero'];
    }

    //etapa do pedido//
    $etapa = $_SESSION['atual'];
    $cadastra->setTable("tb_etapa");
    $resultadoEtapa = $cadastra->getIdEtapaByNome($etapa);
    $idEtapa = 0;
    while($rowEtapa = @mysqli_fetch_array($resultadoEtapa, MYSQLI_ASSOC)){
        $idEtapa = $rowEtapa['id'];
    }
    
    //funcionário que cadastrou pedido//
    $nomeFuncionario = $_SESSION['funcionario'];
    $cadastra->setTable("tb_usuario");
    $resultado = $cadastra->getIdUsuarioByNome($nomeFuncionario);
    $idUsuario = 0;
    while($rowFunc = @mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $idUsuario = $rowFunc['id'];
    }

    //data de cadastro do pedido//
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y-m-d');

    //salvando no banco de dados as estapas já realizadas//
    $cadastra->setTable("tb_etapas_realizadas");
    $cadastra->setFields("id_pedido, id_etapa, id_usuario, data");
    $cadastra->setDados("'$idPedido','$idEtapa','$idUsuario','$hoje'"); 
    $cadastra->insert();

    $op =  $_POST['botao'];

    $cadastra->setTable("tb_etapa");
    $resultadoEtapa = $cadastra->getIdEtapaByNome($op);
    $idEtapa = 0;
    while($row = @mysqli_fetch_array($resultadoEtapa, MYSQLI_ASSOC)){
        $idEtapa = $row['id'];
    }

    $altera = new manipuladados();
    $altera->setTable("tb_pedido");

    switch($op){
        case 'Análise':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
        case 'Conferência de Análise':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
        case 'Minuta':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
        case 'Conferência de Minuta':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
        case 'Registro':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
        case 'Conferência de Registro':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
        case 'Digitalização':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
        case 'Conferência de Digitalização':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
        case 'Finalizar':
            $altera->setFields("etapa='$idEtapa'"); 
            $altera->setFieldId("numero");
            $altera->setValueId($pedido);
            $altera->update();
            break;
       default:
            exit("alguém tentou tapear o script, que tente em outro site!");
            break;
    }

    //atualiza a etapa atual//
    //$cadastra->setTable("tb_pedido");
    //$cadastra->setFields("id_etapa");
    //$cadastra->setDados("'$idEtapa'"); 
    //$cadastra->insert();

    //exibe estes dados cadastrados//
    $_SESSION["etapasRealizadas"] = $idPedido;
    header("location: ../view/?secao=exibirPedido");
?>