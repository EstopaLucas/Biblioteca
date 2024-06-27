<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Alterar Instrutor</h3>

<form action="" method="POST">
<div class="form-group">
        <label for="tituloRevistas">Titulo</label>
        <input type="text" class="form-control" id="tituloRevistas" name="tituloRevistas" required>
    </div>
    <div class="form-group">
        <label for="volume">Volume</label>
        <input type="text" class="form-control" id="volume" name="volume" required>
    </div>
    <div class="form-group">
        <label for="anoPublicacaoRevistas">Ano de Publicação</label>
        <input type="text" class="form-control" id="anoPublicacaoRevistas" name="anoPublicacaoRevistas" required>
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once '../funcao.php';
    $tituloRevistas = buscarRevistasPorId($id);
    $volume = buscarRevistasPorId($id);
    $anoPublicacaoRevistas = buscarRevistasPorId($id);

    if (is_array($tituloRevistas)) {
        echo "<script>document.getElementById('tituloRevistas').value = '$tituloRevistas[TituloRevistas]';</script>";
        echo "<script>document.getElementById('volume').value = '$volume[Volume]';</script>";
        echo "<script>document.getElementById('anoPublicacaoRevistas').value = '$anoPublicacaoRevistas[AnoPublicacaoRevistas]';</script>";
    } else {
        echo "Revista não encontrado.";
    }
} else {
    echo "ID da Revista não fornecido.";
}

if ($_POST) {
    $tituloRevistas = $_POST['tituloRevistas'];
    $volume = $_POST['volume'];
    $anoPublicacaoRevistas = $_POST['anoPublicacaoRevistas'];

    if (empty($tituloRevistas) || empty($volume) || empty($anoPublicacaoRevistas)) {
        echo "<div class='alert alert-danger mt-3'>Preencha todos os campos!</div>";
    } else {
        if (atualizarRevistas($id, $tituloRevistas, $volume, $anoPublicacaoRevistas)) {
            echo "<div class='alert alert-success mt-3'>Revista alterada com sucesso!</div>";
            echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Erro ao alterar revista!</div>";
        }
    }
}

require_once("../footer.php");
?>