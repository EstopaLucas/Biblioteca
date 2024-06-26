<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Adicionar Emprestimo</h3>

<form action="" method="POST">
    <div class="form-group">
        <label for="aluno">Aluno</label>
        <select class="form-control" id="aluno" name="aluno" required>
            <option value="">Selecione um Aluno</option>
            <?php
            $alunos = listarAluno();
            while ($l = $alunos->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?= $l['ID'] ?>"><?= $l['Nome'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="livro">Livro</label>
        <select class="form-control" id="livro" name="livro" required>
            <option value="">Selecione um Livro</option>
            <?php
            $livros = listarLivros();
            while ($l = $livros->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?= $l['ID'] ?>"><?= $l['titulo'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="revista">Revista</label>
        <select class="form-control" id="revista" name="revista" required>
            <option value="">Selecione uma revista</option>
            <?php
            $revistas = listarRevistas();
            while ($l = $revistas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?= $l['ID'] ?>"><?= $l['titulo'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

<?php
if ($_POST) {
    $aluno = $_POST['aluno'];
    $livro = $_POST['livro'];
    $revista = $_POST['revista'];

    if ($aluno == "" || $livro == "" || $revista == "") {
        echo "<div class='alert alert-danger mt-3'>Preencha todos os campos!</div>";
        return;
    }

    if (adicionarEmprestimo($aluno, $livro, $revista)) {
        echo "<div class='alert alert-success mt-3'>Emprestimo realizado com sucesso!</div>";

        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao realizar emprestimo!</div>";
    }
}

require_once("../footer.php");
?>