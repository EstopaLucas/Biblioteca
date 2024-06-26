<?php
require_once('../header.php');
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Lista de Livros</h2>
        <a href="adicionar_livro.php" class="btn btn-success">Adicionar Livros</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Ano de Publicação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $linhas = listarLivros();
            while ($l = $linhas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?= $l['ID'] ?></td>
                    <td><?= $l['Titulo'] ?></td>
                    <td><?= $l['Autor'] ?></td>
                    <td><?= $l['AnoPublicacaoLivros'] ?></td>
                    <td>
                        <a href="alterar_Livro.php?id=<?= $l['ID'] ?>" class="btn btn-warning">
                            Alterar
                        </a>
                        <button class="btn btn-danger" onclick="if(confirm('Deseja realmente excluir este Livro?')) window.location.href = 'index.php?id=<?= $l['ID'] ?>'">
                            Excluir
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deletarLivros($id)) {
        echo "<div class='alert alert-success mt-3'>Livro excluído com sucesso!</div>";
        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao excluir Livro!</div>";
    }
}

require_once '../footer.php';
?>