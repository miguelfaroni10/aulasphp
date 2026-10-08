<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "banco_masterphp";

try{
    $conexao = new 
    PDO("mysql:
    host=$host;
    dbname=$banco;
    charset=utf8",
    $usuario,
    $senha);
    $conexao->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
        );
} catch(PDOException $erro){
    print("Conexão falhou ai bb ^3^");
    $erro->getMessage();
}
?>
