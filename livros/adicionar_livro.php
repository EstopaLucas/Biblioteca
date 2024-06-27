<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Adicionar Livros</h3>

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
        <input type="text" class="form-control" id="anoPublicacaoLivros" name="anoPublicacaoLivros" required>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

<?php
if ($_POST) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $anoPublicacaoLivros = $_POST['anoPublicacaoLivros'];

    if ($titulo == "" || $autor == "" || $anoPublicacaoLivros == "") {
        echo "<div class='alert alert-danger mt-3'>Preencha todos os campos!</div>";
        return;
    }

    if (adicionarLivros($titulo, $autor, $anoPublicacaoLivros)) {
        echo "<div class='alert alert-success mt-3'>Livro adicionado com sucesso!</div>";

        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao adicionar Livro!</div>";
    }
}

require_once("../footer.php");
?>