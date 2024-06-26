<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Alterar Aluno</h3>

<form action="" method="POST">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="form-group">
        <label for="curso">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" required>
    </div>
    <div class="form-group">
        <label for="matricula">Matricula</label>
        <input type="number" class="form-control" id="matricula" name="matricula" required>
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once '../funcao.php';
    $aluno = buscarAlunoPorId($id);

    if (is_array($aluno)) {
        echo "<script>document.getElementById('nome').value = '$aluno[Nome]';</script>";
        echo "<script>document.getElementById('curso').value = '$curso[Curso]';</script>";
        echo "<script>document.getElementById('matricula').value = '$matricula[Matricula]';</script>";
    } else {
        echo "Aluno não encontrado.";
    }
} else {
    echo "ID do aluno não fornecido.";
}

if ($_POST) {
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $matricula = $_POST['matricula'];

    if (empty($nome) || empty($curso) || empty($matricula)) {
        echo "<div class='alert alert-danger mt-3'>Preencha todos os campos!</div>";
    } else {
        if (atualizarAluno($id, $nome, $curso, $matricula)) {
            echo "<div class='alert alert-success mt-3'>Aluno alterado com sucesso!</div>";
            echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Erro ao alterar aluno!</div>";
        }
    }
}

require_once("../footer.php");
?>