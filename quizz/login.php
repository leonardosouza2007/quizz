<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM utilizadores WHERE nome='$nome'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        if (password_verify($senha, $user["senha"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["nome"] = $user["nome"];
            header("Location: Quiz.php");
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Utilizador não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Login - Quiz</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
<div class="card p-4 shadow" style="width:350px;">
<h4 class="text-center mb-3">Entrar no Quiz</h4>
<?php if(isset($erro)) echo "<div class='alert alert-danger'>$erro</div>"; ?>
<form method="POST">
    <input type="text" name="nome" class="form-control mb-3" placeholder="Nome" required>
    <input type="password" name="senha" class="form-control mb-3" placeholder="Senha" required>
    <button class="btn btn-primary w-100">Entrar</button>
</form>
<p class="text-center mt-3"><a href="registo.php">Criar conta</a></p>
</div>
</body>
</html>
