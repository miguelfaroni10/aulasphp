<?php
require_once 'conexao.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = intval($_POST['id']);
    $novoNome = trim($_POST['nome']);
    $novoEmail = trim($_POST['email']);
    if(!empty($novoNome) &&!empty($novoEmail)){
        $sqlUp = "UPDATE alunos SET nome = :nome, 
        email = :email WHERE id = :id";
        $cmdUp = $conexao->prepare($sqlUp);
        $cmdUp->execute([
            ':nome'=> $novoNome;
            ':email'=> $novoEmail;
            ':id'=> $id
        ]);
        header("Location: listar.php");
}else{
    $mensagem ="Preencha todos os campos";
}
}
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $sqlSel = "SELECT * FROM alunos WHERE id = :id";
    $cmdSel = $conexao->prepare($sqlSel);
    $cmdSel->execute([':id'=> $id]);
    $aluno = $cmdSel->fetch(PDO::FETH_ASSOC);
}
?>