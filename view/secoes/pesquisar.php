<?php
	include_once ("../banco/manipuladados.php");
	$busca = new manipuladados();    

    $pesquisar = $_POST['txtPesquisar'];
    $busca->setTable("tb_pedido");
    $busca->setFieldId("numero");
    $resultado = $busca->pesquisaPedido($pesquisar);
    
    //while($row = @mysqli_fetch_array($resultado, MYSQLI_ASSOC)){	
            //echo "Numero do pedido: ".$row['numero']."<br>";
            //echo "data do pedido: ".$row['data']."<br>";
            //echo "tipo do pedido: ".$row['tipo']."<br>";
            //echo "cpf do cliente: ".$row['cpf']."<br>";
            //echo "nome do cliente: ".$row['nome']."<br>";
    //}
   // $pesquisar = $_POST['pesquisar'];
    //$result_cursos = "SELECT * FROM tb_pedido WHERE numero LIKE '%$pesquisar%'";
?>

<html>
<!--CSS-->
<link href="../css/pedido.css" rel="stylesheet">

<head>
    <title>Pesquisar Pedido</title>
</head>

<body>
    <form class="form-horizontal align" method="POST" action="?secao=exibirPedidoPesquisa">
        <fieldset class="border p-2">
            <legend class="float-none w-auto p-2">Pesquisar</legend>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Data</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
				                while($row = @mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            ?>
                            <form method="post" action="?secao=exibirPedidoPesquisa">
                            
                            <tr>
                                <td><?=$row['numero'];?></td>
                                <td><?=$row['data'];?></td>
                                <td><?=$row['tipo'];?></td>
                                <td><input type="submit" value="Abrir"/><input type="hidden" name="pegar" value="<?=$row['numero'];?>"/></td>
                            </tr>
                            </form>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </fieldset>
    </form>
</body>

</html>