<?php
//include conexao

include '../backend/conexao.php';

try {
    $sql = "SELECT * FROM tb_viagens";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    //exibe a msg de erro
    echo $erro->getMessage();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Viagens</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="container">
        <h3>Gerenciar Viagens</h3>
        <hr>

        <a href="cadastrar_viagens.php">Cadastrar Viagens</a>
        <a href="../backend/logout.php">Sair</a>

        <hr>

        <div id="tabela">

            <table border="1">
                <!-- tr=linha  td=coluna(dados da coluna)   th=titulo -->
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Local</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>

                <?php
                foreach ($dados as $viagem) :
                ?>
                    <tr>
                        <td><?php echo $viagem['id']; ?></td>
                        <td><?php echo $viagem['Titulo']; ?></td>
                        <td><?php echo $viagem['Local']; ?></td>
                        <td>R$<?php echo $viagem['Valor']; ?></td>
                        <td><?php echo $viagem['Desc']; ?></td>
                        <td>
                            <a href="alterar_viagens.php?id=<?php echo $viagem['id']; ?>">Alterar</a>
                        </td>

                        <td>
                            <a href="../backend/_deletar_viagens.php?id=<?php echo $viagem['id']; ?>">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
    <?php
    ?>
</body>

</html>