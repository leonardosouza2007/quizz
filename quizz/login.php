<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bento de Jesus Caraça</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }

    .nav-pills .nav-link {
        border-radius: var(--bs-nav-pills-border-radius);
        color: #000;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .nav-pills .nav-link:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: rgba(255, 255, 255, 0.6);
        transform: translateY(-2px);
    }

    .logo-img {
      height: 60px;
    }


    .main-content {
      background: #ffffff;
      border-radius: 15px;
      padding: 40px 30px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .main-title {
      font-size: 2.5rem;
      color: #00586b;
      margin-bottom: 1.5rem;
      border-bottom: 3px solid #00bcd4;
      display: inline-block;
      padding-bottom: 5px;
    }

    h2 {
      color: #007bff;
      margin-top: 2rem;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 1.8rem;
    }

    h2::before {
      content: '\f3a5';
      font-family: 'Bootstrap Icons';
      color: #007bff;
      font-size: 1.5rem;
    }

    .text-content p, .text-content ul {
      font-size: 1.1rem;
      line-height: 1.7;
      color: #333;
    }

    .text-content ul {
      padding-left: 1.5rem;
      list-style: none;
    }

    .text-content ul li::before {
      content: '\f26e';
      font-family: 'Bootstrap Icons';
      margin-right: 8px;
      color: #17a2b8;
    }

    .table {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
    }

    footer {
      background-color: #343a40;
      color: white;
      padding-top: 2rem;
    }

    footer a {
      color: #ffffff;
      transition: color 0.3s;
    }

    footer a:hover {
      color: #0d6efd;
      text-decoration: none;
    }

    .footer-logo {
      height: 60px;
      margin-right: 15px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
    <nav id="navbar-example2" class="navbar px-3 mb-3" style="background-color: rgba(0, 184, 212, 0.7);">
       <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Logo E.P. Bento de Jesus Caraça"
               class="logo-img"></a>
       <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="inicio.html">Início</a>
           <li class="nav-item">
               <a class="nav-link" href="SobreBento.html">Sobre Bento</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="SobreNos.html">Sobre Nós</a>
           </li>
           <li class="nav-item">
     <li class="nav-item"><a class="nav-link" href="login.php">Quiz</a></li>
           </li>
           <!-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false">Dropdown</a>
               <ul class="dropdown-menu">
                   <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
                   <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
                   <li>
                       <hr class="dropdown-divider">
                   </li>
                   <button type="button" class="btn btn-dark">Quiz</button>
                   <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
               </ul>
           </li> -->
       </ul>
   </nav>
   
   
   <?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM utilizadores WHERE nome='$nome'";
    $res = $conn->query($sql);

    if ($res && $res->num_rows > 0) {
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
  <!-- Rodapé -->
  <footer class="bg-dark text-white pt-4 mt-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 d-flex align-items-center mb-3 mb-md-0">
          <img src="img/rodape.png" alt="" style="max-height: 80px; width: auto; transform: scale(3.5); transform-origin: left center;" class="me-3">
        </div>
        <div class="col-md-6 text-md-end">
          <p class="mb-1">Email: <a href="mailto:geral@epbjc.pt" class="text-white text-decoration-underline">geral@epbjc.pt</a></p>
          <div class="d-flex justify-content-md-end gap-3 fs-5">
            <a href="https://epbjc.pt/barreiro/" class="text-white"><i class="bi bi-facebook"></i></a>
            <a href="https://www.linkedin.com/school/escola-profissional-bento-de-jesus-cara%C3%A7a/" class="text-white"><i class="bi bi-linkedin"></i></a>
            <a href="https://www.youtube.com/@EPBJCFACEBOOK" class="text-white"><i class="bi bi-youtube"></i></a>
            <a href="https://www.instagram.com/_.leoszx/" class="text-white"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
      <hr class="border-primary mt-4">
      <div class="text-center pb-3">
        <small>© 2025 EPBJC – Todos os direitos reservados</small>
      </div>
    </div>
  </footer>
 
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>