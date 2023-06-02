<div class="form">
    <form action="" method="post">
        <h1>Cadastrar Tarefa</h1>
        <div class="form_group">
            <label for="">Titulo</label>
            <input type="text" name="titulo" value="<?= $tarefas->titulo ?>">
        </div>

        <div class="form_group">
            <label for="">Data</label>
            <input type="date" name="data"value="<?= $tarefas->data ?>">
        </div>

        <div class="form_group">
            <label for="">Horário</label>
            <input type="time" name="hora"value="<?= $tarefas->hora ?>">
        </div>

        <div class="form_group">
            <label for="password">Tarefa</label>
            <textarea name="tarefa" id="" rows="10"><?= $tarefas->tarefa ?></textarea>

            <div class="form_btn">
                <button type="submit">Atualizar Tarefa  = <?= $tarefas->titulo ?></button>
            </div>
    </form>
</div>