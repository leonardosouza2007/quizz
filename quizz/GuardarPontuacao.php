<?php
session_start();
include "db.php";

if (isset($_SESSION["user_id"]) && isset($_POST["pontuacao"])) {
    $id = $_SESSION["user_id"];
    $pontuacao = intval($_POST["pontuacao"]);
    $sql = "INSERT INTO pontuacoes (utilizador_id, pontuacao) VALUES ($id, $pontuacao)";
    $conn->query($sql);
}
?>
