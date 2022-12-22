<?php
    //echo"<h1> aqui é a TELA INICIAL </h1>";
?>

<html>
<!--CSS-->
<link href="../css/home.css" rel="stylesheet">

<head>
    <title>Home</title>
</head>

<body>
    <div id="content" class="img-background">
        <!--<button type="button" onclick="location.href='?secao=telaPedido'" class="btn btn-outline-dark col-6 col-lg-12 al mb-lg-3">+</button>-->
        <div class="nav col-12 justify-content-end">
            <div class="col-4">
                <fieldset class="border p-2">
                    <legend class="float-none btn-align w-auto p-1">Cadastrar Pedido</legend>
                    <div class="btn-align">
                        <button type="button" onclick="location.href='?secao=telaPedido'"
                            class="btn btn-outline-dark me-3">
                            <i class="fas fa-align-left"></i>
                            <span><img src="../assets/icon_cadastra.png" alt="" width="50" height="50"> Cadastrar
                                Pedidos</span>
                        </button>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</body>

</html>