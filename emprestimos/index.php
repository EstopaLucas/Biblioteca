<?php
require_once('../header.php');
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Lista de Emprestimos</h2>
        <a href="adicionar_emprestimo.php" class="btn btn-success">Adicionar Emprestimo</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Livro</th>
                <th>Revista</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $linhas = listarEmprestimo();

            while ($l = $linhas->fetch(PDO::FETCH_ASSOC)) {
                $alunoId = $l['alunoID'];
                $livrosId = $l['LivrosID'];
                $revistasId = $l['RevistasID'];

                $aluno = buscarAlunoPorId($alunoId);
                $livros = buscarLivrosPorId($livrosId);
                $revistas = buscarRevistasPorId($revistasId);
                if ($aluno && $livros && $revistas) {
            ?>
                    <tr>
                        <td><?= $aluno['Nome'] ?></td>
                        <td><?= $livros['Titulo'] ?></td>
                        <td><?= $revistas['TituloRevistas'] ?></td>
                        <td>
                        <button class="btn btn-danger" onclick="if(confirm('Deseja realmente excluir este emprestimo? ')) window.location.href = 'index.php?alunoID=<?= $alunoId ?>&livrosID=<?= $livrosId ?>&revistasID=<?= $revistasId ?>'">
                            Excluir
                        </button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php

if (isset($_GET['alunoID']) && isset($_GET['livrosID']) && isset($_GET['revistasID'])) {
    $alunoID = $_GET['alunoID'];
    $livrosID = $_GET['livrosID'];
    $revistasID = $_GET['revistasID'];
    
    echo "alunoID: $alunoID, livrosID: $livrosID, revistasID: $revistasID"; // Debugging
    
    if (deletarEmprestimos($alunoID, $livrosID, $revistasID)) {
        echo "<div class='alert alert-success mt-3'>Empréstimo excluído com sucesso!</div>";
        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao excluir empréstimo!</div>";
    }
}

require_once '../footer.php';
?>