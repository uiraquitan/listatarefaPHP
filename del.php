<?php
require __DIR__ . "/vendor/autoload.php";

use App\Entity\Tarefas;


/**
 * RECEBENDO O ID PARA SER ALTERADO
 */
$del = filter_input(INPUT_GET, 'del', FILTER_DEFAULT);


if (empty($del) || !is_numeric($del)) {
    header('location: index.php?msg=err');
    exit;
}

$delete = Tarefas::getDelTarefa($del);

if ($delete) {
    header('location: index.php?msg=del');
    exit;
}



include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/delete.php";
include __DIR__ . "/includes/footer.php";
