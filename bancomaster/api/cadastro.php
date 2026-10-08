<?php
require_once 'conexao.php';

$mensagem = "";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql ="INSERT INTO produtos (nome, preco, quantidade VALUES(:nome, :preco, :quantidade)";
    $stmt = $pdo -> prepare($sql);
    $stmt = execute([
        ':nome' => $nome,
        ':preco'=>$preco,
        ':quantidade'=>$quantidade
    ]);
    $mensagem = "<h3>Produto cadastrado com sucesso!</h3>";
}else{
    $mensagem = "<h3>Erro ao cadastrar o produto: $nome</h3>";
}
$stmt = $pdo->query("SELECT * FROM produtos ORDER BY id DESC");
$ultimos_produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO de PRODUTO</title>
</head>
<body>
    <h1>CADASTRO E AMOSTRAGEM DE PRODUTOS</h1>
    <?= $mensagem?>
    <form action ="" method="POST">
        <label>Nome</label>
        <input type="text" name="name" require><br><br>
        <label>Preço</label>
        <input type="number" step="0.01" name="preco" require><br><br>
        <label>Quantidade</label>
        <input type="number" name="preco" require><br><br>
        <button type ="submit">CADASTRAR</button>
    </form>
</body>
<h3>
    Últimas cadastrado
    <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                Nome
            </th>
            <th>
                Preço
            </th>
            <th>
                Quantidade
            </th>
        </tr>
        <tr>
        <ul>
        <?php foreach ($produtos as $item): ?>
            <li>
                <strong>
                    <?= htmlspecialchars($item['nome']) ?> - 
                    R$ <?= htmlspecialchars($item['preco']) ?> 
                    - Estoque: <?= htmlspecialchars($item['quantidade']) ?>
                </strong>
            </li>
        <?php endforeach; ?>
    </ul>
        </tr>
    </table>
</h3>
</html>