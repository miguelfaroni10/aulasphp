<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VITRINE</title>
</head>
<body>
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
</body>
</html>