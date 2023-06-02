<div class="form">
    <form action="" method="post">
        <h1>Cadastrar Tarefa</h1>
        <?= $mensagem?>
        <div class="form_group">
            <label for="">Titulo</label>
            <input type="text" name="titulo">
        </div>

        <div class="form_group">
            <label for="">Data</label>
            <input type="date" name="data">
        </div>

        <div class="form_group">
            <label for="">Horário</label>
            <input type="time" name="hora">
        </div>

        <div class="form_group">
            <label for="password">Tarefa</label>
            <textarea name="tarefa" id="" rows="10"></textarea>

            <div class="form_btn">
                <button type="submit">Cadastrar Tarefa</button>
            </div>
    </form>
</div>