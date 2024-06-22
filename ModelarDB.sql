CREATE DATABASE Biblioteca;
use Biblioteca;

-- Tabela de Alunos
CREATE TABLE Aluno (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Curso VARCHAR(100),
    Matricula INT
);

-- Tabela de Livros
CREATE TABLE Livros (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Titulo VARCHAR(100),
    Autor VARCHAR(100)
    AnoPublicacaoLivros INT(4)
);

-- Tabela de Revistas
CREATE TABLE Revistas (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    TituloRevistas VARCHAR(100),
    Volume VARCHAR(100),
    AnoPublicacaoRevistas INT(4)
);

-- Tabela de Emprestimo
CREATE TABLE Emprestimo (
    alunoID INT,
    LivrosID INT,
    RevistasID INT,
    PRIMARY KEY (alunoID, LivrosID, RevistasID),
    FOREIGN KEY (alunoID) REFERENCES Aluno(ID),
    FOREIGN KEY (LivrosID) REFERENCES Livros(ID),
    FOREIGN KEY (RevistasID) REFERENCES Revistas(ID)
);