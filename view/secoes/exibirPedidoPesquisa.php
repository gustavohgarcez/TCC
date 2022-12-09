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
            <?php
                    while($row = @mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        //organiza CPF/CNPJ//
                        $doc = $row['cpf'];
                        $qtd = strlen($doc);

                        if($qtd === 14 ) {
                            $titulo = 'CPF';
                        } else {
                            $titulo = 'CNPJ';
                        }

                        //retorna nome do usuário que cadastrou o pedido//
                        $busca->setTable("tb_usuario");
                        $outroResultado = $busca->getNomeUsuarioById($row['funcionario']);
                        $nome = "";
                    
                        while($outroRow = @mysqli_fetch_array($outroResultado, MYSQLI_ASSOC)){
                            $nome = $outroRow['nome'];
                        }

                        //retorna data de cadastro do pedido//
                        $mudaData = new DateTime($row['dataCadastro']);

                        //retorna etapa atual do pedido//
                        $busca->setTable("tb_etapa");
                        $resultadoEtapa = $busca->getNomeEtapaById($row['etapa']);
                        $nomeEtapa = "";
                    
                        while($rowEtapa = @mysqli_fetch_array($resultadoEtapa, MYSQLI_ASSOC)){
                            $nomeEtapa = $rowEtapa['nome'];
                        }

                        //mostra próximas etapas//
                        switch($nomeEtapa){
                            case 'Análise':
                                $prox1 = 'Conferência de Análise';
                                $prox2 = 'Minuta';
                                $prox3 = 'Conferência de Minuta';
                                break;
                            case 'Conferência de Análise':
                                $prox1 = 'Minuta';
                                $prox2 = 'Conferência de Minuta';
                                $prox3 = 'Voltar para Análise';
                                break;
                            case 'Minuta':
                                $prox1 = 'Conferência de Minuta';
                                $prox2 = 'Registro';
                                $prox3 = 'Voltar para Conferência de Análise';
                                break;
                            case 'Conferência de Minuta':
                                $prox1 = 'Registro';
                                $prox2 = 'Minuta';
                                $prox3 = 'Voltar para Minuta';
                                break;
                            case 'Registro':
                                $prox1 = 'Minuta';
                                $prox2 = 'Conferência de Minuta';
                                $prox3 = 'Voltar para Conferência de Minuta';
                                break;
                            case 'Conferência de Registro':
                                $prox1 = 'Minuta';
                                $prox2 = 'Conferência de Minuta';
                                $prox3 = 'Voltar para Análise';
                                break;
                            case 'Digitalização':
                                $prox1 = 'Conferência de Análise';
                                $prox2 = 'Minuta';
                                $prox3 = 'Conferência de Minuta';
                                break;
                            case 'Conferência de Digitalização':
                                $prox1 = 'Minuta';
                                $prox2 = 'Conferência de Minuta';
                                $prox3 = 'Voltar para Análise';
                                break;
                            case 'Finalizar':
                                $prox1 = 'Minuta';
                                $prox2 = 'Conferência de Minuta';
                                $prox3 = 'Voltar para Análise';
                                break;
                           default:
                                exit("alguém tentou tapear o script, que tente em outro site!");
                                break;
                        }                ?>
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
                                                <p class="comment1">Solicitado por <?=$row['nome'];?>,
                                                    <?=$titulo;?> <?=$doc;?>.</p>
                                                <p class="comment1">Cadastrado por <?=$nome;?> em
                                                    <?=$mudaData->format('d/m/Y');?>.</p>
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
                                                <p class="comment"><?=$nomeEtapa;?></p>
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
                                                <p class="comment"><?=$nomeEtapa;?></p>
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
                    <!--Timer-->
                    <div class="col-12 btn-align">
                        <button type="button" class="btn btn-outline-dark me-3 col-12" disabled>
                            <span id="counter">00:00:00</span><br>
                        </button>

                        <div class="space5"></div>

                        <div class="row">
                            <div class="col">
                                <input type="button" value="Parar" onclick="para();">
                            </div>
                            <div class="col">
                                <input type="button" value="Iniciar" onclick="inicia();">
                            </div>
                            <div class="col">
                                <input type="button" value="Zerar" onclick="zera();">
                            </div>
                        </div>
                    </div>

                    <div class="line"></div>
                    <p class="comment1">Avançar Etapa:</p>
                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12">
                            <span><?=$prox1;?></span>
                        </button>
                    </div>

                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12">
                            <span><?=$prox2;?></span>
                        </button>
                    </div>

                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12">
                            <span><?=$prox3;?></span>
                        </button>
                    </div>

                    <div class="space10"></div>
                    <div class="line"></div>
                    <div class="space10"></div>

                    <!--<div class="col-sm-12">
                        <button type="button" class="btn btn-outline-dark me-3 col-12" disabled>
                            <span>Voltar Etapa</span>
                        </button>
                    </div>-->
                </div>
            </div>
            <?php } ?>
        </fieldset>
    </form>
    <script src="../js/timer.js"></script>
</body>

</html>