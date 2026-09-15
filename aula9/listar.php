<?php
require 'conexao.php';

$sql = "SELECT id, nome, email FROM alunos ORDER BY id ASC";
$comando = $conexao->query($sql);
$alunos = $comando->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Alunos</title>
    <style>
        body {
            margin: 0;
            background-color: #ffffe8;
            font-family: "Times New Roman", Times, serif;
        }
        h1 {
            text-align: center;
            color: #222;
            margin-top: 60px;
            margin-bottom: 40px;
            font-size: 38px;
        }
        .container {
            width: 650px;
            margin: 0 auto;
            padding: 30px;
            background-color: #c0c0c0;
            border-radius: 10px;
            box-sizing: border-box;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th {
            background-color: #f5f5f5;
            color: #222;
            font-size: 18px;
            padding: 12px 10px;
            border-bottom: 2px solid #888;
            text-align: center;
        }
        td {
            padding: 10px;
            font-size: 16px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            color: #333;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .vazio {
            padding: 20px;
            font-size: 17px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>CONSULTA DE ALUNOS</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($alunos)){
                    foreach($alunos as $aluno){
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($aluno['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($aluno['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($aluno['email']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='vazio'>Banco de Dados Vazio!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>