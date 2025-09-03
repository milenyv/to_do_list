CREATE DATABASE todolist CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE todolist;

CREATE TABLE servicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    status ENUM('pendente', 'concluida') DEFAULT 'pendente',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

select * from servicos


