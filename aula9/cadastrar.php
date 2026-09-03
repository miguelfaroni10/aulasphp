<?php
    require "conexao.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nomeDigitado = trim($_POST['nome']);
        $emailDigitado = trim($_POST['email']);

        if(!empty($nomeDigitado)
        && !empty($emailDigitado)){
            try{
                $conexao = new
                PDO(
                    "mysql:host=$host;
                    dbname=$banco;
                    charset=utf8",
                    $usuario,
                    $senha,
                );
                $conexao->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
                );
                $sql = "INSERT INTO alunos(nome,email) VALUES (:nome,:email)";
                $comando = $conexao->prepare($sql);

                $comando->execute([
                    ':nome'=>$nomeDigitado,
                    ':email'=>$emailDigitado
                ]
                );
                $mensagem = 'Aluno cadastrado com sucesso!: =)';
            } catch (PDOException $erro) {
                $mensagem = 'Não foi possível realizar o cadastro. Tente novamente mais tarde.):'. $erro->getMessage();
            }
        }
    }else{
        $mensagem = 'Preencha todos os campos corretamente.';
    }
    ?>
    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Aluno</title>

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
            margin-bottom: 50px;
            font-size: 38px;
        }
        .container {
            width: 400px;
            min-height: 450px;
            margin: 0 auto;
            padding: 35px 25px;
            background-color: #c0c0c0;
            border-radius: 10px;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        label {
            font-size: 19px;
        }
        .campo {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        input {
            width: 100%;
            height: 36px;
            padding: 0 10px;
            box-sizing: border-box;
            border: 1px solid #888;
            border-radius: 8px;
            font-size: 16px;
            text-align: center;
        }
        input:focus {
            outline: none;
            border-color: #555;
        }
        button {
            margin-top: 15px;
            padding: 8px 18px;
            border: 1px solid #888;
            border-radius: 8px;
            background-color: #f5f5f5;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e5e5e5;
        }
        .mensagem {
            margin-top: 8px;
            font-size: 17px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>CADASTRE-SE</h1>
    <div class="container">
        <form method="POST" action="">
            <div class="campo">
                <label for="nome">Nome:</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    required
                    placeholder="Digite seu nome"
                >
            </div>
            <div class="campo">
                <label for="email">E-mail:</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    placeholder="Digite seu e-mail"
                >
            </div>
            <button type="submit">
                CADASTRAR
            </button>
            <div class="mensagem">
                <?php echo $mensagem; ?>
            </div>
        </form>
    </div>
</body>
</html>
