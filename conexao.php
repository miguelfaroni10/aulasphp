<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "escola_db";

//caso esteja rodando em uma porta diferente da 3306, deve criar a variavel $port = "porta que esta o banco"

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
        print"Conexão Estabelecida com Sucesso🙊🙉🙈!👌👌👌👌👌👌🫸🫷🤘🤙🤌🤼‍♂️🤼‍♀️🤼‍♂️🤼‍♂️🤼‍♂️🤼‍♂️🤼‍♂️🤼‍♂️🤼‍♂️🤼‍♂️💏Conexao💏👩‍👧‍👦👌";
} catch(PDOException $erro){
    print("Conexão falhou ai bb ^3^");
    $erro->getMessage();
}
?>