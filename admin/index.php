<?php 
session_start();

if(isset($_SESSION['usuario'])){
    header('location: gerenciar_viagens.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
    <div id="container">

       <div class="caixa">

        <form action="../backend/_validar_login.php" id="login" method="post">
            <fieldset >
            <div class=grid-login>
                <h3>Faça seu Login</h3>
                <div >
                    <label for="email">Usuario</label>
                    <input type="email" name="usuario" id="usuario" required>
                </div>


                <div >
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" required>
                </div>

            </div>

            <input  type="submit" id="button" value="login">

            <!-- submit é para enviar  -->
        </fieldset>
        </form>
    </div>
    </div>


</body>
</html>