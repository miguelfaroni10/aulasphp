<?php
require 'conexao.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

try{
    $conexao = new
    PDO("mysql:
        host=$host; 
        dbname=$banco; 
        charset=utf8",
        $usuario,
        $senha
    );
    $conexao -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM alunos WHERE id = :id";
    $comando = $conexao ->prepare($sql);
    $comando ->execute([':id=>$id']);
    header("Location: listar.php");
    echo("Dado excluído com sucesso!");
    exit;
    }catch(PDOException $erro){
    print("Conexão falhou ai bb ^3^");
    $erro->getMessage();
}
}
?>