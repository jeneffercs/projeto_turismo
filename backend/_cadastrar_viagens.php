<?php

// Include da conexão com o banco de dados 
include'conexao.php';

try{
    // Exibe as váriaveis globais recebidas via POST
    // echo"<pre>";
    // var_dump($_POST);
    // echo"<pre>";

    // variaveis que recebem os dados enviados via POST
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $desc = $_POST['desc'];
    $imagem = $_FILES['imagem'];

    //upload da imagem

    //armazena o nome original da imagem
    $nome_original_imagem = $_FILES['imagem']['name'];

    //descobrir a extensao da imagem
    //Formatos válidos:jpg/jpeg/png

    $extensao = pathinfo($nome_original_imagem,PATHINFO_EXTENSION);


    //verificação de extensao da imagem,se for diferentre dos formatos válidos,irá retornar erro ao usuario
    if($extensao !='jpg' && $extensao != 'jpeg' && $extensao !='png'){
        echo 'Formato de imagem inválido';
        exit;
    }
    //gera um nome aleatorio para a imagem(hash)
    //a funçao uniqid gera um hash aleatoriobaseado no tempo em micrisegundos,mas ela nao é confiavel
    //utilizamos o nome temporario da imagem gerada pelo php mais o uniqid para incrementar o codigo
    //utilizamos o md5 para gerar outro hash baseado no uniqid (nome temp+uniqid)

    $hash = md5(uniqid($_FILES['imagem']['tmp_name'],true));
    
    $nome_final_imagem = $hash.'.'.$extensao;

    //gera um nome aleatorio para imagem(hash)


    //caminho onde a imagem será armazenada
    $pasta = '../img/upload/';

    //funçao php que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);

    

    //define o novo nome da imagem para upload
    $imagem = 'foto.jpg';

    //funçao PHP que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$imagem);


    // variavel que recebe a query SQL que será executada na BD
    $sql = "INSERT INTO 
    tb_viagens 
    (
    `Titulo`,
    `Local`,
    `Valor`,
    `Desc`,
    `imagem`
    ) 
    VALUES 
    (
    '$titulo','$local','$valor','$desc','$nome_final_imagem'
    )
    ";

 // Prepara a execucão da query SQL acima
$comando = $con->prepare($sql);

// executa o ca
$comando->execute();

header('location: ../admin/gerenciar_viagens.php');

$con = null;





}catch(PDOException $erro){
echo $erro->getMessage();

die();
}


?>