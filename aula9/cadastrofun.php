<?php
require "conexao2.php";

$mensagem = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nomeDigitado = trim($_POST['nome']);
    $telefonelDigitado = trim($_POST['telefone']);

    if(!empty($nomeDigitado) 
    && !empty($telefonelDigitado)){
        try {
            $sql = "INSERT INTO barbeiros(nome, telefone) VALUES (:nome, :telefone)";
            $comando = $conexao->prepare($sql);

            $comando->execute([
                ':nome' => $nomeDigitado,
                ':telefone' => $telefonelDigitado,
            ]);
            $mensagem = 'Funcionarios cadastrado com sucesso! :-)';
        } catch (PDOException $erro) {
            $mensagem = 'Não foi possível realizar o cadastro: ' . $erro->getMessage();
        }
    } else {
        $mensagem = 'Preencha todos os campos e selecione ao menos um serviço.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Funcionarios</title>

    <style>
        body {
            margin: 0;
            background-color: #ffffe8;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: #222;
            margin-top: 40px;
            margin-bottom: 25px;
            font-size: 38px;
        }
        .container {
            width: 420px;
            margin: 0 auto 40px auto;
            padding: 30px 25px;
            background-color: #c0c0c0;
            border-radius: 10px;
            box-sizing: border-box;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        label.titulo-campo {
            font-size: 16px;
            font-weight: bold;
            color: #222;
            display: block;
            margin-bottom: 4px;
        }

        .campo {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        input[type="text"], input[type="tel"], input[type="time"] {
            width: 100%;
            height: 38px;
            padding: 0 10px;
            box-sizing: border-box;
            border: 1px solid #888;
            border-radius: 8px;
            font-size: 15px;
            text-align: center;
            background-color: #ffffff;
        }
        input:focus {
            outline: none;
            border-color: #555;
        }

        .servicos-lista {
            background-color: #ffffff;
            border: 1px solid #888;
            border-radius: 8px;
            padding: 10px 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .servico-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 15px;
            cursor: pointer;
        }

        .servico-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .preco-tag {
            font-weight: bold;
            color: #2e7d32;
        }

        .total-box {
            background-color: #222;
            color: #fff;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: 5px;
        }

        .botoes-grupo {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-cadastrar {
            width: 100%;
            padding: 12px;
            border: 1px solid #888;
            border-radius: 8px;
            background-color: #f5f5f5;
            font-size: 16px;
            font-weight: bold;
            color: #222;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-cadastrar:hover {
            background-color: #e5e5e5;
        }

        .btn-listar {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            border: 1px solid #888;
            border-radius: 8px;
            background-color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            color: #222;
            text-decoration: none;
            box-sizing: border-box;
            transition: background-color 0.2s ease;
        }

        .btn-listar:hover {
            background-color: #f0f0f0;
        }

        .mensagem {
            margin-top: 10px;
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            color: #222;
        }
    </style>
</head>
<body>
    <h1>CADASTRAR FUNCIONÁRIO</h1>
    <div class="container">
        <form method="POST" action="">
            <div class="campo">
                <label for="nome" class="titulo-campo">Nome:</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    required
                    placeholder="Digite o nome do cliente..."
                >
            </div>

            <div class="campo">
                <label for="telefone" class="titulo-campo">Telefone:</label>
                <input
                    type="tel"
                    id="telefone"
                    name="telefone"
                    required
                    placeholder="Digite o telefone..."
                >

            <div class="botoes-grupo">
                <button type="submit" class="btn-cadastrar">CADASTRAR</button>
                <a href="listarclientes.php" class="btn-listar">VER LISTA DE FUNCIONARIOS</a>
            </div>

            <?php if(!empty($mensagem)): ?>
                <div class="mensagem">
                    <?php echo htmlspecialchars($mensagem); ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>