<?php

require __DIR__ . "/vendor/autoload.php";

use App\Database\Connect;
use App\Entity\Tarefas;
use App\Session\Login;

Login::requiredLogged();
$id = filter_input(INPUT_GET, 'tarefa', FILTER_DEFAULT);

$tarefa = Tarefas::getTarefa($id);

$topCinco = Tarefas::getTarefas("deleted_at is null", "id DESC", "5");

if (!$tarefa instanceof Tarefas) {
    header('location: index.php?msg=err');
    exit;
}

include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/tarefa.php";
include __DIR__ . "/includes/footer.php";
