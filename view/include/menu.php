<?php
//echo "<h1>menu</h1>"
?>

<!doctype html>
<html>

<!-- Custom styles for this template -->
<link href="../css/menu.css" rel="stylesheet">


<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sticky-top">
                <div class="sidebar-header">
                    <h3>Cartório de Formosa</h3>
                    <strong>CF</strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="?secao=home">
                            <img src="../assets/icon_home_branco.png" alt="" width="30" height="30">
                            <span class="list-unstyled CTAs">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="?secao=telaPedido">
                            <img src="../assets/icon_cadastra_branco.png" alt="" width="30" height="30">
                            <span class="list-unstyled CTAs">Cadastrar Pedidos</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <img src="../assets/icon_sair_branco.png" alt="" width="27" height="27">
                            <span class="list-unstyled CTAs">Sair</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>

    <script src="../js/menu.js"></script>
</body>

</html>