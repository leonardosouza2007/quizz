<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $ano = $_POST["ano"];
    $curso = $_POST["curso"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilizadores (nome, ano, curso, senha)
            VALUES ('$nome', '$ano', '$curso', '$senha')";

    if ($conn->query($sql)) {
        header("Location: login.php");
        exit;
    } else {
        $erro = "Erro ao criar conta.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Registar - Quiz</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
<div class="card p-4 shadow" style="width:380px;">
<h4 class="text-center mb-3">Criar Conta</h4>
<?php if(isset($erro)) echo "<div class='alert alert-danger'>$erro</div>"; ?>
<form method="POST">
    <input type="text" name="nome" class="form-control mb-2" placeholder="Nome completo" required>
    <input type="text" name="ano" class="form-control mb-2" placeholder="Ano (ex: 11º)" required>
    <input type="text" name="curso" class="form-control mb-2" placeholder="Curso" required>
    <input type="password" name="senha" class="form-control mb-3" placeholder="Senha" required>
    <button class="btn btn-success w-100">Registar</button>
</form>
</div>
</body>
</html>