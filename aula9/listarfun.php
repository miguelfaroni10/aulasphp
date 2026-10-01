<?php
require 'conexao2.php';

if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['id'])) {
    $idExcluir = intval($_GET['id']);
    
    $sqlExcluir = "DELETE FROM barbeiros WHERE id = ?";
    $comandoExcluir = $conexao->prepare($sqlExcluir);
    $comandoExcluir->execute([$idExcluir]);

    $buscaRedir = isset($_GET['busca']) ? $_GET['busca'] : '';
    header("Location: listarfun.php?busca=" . urlencode($buscaRedir));
    exit;
}

$termoBusca = isset($_GET['busca']) ? trim($_GET['busca']) : "";
$barbeiros = [];

if (!empty($termoBusca)) {
    $sql = "SELECT id, nome, telefone FROM barbeiros WHERE nome LIKE ? OR telefone LIKE ? OR tipo LIKE ? OR horario LIKE ? ORDER BY id ASC";
    $comando = $conexao->prepare($sql);
    $parametro = "%" . $termoBusca . "%";
    $comando->execute([$parametro, $parametro, $parametro, $parametro]);
    $barbeiros = $comando->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT id, nome, telefone, tipo, horario, valor FROM barbeiros ORDER BY id ASC";
    $comando = $conexao->query($sql);
    $barbeiros = $comando->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Barbeiros</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 0;
            background-color: #ffffe8;
            font-family: Arial, sans-serif;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #222;
            margin-top: 20px;
            margin-bottom: 30px;
            font-size: 32px;
            letter-spacing: 1px;
        }

        .container {
            width: 900px;
            max-width: 95%;
            margin: 0 auto;
            padding: 30px;
            background-color: #c0c0c0;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .btn-voltar {
            display: inline-block;
            margin-bottom: 20px;
            color: #222;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .btn-voltar:hover {
            text-decoration: underline;
        }

        .busca-form {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .busca-form input[type="text"] {
            flex: 1;
            padding: 10px 14px;
            border: 1px solid #888;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            background-color: #ffffff;
        }

        .busca-form input[type="text"]:focus {
            border-color: #555;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
        }

        .busca-form button {
            padding: 10px 20px;
            border: 1px solid #888;
            border-radius: 8px;
            background-color: #f5f5f5;
            font-size: 15px;
            font-weight: bold;
            color: #222;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin: 0;
        }

        .busca-form button:hover {
            background-color: #e0e0e0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        th {
            background-color: #f5f5f5;
            color: #222;
            font-size: 16px;
            padding: 14px 12px;
            border-bottom: 2px solid #888;
            text-align: center;
        }

        td {
            padding: 12px;
            font-size: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
            color: #333;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #fcfcfc;
        }

        .btn-acoes {
            display: flex;
            gap: 6px;
            justify-content: center;
        }

        .btn-alterar {
            display: inline-block;
            padding: 6px 12px;
            background-color: #f5f5f5;
            color: #1565c0;
            border: 1px solid #ccc;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: all 0.2s ease;
        }

        .btn-alterar:hover {
            background-color: #1565c0;
            color: #ffffff;
            border-color: #0d47a1;
        }

        .btn-excluir {
            display: inline-block;
            padding: 6px 12px;
            background-color: #f5f5f5;
            color: #c62828;
            border: 1px solid #ccc;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: all 0.2s ease;
        }

        .btn-excluir:hover {
            background-color: #c62828;
            color: #ffffff;
            border-color: #b71c1c;
        }

        .vazio {
            padding: 25px;
            font-size: 16px;
            color: #666;
        }
    </style>
</head>
<body>

    <h1>CONSULTA DE BARBEIROS</h1>

    <div class="container">
        <a href="cadastro.php" class="btn-voltar">&larr; Voltar para o cadastro</a>

        <form method="GET" action="" class="busca-form">
            <input type="text" name="busca" placeholder="Pesquisar por barbeiros..." value="<?= htmlspecialchars($termoBusca) ?>">
            <button type="submit">Pesquisar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($barbeiros)) {
                    foreach ($barbeiros as $barbeiros) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($barbeiro['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($barbeiro['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($barbeiro['telefone']) . "</td>";
                        echo "<td>
                                <div class='btn-acoes'>
                                    <a href='alterarclientes.php?id=" . $barbeiro['id'] . "' class='btn-alterar'>Alterar</a>
                                    <a href='listarfun.php?acao=excluir&id=" . $barbeiro['id'] . "&busca=" . urlencode($termoBusca) . "' onclick=\"return confirm('Tem certeza que deseja excluir o cliente " . htmlspecialchars($cliente['nome']) . "?');\" class='btn-excluir'>Excluir</a>
                                </div>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='vazio'>barbeiro não encontrado!</td></tr>";
                }
                ?>
            </tbody>   
        </table>
    </div>

</body>
</html>