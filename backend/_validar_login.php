<?php 
include'../backend/conexao.php';

try{

    $usuario= $_POST['usuario'];
    $senha= $_POST['senha'];
    
    $sql= "SELECT * FROM tb_login WHERE email ='$usuario' AND senha = '$senha'";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($dados);
    if($dados !=null){


        //inicia a sessao

        session_start();

        // criar uma variavel de sessao e adiciona o usuario digitado
        $_SESSION['usuario']= $usuario; 

        //exibe o valor adc na variavel de sessao usuario
        var_dump($_SESSION['usuario']);

        //se o usuario e senha sao validos ,irá entrar nesse bloco de codigo
        header('location: ../admin/gerenciar_viagens.php');
    }else{
        echo "usuario ou senha invalidos";
    }


}catch(PDOException $erro){
    echo $erro ->getMessage();
}



?>