<?php

try{
    // Dados da conexão com o BD 
    define('SERVIDOR','localhost');
    define('USUARIO','root');
    define('SENHA','');
    define('BASEDEDADOS','db_turismo');

    $con = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDEDADOS, USUARIO, SENHA);
    // defina o modo de erro PDO para exceção
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado com sucesso!";

}catch(PDOException $erro){
    echo "Erro ao conectar no banco de dados".$erro->getMessage();

}

?>