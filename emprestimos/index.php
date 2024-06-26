<?php
require_once('../header.php');
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Lista de Participações</h2>
        <a href="adicionar_participacao.php" class="btn btn-success">Adicionar Participação</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Membro</th>
                <th>Aula</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $linhas = listarParticipacoes();

            while ($l = $linhas->fetch(PDO::FETCH_ASSOC)) {
                $membroId = $l['MembroID'];
                $aulaId = $l['AulaID'];

                $membro = buscarMembroPorId($membroId);
                $aula = buscarAulaPorId($aulaId);
                if ($membro && $aula) {
            ?>
                    <tr>
                        <td><?= $membro['Nome'] ?></td>
                        <td><?= $aula['Nome'] ?></td>
                        <td>
                            <button class="btn btn-danger" onclick="if(confirm('Deseja realmente excluir esta participação?')) window.location.href = 'index.php?membroId=<?= $membroId ?>&aulaId=<?= $aulaId ?>'">
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
if (isset($_GET['membroId']) && isset($_GET['aulaId'])) {
    $membroId = $_GET['membroId'];
    $aulaId = $_GET['aulaId'];
    if (deletarParticipacao($membroId, $aulaId)) {
        echo "<div class='alert alert-success mt-3'>Participação excluída com sucesso!</div>";
        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao excluir participação!</div>";
    }
}

require_once '../footer.php';
?>