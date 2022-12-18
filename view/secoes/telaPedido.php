<?php
    //echo"<h1> aqui é a TELA CADASTRO </h1>";
?>

<html>
<!--CSS-->
<link href="../css/cadastraPedido.css" rel="stylesheet">

<head>
    <title>Cadastrar Pedido</title>
</head>

<body>
    <form class="form-horizontal align" method="POST" action="../controller/cadastrarPedido.php">
        <div id="content">
            <fieldset class="border p-2">
                <legend class="float-none w-auto p-2">Cadastro de Pedido</legend>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <!--Grupo 1: Número e data de protocolo-->
                        <div class="form-group row distance">
                            <!--Número do Pedido-->
                            <div class="col-md-6">
                                <label class="control-label" for="numeroPedido">Número:</label>
                                <input id="numeroPedido" name="txtNumero" placeholder="Número do pedido"
                                    class="form-control" type="number">
                            </div>

                            <!--Data de Protocolo-->
                            <div class="col-md-6">
                                <label class="control-label" for="dataProtocolo">Data do Protocolo:</label>
                                <input id="dataProtocolo" name="txtData" class="form-control" type="date">
                            </div>
                        </div>

                        <!--Grupo 2: Tipo de pedido-->
                        <!-- Botão crado pelo professor
                                <label for="meuNome">Digite seu nome:</label>
                                <input type="text" name="txtNome" id="meuNome">
                            -->

                        <div class="form-group row distance">
                            <div class="col-md-12">
                                <label class="control-label" for="tipoPedido">Tipo:</label>
                                <select required id="tipoPedido" name="txtTipo" class="form-control">
                                    <option value=""></option>
                                    <option value="Compra e Venda">Compra e Venda</option>
                                    <option value="Inventário">Inventário</option>
                                    <option value="Divórcio">Divórcio</option>
                                    <option value="Usucapião">Usucapião</option>
                                    <option value="Estremação">Estremação</option>
                                    <option value="Extinção de Condomínio">Extinção de Condomínio</option>
                                    <option value="Inscrição Imobiliária">Inscrição Imobiliária</option>
                                    <option value="Georreferenciamento">Georreferenciamento</option>
                                    <option value="Desdobro">Desdobro</option>
                                    <option value="Fusão">Fusão</option>
                                </select>
                            </div>
                        </div>

                        <!--Grupo 3: CPF e nome do cliente-->
                        <div class="form-group row distance">
                            <!--CPF do cliente-->
                            <div class="col-md-6">
                                <label class="control-label" for="CPF">CPF/CNPJ:</label>
                                <input id="CPF" name="txtCPF" placeholder="Digite apenas números"
                                    class="form-control input-md" required="" type="text" maxlength="14"
                                    pattern="[0-9]+$">
                            </div>

                            <!--Nome do cliente-->
                            <div class="col-md-6">
                                <label class="control-label" for="Nome">Nome:</label>
                                <input id="Nome" name="txtNome" placeholder="Digite o nome do cliente"
                                    class="form-control input-md" required="" type="text">
                            </div>
                        </div>

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
    </div>
</body>

</html>