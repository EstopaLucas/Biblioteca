<?php

function conectarBanco()
{
    try {
        $conexao = new PDO("mysql:host=localhost:3306; dbname=biblioteca", "root", "");
        return $conexao;
    } catch (Exception $e) {
        return 0;
    }
}

function adicionarAluno($nome, $curso, $matricula)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO Aluno (Nome, Curso, Matricula) VALUES (:nome, :curso, :matricula)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':curso', $curso);
        $stmt->bindValue(':matricula', $matricula);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function adicionarLivros($titulo, $autor, $anoPublicacaoLivros)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO Livros (Titulo, Autor, AnoPublicacaoLivros) VALUES (:titulo, :autor, :anoPublicacaoLivros)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':autor', $autor);
        $stmt->bindValue(':anoPublicacao', $anoPublicacaoLivros);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function adicionarRevistas($tituloRevistas, $volume, $anoPublicacaoRevistas)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO Revistas (TituloRevistas, Volume, AnoPublicacaoRevistas) VALUES (:tituloRevistas, :volume, :anoPublicacaoRevistas)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':tituloRevistas', $tituloRevistas);
        $stmt->bindValue(':volume', $volume);
        $stmt->bindValue(':anoPublicacaoRevistas', $anoPublicacaoRevistas);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function adicionarEmprestimo($alunoID, $livrosID, $revistasID)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO Emprestimo (AlunoID, LivrosID, RevistasID) VALUES (:alunoID, :livrosID, :revistasID)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':alunoID', $alunoID);
        $stmt->bindValue(':livrosID', $livrosID);
        $stmt->bindValue(':revistasID', $revistasID);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function listarAluno()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Aluno";
        return $conexao->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}

function listarLivros()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Livros";
        return $conexao->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}

function listarRevistas()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Revistas";
        return $conexao->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}

function listarEmprestimo()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Emprestimo";
        return $conexao->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}

function buscarAlunoPorId($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Aluno WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return 0;
    }
}

function buscarLivrosPorId($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Livros WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return 0;
    }
}

function buscarRevistasPorId($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Revistas WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return 0;
    }
}

function atualizarAluno($id, $nome, $curso, $matricula)
{
    try {
        $conexao = conectarBanco();
        $sql = "UPDATE Aluno SET Nome = :nome, Curso = :curso, Matricula = :matricula WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':curso', $curso);
        $stmt->bindValue(':matricula', $matricula);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function atualizarLivros($id, $autor, $titulo, $anoPublicacaoLivros)
{
    try {
        $conexao = conectarBanco();
        $sql = "UPDATE Livros SET Autor = :autor, Titulo = :titulo, AnoPublicacaoLivros = :anoPublicacaoLivros WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':autor', $autor);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':anoPublicacaoLivros', $anoPublicacaoLivros);      
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function atualizarRevistas($id, $tituloRevistas, $volume, $anoPublicacaoRevistas)
{
    try {
        $conexao = conectarBanco();
        $sql = "UPDATE Revistas SET TituloRevistas = :tituloRevistas, Volume = :volume, AnoPublicacaoRevistas = :anoPublicacaoRevistas WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':tituloRevistas', $tituloRevistas);
        $stmt->bindValue(':volume', $volume);
        $stmt->bindValue(':anoPublicacaoRevistas', $anoPublicacaoRevistas);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function deletarAluno($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "DELETE FROM Aluno WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function deletarLivros($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "DELETE FROM Livros WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function deletarRevistas($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "DELETE FROM Revistas WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function deletarEmprestimos($alunoID, $livrosID)
{
    try {
        $conexao = conectarBanco();
        $sql = "DELETE FROM Emprestimo WHERE AlunoID = :alunoID AND LivrosID = :livrosID";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':alunoID', $alunoID);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}
