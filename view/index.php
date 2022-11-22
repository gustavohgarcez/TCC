<?php
session_start();
include_once("validarcookie.php");
include_once("../controller/verurl.php");
?>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!--CSS-->
                  <!--Bootstrap-->
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!--CSS-->
            <link href="../css/index.css" rel="stylesheet">
      </head>
      <body>
            <!--CORPO DO SITE-->
            <div class="wrapper">
                  <!--MENU-->
                  <?php include "include/menu.php"; ?>
                  <div id="geral" class="geral">
                        <!--CABEÇALHO-->
                        <?php include "include/topo.php"; ?>
                        <!--SEÇÕES-->
                        <div class="container-fluid">
                              <div id="cont">
                                    <div id="sec-cont">
                                          <?php
                                                $red = new verURL();
                                                $red->trocarUrl(@$_GET['secao']);
                                          ?>
                                    </div>
                              </div>
                        </div>
                        <!--RODAPÉ-->
                        <?php include "include/footer.php"; ?>
                  </div>
            </div>
            
            
            <!--JavaScript-->
                  <!--Bootstrap-->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                  
                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <!--JavaScript-->
      </body>
</html>
