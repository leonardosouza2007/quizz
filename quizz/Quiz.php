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

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$nome = htmlspecialchars($_SESSION["nome"], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz - Fernando Pessoa e os seus Heterónimos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(to bottom right, #e0f7fa, #80deea);
            min-height: 100vh;
        }
        .logo-img { width: 90px; height: 70px; top: 16px; left: 85px; }
        .nav-pills .nav-link {
            border-radius: var(--bs-nav-pills-border-radius);
            color: #000; font-weight: bold; transition: all 0.3s ease;
        }
        .nav-pills .nav-link:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            background-color: rgba(255,255,255,0.6);
            transform: translateY(-2px);
        }
        .quiz-card { background-color: #f0faff; }
        footer a:hover { color: #0d6efd; text-decoration: none; }
        .user-greet { display:flex; align-items:center; gap:.8rem; margin-bottom:1rem; }
        .user-greet img { width:56px; height:56px; border-radius:50%; object-fit:cover; border:2px solid #fff; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav id="navbar-example2" class="navbar px-3 mb-3" style="background-color: rgba(0, 184, 212, 0.7);">
        <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Logo" class="logo-img"></a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link" href="inicio.html">Início</a></li>
            <li class="nav-item"><a class="nav-link" href="SobreBento.html">Sobre Bento</a></li>
            <li class="nav-item"><a class="nav-link" href="SobreNos.html">Sobre Nós</a></li>
            <li class="nav-item"><a class="nav-link active" href="Quiz.php">Quiz</a></li>
            <li class="nav-item ms-3"><a class="nav-link" href="logout.php">Sair</a></li>
        </ul>
    </nav>

    <!-- Conteúdo principal -->
    <div class="container" style="min-height: 70vh;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <div class="card shadow-lg p-4 rounded-4 quiz-card">
                    <div class="user-greet">
                        <!-- se tiveres imagem do utilizador, podes mostrar aqui (opcional) -->
                        <?php
                        // se tiveres imagem guardada numa coluna 'imagem' podes fazer:
                        if (!empty($_SESSION['imagem'])) {
                            $img = htmlspecialchars($_SESSION['imagem'], ENT_QUOTES, 'UTF-8');
                            echo "<img src=\"{$img}\" alt=\"Foto\">";
                        }
                        ?>
                        <div>
                            <small>Olá,</small>
                            <div class="fw-bold"><?= $nome ?></div>
                        </div>
                    </div>

                    <h3 class="text-center mb-3 fw-bold">Quiz: Fernando Pessoa e os seus Heterónimos</h3>

                    <div id="quiz-container">
                        <p class="fw-semibold" id="question"></p>
                        <div id="options" class="btn-group-vertical w-100" role="group"></div>
                        <div class="text-center mt-4">
                            <button id="next-btn" class="btn btn-primary">Próxima</button>
                        </div>
                    </div>

                    <div id="result" class="text-center mt-4 fw-bold" style="display:none;"></div>
                </div>

                <!-- Ranking mais junto: colocado logo abaixo do cartão sem grande margem -->
                <div class="mt-3">
                    <h5 class="text-center mb-3">🏆 Ranking dos Jogadores (Top 10)</h5>
                    <div class="table-responsive">
                        <table class="table table-striped text-center mb-0">
                            <thead class="table-light">
                                <tr><th>Posição</th><th>Nome</th><th>Pontuação</th><th>Data</th></tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT u.nome, MAX(p.pontuacao) AS melhor, MAX(p.data) AS data
                                        FROM pontuacoes p
                                        JOIN utilizadores u ON u.id = p.utilizador_id
                                        GROUP BY u.id
                                        ORDER BY melhor DESC, data ASC
                                        LIMIT 10";
                                $res = $conn->query($sql);
                                $pos = 1;
                                if ($res && $res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        $nomeRow = htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8');
                                        $melhor = (int)$row['melhor'];
                                        $data = htmlspecialchars($row['data'], ENT_QUOTES, 'UTF-8');
                                        echo "<tr>
                                                <td>{$pos}</td>
                                                <td>{$nomeRow}</td>
                                                <td>{$melhor}</td>
                                                <td>{$data}</td>
                                              </tr>";
                                        $pos++;
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Ainda não há pontuações.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /Ranking -->

            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="bg-dark text-white pt-4 mt-4">
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
                        <a href="https://www.instagram.com/_leoszx" class="text-white"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-primary mt-4">
            <div class="text-center pb-3">
                <small>© 2025 EPBJC – Todos os direitos reservados</small>
            </div>
        </div>
    </footer>

    <script>
    // === todas as perguntas: Verdadeiro/Falso + Escolha múltipla ===
    const questions = [
        // V/F
        { q: "Fernando Pessoa criou mais de 70 heterónimos ao longo da sua vida.", options: ["Verdadeiro", "Falso"], answer: "Verdadeiro" },
        { q: "Alberto Caeiro é considerado o mestre dos outros heterónimos.", options: ["Verdadeiro", "Falso"], answer: "Verdadeiro" },
        { q: "Álvaro de Campos é conhecido por um estilo calmo e clássico, inspirado nos gregos antigos.", options: ["Verdadeiro", "Falso"], answer: "Falso" },
        { q: "Ricardo Reis valorizava a razão e a disciplina, evitando grandes emoções.", options: ["Verdadeiro", "Falso"], answer: "Verdadeiro" },
        { q: "Mensagem foi o único livro publicado em português por Fernando Pessoa em vida.", options: ["Verdadeiro", "Falso"], answer: "Verdadeiro" },
        { q: "Alberto Caeiro rejeita o pensamento racional e celebra a perceção direta da natureza.", options: ["Verdadeiro", "Falso"], answer: "Verdadeiro" },
        { q: "Álvaro de Campos estudou engenharia naval e viveu em Londres.", options: ["Verdadeiro", "Falso"], answer: "Verdadeiro" },

        // Escolha múltipla (mantive a ordem e alternativas que enviaste)
        { q: "Qual dos heterónimos é considerado o “mestre” dos outros?", options: ["Ricardo Reis", "Alberto Caeiro", "Álvaro de Campos"], answer: "Alberto Caeiro" },
        { q: "Qual é o nome completo de Fernando Pessoa?", options: ["Fernando António Nogueira Pessoa", "Fernando José Pessoa da Silva", "Fernando Manuel Pessoa"], answer: "Fernando António Nogueira Pessoa" },
        { q: "Qual o título do único livro de Fernando Pessoa publicado em vida, em português?", options: ["Livro do Desassossego", "Mensagem", "O Guardador de Rebanhos"], answer: "Mensagem" },
        { q: "Qual destes temas está mais presente na obra de Ricardo Reis?", options: ["Nacionalismo português", "Hedonismo e epicurismo moderado", "Industrialização e modernidade"], answer: "Hedonismo e epicurismo moderado" },
        { q: "Álvaro de Campos é conhecido pelo seu estilo:", options: ["Simples e naturalista", "Odes futuristas e tom exaltado", "Racional e impassível"], answer: "Odes futuristas e tom exaltado" },
        { q: "Qual é a principal obra de Alberto Caeiro?", options: ["O Guardador de Rebanhos", "Odes", "Tabacaria"], answer: "O Guardador de Rebanhos" },
        { q: "O Livro do Desassossego é atribuído a qual semi-heterónimo?", options: ["Bernardo Soares", "Ricardo Reis", "Álvaro de Campos"], answer: "Bernardo Soares" },
        { q: "Qual destes versos representa melhor o pensamento de Alberto Caeiro?", options: ["Sentir tudo de todas as maneiras.", "Pensar é estar doente dos olhos.", "Tudo vale a pena se a alma não é pequena."], answer: "Pensar é estar doente dos olhos." },
        { q: "Que movimento literário influenciou mais Álvaro de Campos?", options: ["Futurismo", "Simbolismo", "Realismo"], answer: "Futurismo" },
        { q: "Ricardo Reis defendia uma filosofia próxima de:", options: ["Estoicismo e epicurismo", "Romantismo e emoção", "Anarquismo e liberdade total"], answer: "Estoicismo e epicurismo" },
        { q: "Alberto Caeiro via a natureza como:", options: ["Um símbolo de Deus", "Algo sagrado e misterioso", "Algo simples e direto, sem simbolismo"], answer: "Algo simples e direto, sem simbolismo" },
        { q: "Qual destes heterónimos usa mais o verso livre e o tom exaltado?", options: ["Ricardo Reis", "Álvaro de Campos", "Alberto Caeiro"], answer: "Álvaro de Campos" },
        { q: "Em que língua Fernando Pessoa também escreveu vários poemas?", options: ["Francês", "Inglês", "Espanhol"], answer: "Inglês" },
        { q: "Álvaro de Campos escreveu o famoso poema:", options: ["Ode Triunfal", "Mar Português", "O Guardador de Rebanhos"], answer: "Ode Triunfal" },
        { q: "Qual o heterónimo mais racional e disciplinado?", options: ["Alberto Caeiro", "Ricardo Reis", "Álvaro de Campos"], answer: "Ricardo Reis" },
        { q: "Alberto Caeiro nasceu, segundo a biografia fictícia, em:", options: ["Lisboa", "Campo de Ourique", "Ribatejo"], answer: "Ribatejo" },
        { q: "Fernando Pessoa nasceu em:", options: ["Lisboa", "Coimbra", "Porto"], answer: "Lisboa" },
        { q: "Álvaro de Campos vive intensamente o:", options: ["Passado", "Presente", "Futuro"], answer: "Presente" },
        { q: "O estilo de Ricardo Reis é marcado por:", options: ["Emoção e exaltação", "Disciplina e equilíbrio", "Espontaneidade e naturalismo"], answer: "Disciplina e equilíbrio" },
        { q: "Qual destes poemas é de Álvaro de Campos?", options: ["Tabacaria", "Odes", "Autopsicografia"], answer: "Tabacaria" },
        { q: "O poema “Autopsicografia” (“O poeta é um fingidor...”) é de:", options: ["Fernando Pessoa ortónimo", "Álvaro de Campos", "Ricardo Reis"], answer: "Fernando Pessoa ortónimo" },
        { q: "Qual destes heterónimos rejeita totalmente o intelectualismo?", options: ["Ricardo Reis", "Alberto Caeiro", "Álvaro de Campos"], answer: "Alberto Caeiro" },
        { q: "Qual destes temas é comum a todos os heterónimos de Pessoa?", options: ["A busca da identidade", "A crítica política", "O amor romântico"], answer: "A busca da identidade" }
    ];

    let currentQuestion = 0;
    let score = 0;

    const questionEl = document.getElementById("question");
    const optionsEl = document.getElementById("options");
    const nextBtn = document.getElementById("next-btn");
    const resultEl = document.getElementById("result");

    function loadQuestion() {
        const q = questions[currentQuestion];
        questionEl.textContent = `Pergunta ${currentQuestion + 1} / ${questions.length}: ` + q.q;
        optionsEl.innerHTML = "";
        q.options.forEach(opt => {
            const btn = document.createElement("button");
            btn.classList.add("btn", "btn-outline-primary", "mb-2");
            btn.style.textAlign = "left";
            btn.textContent = opt;
            btn.onclick = () => selectAnswer(btn, q.answer);
            optionsEl.appendChild(btn);
        });
    }

    function selectAnswer(button, correct) {
        const selected = button.textContent;
        if (selected === correct) {
            button.classList.replace("btn-outline-primary", "btn-success");
            score++;
        } else {
            button.classList.replace("btn-outline-primary", "btn-danger");
            // marcar também a correta para o utilizador ver
            Array.from(optionsEl.children).forEach(b => {
                if (b.textContent === correct) {
                    b.classList.replace("btn-outline-primary", "btn-success");
                }
            });
        }
        Array.from(optionsEl.children).forEach(b => b.disabled = true);
    }

    nextBtn.addEventListener("click", () => {
        // se ainda não respondeu, ignora
        const anyDisabled = Array.from(optionsEl.children).some(b => b.disabled);
        if (!anyDisabled) {
            // destaca alerta visual se tentativa de avançar sem responder
            optionsEl.classList.add("border", "border-danger", "p-2");
            setTimeout(() => optionsEl.classList.remove("border","border-danger","p-2"), 700);
            return;
        }

        currentQuestion++;
        if (currentQuestion < questions.length) {
            loadQuestion();
        } else {
            showResult();
        }
    });

    function showResult() {
        document.getElementById("quiz-container").style.display = "none";
        resultEl.style.display = "block";
        resultEl.innerHTML = `Concluído!<br>Acertaste <strong>${score}</strong> de <strong>${questions.length}</strong> perguntas.`;

        // guarda pontuação no servidor
        fetch("guardarPontuacao.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: `pontuacao=${score}`
        }).then(() => {
            // opcional: atualizar ranking visual (simples reload da página para ver nova pontuação)
            setTimeout(() => location.reload(), 900);
        }).catch(err => {
            console.error("Erro ao guardar pontuação:", err);
        });
    }

    // inicia
    loadQuestion();
    </script>

</body>
</html>
