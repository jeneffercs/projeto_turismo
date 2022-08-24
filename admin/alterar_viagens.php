<?php
//include da conexão

include '../backend/conexao.php';


//captura a var global ID recebida via GET
$id = $_GET['id'];

try{

    //comando sql que irá selecionar as viagens por ID
$sql = "SELECT * FROM tb_viagens WHERE id = $id";

$comando = $con->prepare($sql);

$comando->execute();

$dados = $comando->fetchAll(PDO::FETCH_ASSOC);

//echo"<pre>";
//var_dump($dados);
//echo "</pre>";


}catch(PDOException $erro){

    //tratamento de erro
    echo $erro->getMessage();
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar viagens</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id=container>

        <h3>Alterar viagens</h3>

        <form action="../backend/_alterar_viagens.php" method="post" enctype="multipart/form-data">
            <div id="grid-alterar">

                <div>
                    <label for="">ID</label>
                    <input type="text" name="id" id="id" value="<?php echo $dados[0]['id'];?>" readonly>

                </div>


                <div>
                    <label for="">Título</label>
                    <input type="text" name="Titulo" id="Titulo" value="<?php echo $dados[0]['Titulo'];?>">
                </div>

                <div>
                    <label for="">Local</label>
                    <input type="text" name="Local" id="Local" value="<?php echo $dados[0]['Local'];?>">
                </div>

                <div>
                    <label for="" >Valor</label>
                    <input type="text" name="Valor" id="Valor" value="<?php echo $dados[0]['Valor'];?>">
                </div>

                <div>
                    
                    <label for="" >Imagem</label>
                    <input type="file" name="imagem" id="imagem" value="">
                    
                </div>
                <img class="img-alterar" src="../img/upload/<?php echo $dados[0]['imagem'];?>" alt="imagem da viagem">


                <div>
                    <label for="">Descrição</label>
                    <textarea name="Desc" id="Desc" cols="30" rows="10" ><?php echo $dados[0]['Desc'];?></textarea>
                </div>

            </div>

            <input type="submit" value="salvar">
        </form>
    </div>
</body>

</html>