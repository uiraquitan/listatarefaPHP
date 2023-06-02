<div class="msg">
    <p> <?= $message ?></p>
</div>
<table>
    <thead>
        <tr>
            <th>Usuário</th>
            <th>Titulo</th>
            <th>Data</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $tarefa) : ?>

            <tr>
                <td><?= $tarefa->titulo ?></td>
                <td><a href="tarefa.php?tarefa=<?= $tarefa->id ?>"><?= $tarefa->titulo ?></a></td>
                <td><?= date('d/m/Y', strtotime($tarefa->data)) ?></td>
                <td collspan="2">
                    <a href="edit.php?edit=<?= $tarefa->id ?>">
                        <span class="material-symbols-outlined color_edit">
                            edit
                        </span>
                    </a>
                    <a href="del.php?del=<?= $tarefa->id ?>">
                        <span class="material-symbols-outlined color_del">
                            delete
                        </span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>