<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca do Lucas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="text-center navbar-dark bg-dark">
        <a href="/Biblioteca/" class="text-white text-decoration-none">
            <h1 class="display-5">Biblioteca do Lucas</h1>
        </a>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/Biblioteca/aluno/">Aluno</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Biblioteca/livros/">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Biblioteca/revistas/">Revistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Biblioteca/emprestimos/">Emprestimos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        <?php
        require_once("funcao.php");
        if (conectarBanco())
            echo "<script>console.log('Conectado ao banco de dados');</script>";
        else {
            echo "<div class='alert alert-danger' role='alert'>Erro ao conectar ao banco de dados</div>";
        }