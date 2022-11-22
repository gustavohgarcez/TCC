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
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-dark me-3">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                </div>

                <!--Pesquisa-->
                <form class="col-6 col-lg-5 al mb-3 mb-lg-0 me-lg-2" method="POST" action="?secao=pesquisar">
                    <input type="search" name="txtPesquisar" id="tpesquisar" class="form-control form-control-light" placeholder="Pesquise pelo número do pedido">

                    <button type="submit" onclick="location.href='?secao=pesquisar'" class="btn btn-outline-dark me-2">Pesquisar</button>
                </form>

                <!--Cadastro-->
                <button type="button" class="btn btn-outline-dark me-3">+</button>

                <!--Usuário-->
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>