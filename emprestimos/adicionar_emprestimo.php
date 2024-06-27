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
        <label for="livros">Livro</label>
        <select class="form-control" id="livros" name="livros" required>
            <option value="">Selecione um Livro</option>
            <?php
            $livros = listarLivros();
            while ($l = $livros->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?= $l['ID'] ?>"><?= $l['Titulo'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="revistas">Revista</label>
        <select class="form-control" id="revistas" name="revistas" required>
            <option value="">Selecione uma revista</option>
            <?php
            $revistas = listarRevistas();
            while ($l = $revistas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?= $l['ID'] ?>"><?= $l['TituloRevistas'] ?></option>
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
    $livros = $_POST['livros'];
    $revistas = $_POST['revistas'];

    if ($aluno == "" || $livros == "" || $revistas == "") {
        echo "<div class='alert alert-danger mt-3'>Preencha todos os campos!</div>";
        return;
    }

    if (adicionarEmprestimo($aluno, $livros, $revistas)) {
        echo "<div class='alert alert-success mt-3'>Emprestimo realizado com sucesso!</div>";

        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro ao realizar emprestimo!</div>";
    }
}

require_once("../footer.php");
?>