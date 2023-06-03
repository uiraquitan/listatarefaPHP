<?php
require __DIR__ . "/vendor/autoload.php";

use App\Entity\Tarefas;

use App\Session\Login;

Login::requiredLogged();
/**
 * RECEBENDO O ID PARA SER ALTERADO
 */
$edit = filter_input(INPUT_GET, 'edit', FILTER_DEFAULT);

/**
 * RECEBENDO OS DADOS DA ATUALIZAÇÃO
 */
$update = filter_input_array(INPUT_POST, FILTER_DEFAULT);



if (!isset($edit)  || !is_numeric($edit)) {
    header('location: index.php?msg=error');
    exit;
}

$tarefas = Tarefas::getTarefa($edit);

if (!$tarefas instanceof Tarefas) {
    header('location: index.php?msg=err');
    exit;
}

/**
 * Valida se os Dados estão vazios
 */
if (!empty($update)) {
    // $tarefas->id = $edit;
    $tarefas->titulo = $update['titulo'];
    $tarefas->data = $update['data'];
    $tarefas->hora = $update['hora'];
    $tarefas->tarefa = $update['tarefa'];
    $tarefas->atualizar();
    header('location: index.php?msg=edit');
    exit;
}

include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/editcadastrartarefas.php";
include __DIR__ . "/includes/footer.php";
