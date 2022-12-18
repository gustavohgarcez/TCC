<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Faça Login!</title>

        <!-- CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    </head>
        <!-- Estilos customizados para esse template -->
            <link href="../css/login.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <!--
        <form method="POST" action="login.php">
            <label>Nome de usuário:</label><input type="text" name="txtNome" id="tNome" placeholder="Digite seu nome"><br>
            <label>Senha do usuário:</label><input type="password" name="txtSenha" id="tSenha" placeholder="Digite sua senha"><br>
            <input type="submit" value="entrar" id="entrar" name="entrar">
        </form>
        -->

        <form class="form-signin" method="POST" action="validarlogin.php">
            <img class="mb-4" type="logo" src="../assets/CF - login.png" alt="" width="200" height="auto">
            <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

            <label for="tNome" class="sr-only">Nome de Usuário</label>
            <input type="text" name="txtNome" id="tNome" class="form-control" placeholder="Nome de usuário" required="" autofocus="">

            <label for="tSenha" class="sr-only">Senha</label>
            <input type="password" name="txtSenha" id="tSenha" class="form-control" placeholder="Senha" required="">

            <!--
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
                </label>
            </div>
            -->

            <button class="btn btn-lg btn-primary btn-block" type="submit" value="entrar" id="entrar" name="entrar">Entrar</button>

            <p class="mt-5 mb-3 text-muted">© Gustavo Garcez - 2022</p>
        </form>

        <!-- JavaScript -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>