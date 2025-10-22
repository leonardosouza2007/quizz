<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $ano = $_POST["ano"];
    $curso = $_POST["curso"];
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];

    if ($senha !== $confirmar_senha) {
        $erro = "As senhas não coincidem.";
    } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilizadores (nome, ano, curso, senha)
                VALUES ('$nome', '$ano', '$curso', '$senha_hash')";
        
        if ($conn->query($sql)) {
            header("Location: login.php");
            exit;
        } else {
            $erro = "Erro ao criar conta.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Registar - Quiz</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script>
function validarSenhas() {
    const senha = document.getElementById("senha").value;
    const confirmar = document.getElementById("confirmar_senha").value;
    if (senha !== confirmar) {
        alert("As senhas não coincidem!");
        return false;
    }
    return true;
}
</script>
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
<div class="card p-4 shadow" style="width:380px;">
<h4 class="text-center mb-3">Criar Conta</h4>
<?php if(isset($erro)) echo "<div class='alert alert-danger'>$erro</div>"; ?>
<form method="POST" onsubmit="return validarSenhas()">
    <input type="text" name="nome" class="form-control mb-2" placeholder="Nome Utilizador" required>
    <input type="text" name="ano" class="form-control mb-2" placeholder="Ano (ex: 11º)" required>
    <input type="text" name="curso" class="form-control mb-2" placeholder="Curso" required>
    <input type="password" id="senha" name="senha" class="form-control mb-2" placeholder="Senha" required>
    <input type="password" id="confirmar_senha" name="confirmar_senha" class="form-control mb-3" placeholder="Confirmar Senha" required>
    <button class="btn btn-success w-100">Registar</button>
</form>
</div>
</body>
</html>
