<?php
?>
<html>
<!-- Custom styles for this template -->
<link href="../css/topo.css" rel="stylesheet">

<body>
    <nav class="navbar navbar-expand-lg border-bottom navbar-light sticky-top bg-light">
        <div class="container-fluid">
            <!--Menu-->
            <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <button type="button" id="sidebarCollapse" class="btn me-3">
                    <i class="fas fa-align-left"></i>
                    <img src="../assets/icon_menu.png" alt="" width="20" height="20">
                </button>
            </div>

            <!--Pesquisa-->
            <form class="col-12 col-lg-5 al mb-3 mb-lg-0 me-lg-2" method="POST" action="?secao=pesquisar">
                <div>
                    <div class="row">
                        <div class="col">
                            <input type="search" name="txtPesquisar" id="tpesquisar"
                                class="form-control form-control-light" placeholder="Pesquisar Pedido">
                        </div>
                        <div class="col">
                            <button type="submit" onclick="location.href='?secao=pesquisar'"
                                class="btn btn-outline-dark me-2">
                                <img src="../assets/icon_pesquisar.png" alt="" width="20" height="20"> Pesquisar</button>
                        </div>
                    </div>
                </div>
            </form>
            

            <!--Usuário-->
            <div class="dropdown text-end">
            <button type="submit" onclick="location.href='?secao=pesquisar'" class="btn btn-outline-dark me-2">
                    <a href="logout.php"><img src="../assets/icon_sair.png" alt="" width="20" height="20"> Sair</a>
            </button>
            </div>
        </div>
    </nav>
</body>

</html>