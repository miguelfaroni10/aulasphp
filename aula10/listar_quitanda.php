<?php
require'conexão_quitanda.php';

$sql ="SELECT id, nome, email FROM alunos ORDER BY id DESC";
$comando = $conexão -> query($sql);
$alunos = $comando ->fecthAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <h2>Consulta Alunos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
         <?php
    if(!empty($alunos)){
        foreach($alunos as $aluno){
            echo "<tr>";
            echo "<td>" . htmlspecialchars($aluno['ID']) . "</td>";
            echo "<td>" . htmlspecialchars($aluno['Nome']) . "</td>";
            echo "<td>" . htmlspecialchars($aluno['Email']) . "</td>";
            echo "</tr>";
        }
    }else{
            echo"Banco de Dados Vazio!";
        }
    ?>
    </table>
</body>
</html>