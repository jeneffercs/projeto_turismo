<?php 

include "conexao.php";

try{
    //variaveis recebidas via $_POST
    $id     = $_POST['id'];
    $Titulo = $_POST['Titulo'];
    $Local  = $_POST['Local'];
    $Valor  = $_POST['Valor'];
    $Desc   = $_POST['Desc'];

    $sql = "UPDATE 
    tb_viagens 
    SET
    `Titulo` = '$Titulo',
    `Local`  = '$Local',
    `Valor`  = '$Valor',
    `Desc`   = '$Desc'
    WHERE 
    id = $id;

    ";

    
$comando = $con->prepare($sql);

$comando->execute();

header('location: ../admin/alterar_viagens.php?id='.$id);

}catch(PDOException $erro){
    echo $erro -> getMessage();
}
