<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "cad_quitanda";

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
        print"Conexão Estabelecida com Sucesso🙊🙉🙈!";
} catch(PDOException $erro){
    print("Conexão falhou ai bb ^3^");
    $erro->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>
