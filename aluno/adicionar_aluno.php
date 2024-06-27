<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Adicionar Aluno</h3>

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
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

<?php
if ($_POST) {
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $matricula = $_POST['matricula'];

    if ($nome == "" || $curso == "" || $matricula == "") {
        echo "<div class='alert alert-danger mt-3'>Preencha todos os campos!</div>";
        return;
    }

    if (adicionarAluno($nome, $curso, $matricula)) {
        echo "<div class='alert alert-success mt-3'>Aluno adicionado com sucesso!</div>";

        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao adicionar aluno!</div>";
    }
}

require_once("../footer.php");
?>