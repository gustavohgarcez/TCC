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
    <form class="form-horizontal align" method="POST" action="../controller/etapasRealizadas.php">
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

                        $_SESSION['atual']=$nomeEtapa;
         
                        
                        //retorna etapas realizadas
                        $busca->setTable("tb_etapas_realizadas");
                        $EtapasRel1 = $busca->exibirEtapasRealizadas($row['numero']);
                        while($rowEtapaReal = @mysqli_fetch_array($EtapasRel1, MYSQLI_ASSOC)){
                            $listaEtapas = $rowEtapaReal['data'];
                        
                            //retorna o nome da etapa realizada//
                            $busca->setTable("tb_etapa");
                            $EtapasRel2 = $busca->getNomeEtapaById($rowEtapaReal['id_etapa']);
                            $nomeEtapaRealizadas = "";
                    
                            while($rowEtapaReal2 = @mysqli_fetch_array($EtapasRel2, MYSQLI_ASSOC)){
                                $nomeEtapaRealizadas = $rowEtapaReal2['nome'];
                                $etapa = array($rowEtapaReal2['nome']);

                            }

                            //retorna o nome do usuário que realizou a etapa//
                            $busca->setTable("tb_usuario");
                            $userEtapasRel = $busca->getNomeEtapaById($rowEtapaReal['id_usuario']);
                            $nomeUserEtapaRealizadas = "";
                    
                            while($rowUserEtapaReal2 = @mysqli_fetch_array($userEtapasRel, MYSQLI_ASSOC)){
                                $nomeUserEtapaRealizadas = $rowUserEtapaReal2['nome'];

                                $user = array($rowUserEtapaReal2['nome']);
                                
                            }
                        }
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
                                                <?php
                                                    //retorna etapas realizadas
                                                    $busca->setTable("tb_etapas_realizadas");
                                                    $EtapasRel1 = $busca->exibirEtapasRealizadas($row['numero']);
                                                    while($rowEtapaReal = @mysqli_fetch_array($EtapasRel1, MYSQLI_ASSOC)){
                                                        $teste = new DateTime($rowEtapaReal['data']);

                                                    
                                                        //retorna o nome da etapa realizada//
                                                        $busca->setTable("tb_etapa");
                                                        $EtapasRel2 = $busca->getNomeEtapaById($rowEtapaReal['id_etapa']);
                                                        $nomeEtapaRealizadas = "";
                                                
                                                        while($rowEtapaReal2 = @mysqli_fetch_array($EtapasRel2, MYSQLI_ASSOC)){
                                                            $nomeEtapaRealizadas = $rowEtapaReal2['nome'];
                                                            $etapa = array($rowEtapaReal2['nome']);

                                                        }

                                                        //retorna o nome do usuário que realizou a etapa//
                                                        $busca->setTable("tb_usuario");
                                                        $userEtapasRel = $busca->getNomeEtapaById($rowEtapaReal['id_usuario']);
                                                        $nomeUserEtapaRealizadas = "";
                                                
                                                        while($rowUserEtapaReal2 = @mysqli_fetch_array($userEtapasRel, MYSQLI_ASSOC)){
                                                            $nomeUserEtapaRealizadas = $rowUserEtapaReal2['nome'];

                                                            $user = array($rowUserEtapaReal2['nome']);
                                                            
                                                        }
                                                        foreach ($user as $user) {                            
                                                            foreach ($etapa as $etapa) {
                                                ?>
                                                            <div class="line"></div>
                                                            <p class="comment"><b><?=$etapa;?></b><br></p>
                                                            <p class="comment1">Realizada por <?=$user;?> em <?=$teste->format('d/m/Y');?>.</p>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>                                                
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
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
                                <input class="col-12" type="button" value="Iniciar" onclick="inicia();">
                            </div>
                            <div class="col">
                                <input class="col-12" type="button" value="Parar" onclick="para(); zera();">
                            </div>
                        </div>
                    </div>

                    <div class="line"></div>
                    <p class="comment1">Avançar Etapa:</p>
                    <div class="space10"></div>

                    <?php 
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
                                $prox3 = "$etapa";
                                break;
                            case 'Minuta':
                                $prox1 = 'Conferência de Minuta';
                                $prox2 = 'Análise';
                                $prox3 = "$etapa";
                                break;
                            case 'Conferência de Minuta':
                                $prox1 = 'Registro';
                                $prox2 = 'Conferência de Análise';
                                $prox3 = "$etapa";
                                break;
                            case 'Registro':
                                $prox1 = 'Conferência de Registro';
                                $prox2 = 'Digitalização';
                                $prox3 = "$etapa";
                                break;
                            case 'Conferência de Registro':
                                $prox1 = 'Digitalização';
                                $prox2 = 'Conferência de Digitalização';
                                $prox3 = "$etapa";
                                break;
                            case 'Digitalização':
                                $prox1 = 'Conferência de Digitalização';
                                $prox2 = 'Conferência de Registro';
                                $prox3 = "$etapa";
                                break;
                            case 'Conferência de Digitalização':
                                $prox1 = 'Finalizar';
                                $prox2 = 'Conferência de Registro';
                                $prox3 = "$etapa";
                                break;
                            case 'Finalizar':
                                $prox1 = 'Minuta';
                                $prox2 = 'Conferência de Minuta';
                                $prox3 = 'Voltar para Análise';
                                break;
                           default:
                                exit("alguém tentou tapear o script, que tente em outro site!");
                                break;
                        }
                        ?>

                    <div class="col-sm-12">
                        <button type="submit" name="botao" value="<?=$prox1;?>" class="btn btn-outline-dark me-3 col-12">
                            <span><?=$prox1;?></span>
                        </button>
                    </div>

                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="submit" name="botao" value="<?=$prox2;?>" class="btn btn-outline-dark me-3 col-12">
                            <span><?=$prox2;?></span>
                        </button>
                    </div>

                    <div class="space10"></div>

                    <div class="col-sm-12">
                        <button type="submit" name="botao" value="<?=$prox3;?>" class="btn btn-outline-dark me-3 col-12">
                            <span>Voltar Etapa</span>
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