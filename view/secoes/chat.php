<?php
    echo"<h1> aqui é a seção CHAT </h1>";
?>

<?php
    //echo"<h1> aqui é a Tela de exibição do pedido </h1>";
?>

<html>
<!--CSS-->
<link href="../css/pedido.css" rel="stylesheet">

<body>
    <form class="form-horizontal align" method="POST" action="../controller/cadastrarPedido.php">
        <fieldset class="border p-2">
            <legend class="float-none w-auto p-2">Pedido</legend>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <!--Grupo 1: Número e data de protocolo-->
                    <div class="form-group row distance">
                        <!--Data de Protocolo-->
                        <div class="col-md-6">
                            <label class="control-label" for="dataProtocolo">Data do Protocolo: <?=$row['data'];?></label>
                        </div>
                    </div>

                    <!--Grupo 2: Tipo de pedido-->
                    <!-- Botão crado pelo professor
                                <label for="meuNome">Digite seu nome:</label>
                                <input type="text" name="txtNome" id="meuNome">
                            -->

                    <!--<div class="form-group row distance">
                        <div class="col-md-12">
                            <label class="control-label" for="tipoPedido">Tipo: <?=$row['tipo'];?></label>
                        </div>
                    </div>-->

                    <!--Grupo 3: CPF e nome do cliente-->
                    <!--<div class="form-group row distance">-->
                        <!--CPF do cliente-->
                        <!--<div class="col-md-6">
                            <label class="control-label" for="CPF">CPF: <?=$row['cpf'];?></label>
                        </div>-->

                        <!--Nome do cliente-->
                        <!--<div class="col-md-6">
                            <label class="control-label" for="Nome">Nome: <?=$row['nome'];?></label>
                        </div>
                    </div>-->

                    <!--Salvar / Cancelar-->
                    <!-- Botão crado pelo professor
                                <p><input type="submit" name="btnEnviar" value="Enviar"></p>
                            -->
                    <div class="form-group row btnSalvar">
                        <label class="col-md-2 control-label" for="Cadastrar"></label>
                        <div class="col-md-8">
                            <button id="Cadastrar" name="btnCadastrar" class="btn btn-success"
                                type="Submit">Cadastrar</button>
                            <button id="Cancelar" name="btnCancelar" class="btn btn-danger"
                                type="Reset">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>



    <section>

    </section>

</body>

</html>