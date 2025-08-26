CREATE DATABASE biblioteca_db;
USE biblioteca_db;

CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nacionalidade VARCHAR(100) NOT NULL,
    ano_nascimento DATE NOT NULL
);

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    genero VARCHAR(30) NOT NULL,
    ano_publicacao INT NOT NULL,
    id_autor  INT,
    FOREIGN KEY (id_autor ) REFERENCES autores(id)
);

CREATE TABLE leitores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome INT NOT NULL,
    email INT NOT NULL,
    telefone INT NOT NULL
);

CREATE TABLE emprestimos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_livro  INT ,
    id_leitor  INT ,
    data_emprestimo DATE NOT NULL,
    data_devolucao  DATE NOT NULL,
    FOREIGN KEY (id_livro) REFERENCES livros(id),
    FOREIGN KEY (id_leitor) REFERENCES leitores(id)
);
