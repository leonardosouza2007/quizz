CREATE DATABASE quiz_pessoa CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE quiz_pessoa;

-- Tabela de utilizadores
CREATE TABLE utilizadores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  ano VARCHAR(20),
  curso VARCHAR(100),
  imagem VARCHAR(255),
  senha VARCHAR(255) NOT NULL
);

-- Tabela de pontuações
CREATE TABLE pontuacoes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  utilizador_id INT,
  pontuacao INT,
  data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (utilizador_id) REFERENCES utilizadores(id)
);