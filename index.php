<?php
require_once '.\api\conexao.php';

$stmt = $conexao->query("SELECT * FROM produtos ORDER BY nome ASC");
$produtos  = $stmt ->fetchAll(PDO::FETCH_ASSOC);

require '.\api\vitrine.php';
?>