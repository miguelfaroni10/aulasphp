<?php
require "$conexao.php"

if($_SERVER['REQUEST_METHOS'] == 'POST'){
    $nomeDigitado = trim($_POST['nome']);
    $emailDigitado = trim($_POST['email']);
    if(!empty($nome))
    
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
    <label>
        <form>
            Digite seu nome:
        </form>
        <input type="text" name="nomeDigitado">
        <form>
            Digite seu email:
        </form>
        <input type="text" name="emailDigitado">
</label>
</body>
</html>