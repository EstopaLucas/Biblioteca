<?php
require_once('../header.php');
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Lista de Aluno</h2>
        <a href="adicionar_aluno.php" class="btn btn-success">Adicionar Aluno</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Curso</th>
                <th>Matricula</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $linhas = listarAluno();
            while ($l = $linhas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?= $l['ID'] ?></td>
                    <td><?= $l['Nome'] ?></td>
                    <td><?= $l['Curso'] ?></td>
                    <td><?= $l['Matricula'] ?></td>
                    <td>
                        <a href="alterar_aluno.php?id=<?= $l['ID'] ?>" class="btn btn-warning">
                            Alterar
                        </a>
                        <button class="btn btn-danger" onclick="if(confirm('Deseja realmente excluir este aluno?')) window.location.href = 'index.php?id=<?= $l['ID'] ?>'">
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
    if (deletarAluno($id)) {
        echo "<div class='alert alert-success mt-3'>Aluno excluído com sucesso!</div>";
        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao excluir aluno!</div>";
    }
}

require_once '../footer.php';
?>