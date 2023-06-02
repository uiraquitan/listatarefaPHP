<div class="main_tarefas">
    <div class="tarefa">
        <ul>
            <li><span class="material-symbols-outlined">
                    person
                </span>
                Ola Uiraquitan
            </li>
            <li>
                <span class="material-symbols-outlined">
                    calendar_month
                </span>
                <?= date('d/m/Y', strtotime($tarefa->data)); ?>
            </li>
        </ul>
        <div class="tarefa_info">
            <?= $tarefa->titulo ?>
        </div>
        <div class="tarefa_info">
            <?= $tarefa->tarefa ?>
        </div>
        <div class="tarefas_config">
            <a href="edit.php?edit=<?= $tarefa->id ?>">Editar</a>
            <a href="del.php?del=<?= $tarefa->id ?>">Excluir</a>
        </div>
    </div>

    <aside class="aside">
        <ul>
            <?php foreach ($topCinco as $top) : ?>
                <a href="tarefa.php?tarefa=<?= $top->id ?>">
                    <span><?= $top->titulo ?></span>
                    <span> <?= date('d/m/Y', strtotime($top->data)); ?></span>
                </a>
            <?php endforeach; ?>
        </ul>
    </aside>
</div>