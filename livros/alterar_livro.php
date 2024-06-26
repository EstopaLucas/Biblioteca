<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Alterar Livros</h3>

<form action="" method="POST">
<div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="form-group">
        <label for="autor">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" required>
    </div>
    <div class="form-group">
        <label for="anoPublicacaoLivros">Ano de Publicação</label>
        <input type="number" class="form-control" id="anoPublicacaoLivros" name="anoPublicacaoLivros" required>
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once '../funcao.php';
    $livros = buscarLivrosPorId($id);

    if (is_array($livros)) {
        echo "<script>document.getElementById('titulo').value = '$livros[titulo]';</script>";
        echo "<script>document.getElementById('autor').value = '$livros[autor]';</script>";
        echo "<script>document.getElementById('anoPublicacaoLivros').value = '$livros[anoPublicacaoLivros]';</script>";
    } else {
        echo "Livro não encontrado.";
    }
} else {
    echo "ID do Livro não fornecido.";
}

if ($_POST) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $anoPublicacaoLivros = $_POST['anoPublicacaoLivros'];

    if (empty($titulo) || empty($autor) || empty($anoPublicacaoLivros)) {
        echo "<div class='alert alert-danger mt-3'>Preencha todos os campos!</div>";
    } else {
        if (atualizarLivros($id, $titulo, $autor, $anoPublicacaoLivros)) {
            echo "<div class='alert alert-success mt-3'>Livro alterado com sucesso!</div>";
            echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Erro ao alterar livro!</div>";
        }
    }
}

require_once("../footer.php");
?>