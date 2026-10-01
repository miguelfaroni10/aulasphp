<?php
$host = "sql302.infinityfree.com";
$banco = "if0_43042538_navalhaerock";
$usuario = "if0_43042538";
$senha = "MiguelSenai2010";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    die("Erro na conexão com o banco: " . $erro->getMessage());
}
?>