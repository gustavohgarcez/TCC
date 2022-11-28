<?php
    
    $id = $_SESSION['pedido'];
    
    include_once ("../banco/manipuladados.php");
	$busca = new manipuladados(); 
    $resultado = $busca->exibirCadastrado($id);

    $nomeFuncionario = $_SESSION['funcionario'];
?>
<html>
<!--CSS-->
<link href="../css/exibirPedido.css" rel="stylesheet">

<body>
    <form class="form-horizontal align" method="POST" action="../controller/cadastrarPedido.php">
        <fieldset class="border p-2">
            <?php
				while($row = @mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $busca->setTable("tb_usuario");
                    $outroResultado = $busca->getNomeUsuarioById($row['funcionario']);
                    $nome = "";
                
                    while($outroRow = @mysqli_fetch_array($outroResultado, MYSQLI_ASSOC)){
                        $nome = $outroRow['nome'];
                    }

                    $mudaData = new DateTime($row['dataCadastro']);
            ?>
            <legend class="float-none w-auto p-2">Pedido <?=$row['numero'];?></legend>

            <div class="row">

                <!--Pasta-->
                <div class="col-sm-9">
                    <div class="card text-center">
                        <div class="card-header">
                            <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link nav-link-dark active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Detalhes</button>
                                <button class="nav-link nav-link-dark" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Etapas Realizadas</button>
                                <button class="nav-link nav-link-dark" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Linha do Tempo</button>
                                <button class="nav-link nav-link-dark" id="nav-disabled-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled"
                                    aria-selected="false" disabled>Cancelar Pedido</button>
                            </div>
                        </div>
                        <div class="card-body tab-content" id="nav-tabContent">
                            <!--Detalhes-->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab" tabindex="0">
                                <div class="col-sm-12 b-card">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <fieldset class="border p-2">
                                                <p class="title"><?=$row['tipo'];?></p>
                                                <p class="comment1">Cadastrado por <?=$nome;?> em
                                                    <?=$mudaData->format('d/m/Y');?></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="space15"></div>

                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <fieldset class="border p-2">
                                                <p class="title">Etapa Atual:</p>
                                                <div class="line"></div>
                                                <p class="comment"><?=$row['etapa'];?></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Etapas Realizadas-->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab" tabindex="0">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <fieldset class="border p-2">
                                                <p class="title">Etapas Realizadas:</p>
                                                <div class="line"></div>
                                                <p class="comment"><?=$row['etapa'];?></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Linha do Tempo-->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab" tabindex="0">With supporting text below as a natural
                                lead-in to additional
                                content....
                            </div>
                            <!--Cancelar Pedido-->
                            <div class="tab-pane fade" id="nav-disabled" role="tabpanel"
                                aria-labelledby="nav-disabled-tab" tabindex="0">...
                            </div>
                        </div>
                    </div>
                </div>

                <!--Cartões Laterais-->
                <div class="col-sm-3">
                    <div class="col-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12">
                            <span>Executar Pedido</span>
                        </button>
                    </div>

                    <div class="line"></div>
                    <p class="comment1">Avançar Etapa:</p>
                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12">
                            <span>Conferência de Análise</span>
                        </button>
                    </div>

                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12">
                            <span>Minuta</span>
                        </button>
                    </div>

                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12">
                            <span>Conferência de Minuta</span>
                        </button>
                    </div>

                    <div class="space10"></div>
                    <div class="line"></div>
                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12" disabled>
                            <span>Voltar Etapa</span>
                        </button>
                    </div>
                </div>
            </div>

            <!--<div class="panel panel-primary">
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
                            <tr>
                                <td><?=$row['numero'];?></td>
                                <td><?=$row['data'];?></td>
                                <td><?=$row['tipo'];?></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>-->
        </fieldset>
    </form>
</body>

</html>