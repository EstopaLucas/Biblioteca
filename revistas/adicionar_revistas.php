<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Adicionar Instrutor</h3>

<form action="" method="POST">
<div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="form-group">
        <label for="volume">Volume</label>
        <input type="text" class="form-control" id="volume" name="volume" required>
    </div>
    <div class="form-group">
        <label for="anoPublicacaoRevistas">Ano de Publicação</label>
        <input type="number" class="form-control" id="anoPublicacaoRevistas" name="anoPublicacaoRevistas" required>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

<?php
if ($_POST) {
    $titulo = $_POST['titulo'];
    $volume = $_POST['volume'];
    $anoPublicacaoRevistas = $_POST['anoPublicacaoRevistas'];

    if ($titulo == "" || $volume == "" || $anoPublicacaoRevistas == "") {
        echo "<div class='alert alert-danger mt-3'>Preencha todos os campos!</div>";
        return;
    }

    if (adicionarRevistas($titulo, $volume, $anoPublicacaoRevistas)) {
        echo "<div class='alert alert-success mt-3'>Revista adicionada com sucesso!</div>";

        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao adicionar Revista!</div>";
    }
}

require_once("../footer.php");
?>