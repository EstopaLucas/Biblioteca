<?php
require_once("./header.php");
?>

<h2 class="text-center mb-4">Bem-vindo à Biblioteca do Lucas</h2>
<p class="text-center mb-4">Escolha uma das opções para começar</p>

<div class="row">
    <div class="col-md-6 mx-auto mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>Aluno</h3>
                <a href="/Biblioteca/aluno/index.php" class="btn btn-primary">Acessar</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mx-auto mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>Livros</h3>
                <a href="/Biblioteca/livros/index.php" class="btn btn-primary">Acessar</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mx-auto mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>Revistas</h3>
                <a href="/Biblioteca/revistas/index.php" class="btn btn-primary">Acessar</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mx-auto mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>Emprestimos</h3>
                <a href="/Biblioteca/emprestimos/index.php" class="btn btn-primary">Acessar</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once("./footer.php");