<?php
    
    $id = $_POST['pegar'];
     echo "<h1>".$id."</h1>";      
    include_once ("../banco/manipuladados.php");
	$busca = new manipuladados(); 
    $resultado = $busca->exibirCadastrado($id);
?>
<html>
<!--CSS-->
<link href="../css/pedido.css" rel="stylesheet">

<body>
    <form class="form-horizontal align" method="POST" action="../controller/cadastrarPedido.php">
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
                            <tr>
                                <td><?=$row['numero'];?></td>
                                <td><?=$row['data'];?></td>
                                <td><?=$row['tipo'];?></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </fieldset>
    </form>
</body>

</html>
